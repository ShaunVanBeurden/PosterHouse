<?php

namespace App\Library;

use App\Models\Post;

trait AuthorizePosts
{
    /**
     * Authorize that the user can view the given
     * posts.
     *
     * @param  \App\Models\Post  $post
     */
    public function authorizeViewPost(Post $post)
    {
        if (is_null(currentUser())) {
            if ($post->isDraft()) {
                abort(403);
            }
        } else {
            $this->authorize('view', $post);
        }
    }
}