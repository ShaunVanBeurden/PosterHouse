<?php

namespace App\Library\Activations;

use App\Models\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Str;

class ActivationToken
{
    /**
     * The Connection interface.
     *
     * @var \Illuminate\Database\ConnectionInterface
     */
    private $connection;

    /**
     * The key to use for hashing.
     *
     * @var string
     */
    private $hashKey;

    /**
     * The activations table.
     *
     * @var string
     */
    private $table;

    /**
     * The amount of time the token is valid.
     *
     * @var integer
     */
    private $expires;

    /**
     * ActivationToken constructor.
     *
     * @param  \Illuminate\Database\ConnectionInterface $connection
     * @param  string  $hashKey
     * @param  string $table
     */
    public function __construct(ConnectionInterface $connection, $hashKey, $table = 'activations')
    {
        $this->connection = $connection;
        $this->hashKey = $hashKey;
        $this->expires = 3600;
        $this->table = $table;
    }

    /**
     * Create a new token.
     *
     * @param  \App\Models\User  $user
     * @return string
     */
    public function create(User $user)
    {
        $this->deleteExisting($user);

        // We will create a new, random token for the user so that we can e-mail them
        // a safe link to the activation. Then we will insert a record in
        // the database so that we can verify the token within the activation.
        $token = $this->createNewToken();

        $this->getTable()->insert($this->getPayload($user->id, $token));

        return $token;
    }

    /**
     * Build the record payload for the table.
     *
     * @param  integer  $id
     * @param  string  $token
     * @return array
     */
    protected function getPayload($id, $token)
    {
        return ['user_id' => $id, 'token' => $token, 'created_at' => new Carbon];
    }

    /**
     * Determine if a token record exists and is valid.
     *
     * @param  \App\Models\User  $user
     * @param  string  $token
     * @return bool
     */
    public function exists(User $user, $token)
    {
        $record = (array) $this->getTable()->where('user_id', $user->id)->first();

        return $record &&
            ! $this->tokenExpired($record['created_at'])
            && $token === $record['token'];
    }

    /**
     * Determine if the token has expired.
     *
     * @param  string  $createdAt
     * @return bool
     */
    protected function tokenExpired($createdAt)
    {
        return Carbon::parse($createdAt)->addSeconds($this->expires)->isPast();
    }

    /**
     * Delete a token record.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function delete(User $user)
    {
        $this->deleteExisting($user);
    }

    /**
     * Delete expired tokens.
     *
     * @return void
     */
    public function deleteExpired()
    {
        $expiredAt = Carbon::now()->subSeconds($this->expires);

        $this->getTable()->where('created_at', '<', $expiredAt)->delete();
    }

    /**
     * Delete all existing reset tokens from the database.
     *
     * @param  \App\Models\User  $user
     * @return int
     */
    protected function deleteExisting(User $user)
    {
        return $this->getTable()->where('user_id', $user->id)->delete();
    }

    /**
     * Create a new token for the user.
     *
     * @return string
     */
    public function createNewToken()
    {
        return hash_hmac('sha256', Str::random(40), $this->hashKey);
    }

    /**
     * Get the table to interact with.
     *
     * @param  string  $table
     * @return \Illuminate\Database\Query\Builder
     */
    private function getTable($table = null)
    {
        $table = $table ?: $this->table;

        return $this->connection->table($table);
    }

    /**
     * Retrieve an user by token.
     *
     * @param  string  $token
     * @return \App\Models\User
     */
    public function getUser($token)
    {
        $record = $this->getTable()
            ->where('token', $token)
            ->first(['user_id']);

        if (! $record) {
            return null;
        }

        return User::find($record->user_id);
    }
}