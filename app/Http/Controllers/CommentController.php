<?php

namespace App\Http\Controllers;

use App\Models\Comment_archive;
use Auth;
use App\Models\Post;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Auth\Guard;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post)
    {
        if (!request('body') == null)
        {
            $comment = Comment::create([
                'user_id' => Auth::id(),
                'post_id' => $post->id,
                'body' => request('body'),
                'parent_id' => request('parent_id'),
            ]);

            Comment_archive::create([
               'comment_id' => $comment->id,
                'body' => $comment->body,
            ]);

        }
        return redirect()->route('posts.show', $post);
    }

    public function destroy(Comment $comment)
    {
//        $this->authorize('delete', $comment);

        $post = $comment->post;

        $comment->delete();

        return redirect()->route('posts.show', $post);
    }

    public function update(Comment $comment)
    {
        if ($comment->body == request('body'))
            return back();
        $comment->update(request()->only('body'));

        Comment_archive::create([
           'body' => $comment->body,
            'comment_id' => $comment->id
        ]);

        return back();
    }

    public function show(Comment $comment)
    {
        $comment_archives = Comment_archive::where('comment_id', $comment->id)->latest()->get();
        return view('post.components.commenthistory', compact('comment_archives'));
    }
}
