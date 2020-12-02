<?php

namespace App\Http\Controllers;

class UserPostController extends Controller
{
    /**
     * UserPostController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the blog posts of the authenticated user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = currentUser()->posts()->withTrashed()->get();

        return view('user.post', compact('posts'));
    }
}
