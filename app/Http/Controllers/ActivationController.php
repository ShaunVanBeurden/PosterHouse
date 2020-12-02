<?php

namespace App\Http\Controllers;

use Auth;
use App\Library\Activations\ActivationManager;

class ActivationController extends Controller
{
    public function show(ActivationManager $manager, $token)
    {
        $user = $manager->verify($token);

        if (is_null($user)) {
            abort(404);
        }

        Auth::login($user);

        return redirect()->route('home');
    }
}
