<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class BlockUserController extends Controller
{
    /**
     * BlockUserController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Block the given user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user, Request $request)
    {
        $user->block();

        $requestValue = $request->input('deletePosts');

        if ($requestValue == "true")
        {
            // We halen de comments op van de user
            $comments = Comment::where('user_id', $user->id)->get();

            // We loopen door elke comment
            foreach ($comments as $comment) {
                // Per comment roepen we de destroy methode aan
                app('App\Http\Controllers\CommentController')->destroy($comment);
            }
        }

        return redirect()->route('users.edit', $user);
    }

    /**
     * Unblock the given user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->unblock();

        return redirect()->route('users.edit', $user);
    }
}
