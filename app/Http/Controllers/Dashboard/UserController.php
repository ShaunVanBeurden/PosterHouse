<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show a list of users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->has('q')) {
            $query = $request->get('q');

            $users = User::where('name', 'like', '%'.$query.'%')->paginate(15);
        } else {
            $users = User::with('comments', 'posts')->orderBy('name')->paginate(15);
        }

        return view('dashboard.users', compact('users'));
    }

    /**
     * Edit the given user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the given user.
     *
     * @param  \App\Http\Requests\User\UpdateRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, User $user)
    {
        $request->persist();

        return redirect()->route('dashboard.users');
    }
}
