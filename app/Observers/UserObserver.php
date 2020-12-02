<?php

namespace App\Observers;

use App\Models\User;
use App\Library\Activations\ActivationManager;

class UserObserver
{
    /**
     * The Activation Manager instance.
     *
     * @var \App\Library\Activations\ActivationManager
     */
    private $manager;

    /**
     * UserObserver constructor.
     *
     * @param  \App\Library\Activations\ActivationManager  $manager
     */
    public function __construct(ActivationManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Listen to the User created event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $this->manager->create($user);
    }
}