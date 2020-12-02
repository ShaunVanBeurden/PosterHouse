<?php

namespace App\Models;

use App\Models\Components\Blockable;
use App\Models\Components\SluggableWrapper;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, Blockable, SluggableWrapper;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'notify',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'blocked_at',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'separator' => '.'
            ]
        ];
    }

    /**
     * Determine if the user is an administrator.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->hasRole(1);
    }


    /**
     * Determine if the user is an unit.
     *
     * @return bool
     */
    public function isUnit()
    {
        return $this->hasRole(2);
    }

    /**
     * Determine if the user has any of the given roles.
     *
     * @param  mixed  $roles
     * @return bool
     */
    public function hasRole($roles)
    {
        if (! is_array($roles)) {
            $roles = func_get_args();
        }

        return in_array($this->role_id, $roles);
    }

    /**
     * Determine is user has activated account.
     *
     * @return bool
     */
    public function activated()
    {
        return \DB::table('activations')
            ->where('user_id', $this->getAttribute('id'))
            ->count() === 1;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
