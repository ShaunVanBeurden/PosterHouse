<?php

namespace App\Library\Activations;

use App\Models\User;
use App\Notifications\ActivateYourAccount;

class ActivationManager
{
    /**
     * @var ActivationToken
     */
    private $token;

    /**
     * ActivationManager constructor.
     *
     * @param  \App\Library\Activations\ActivationToken  $token
     */
    public function __construct(ActivationToken $token)
    {
        $this->token = $token;
    }

    /**
     * Create a new token for the given user.
     *
     * @param  \App\Models\User  $user
     */
    public function create(User $user)
    {
        $token = $this->token->create($user);

        $user->notify(new ActivateYourAccount($token));
    }

    /**
     * Verify and delete the user if there is a correct token.
     *
     * @param  string  $token
     * @return \App\Models\User
     */
    public function verify($token)
    {
        $user = $this->token->getUser($token);

        if (! $user || ! $this->token->exists($user, $token)) {
            return null;
        }

        $this->token->delete($user);

        return $user;
    }
}