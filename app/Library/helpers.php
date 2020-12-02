<?php

if (! function_exists('current_user')) {
    /**
     * Get the authenticated user.
     *
     * @return \App\Models\User|null
     */
    function currentUser()
    {
        return \Auth::user();
    }
}

if (! function_exists('date_helper')) {
    /**
     * Convert Carbon instance to correct instance.
     *
     * @param  int  $subDays
     * @return string
     */
    function date_helper($subDays = 0)
    {
        return \Carbon\Carbon::now()->subDays($subDays)->format('d-m-Y');
    }
}

if (! function_exists('image')) {
    /**
     * Upload all images.
     *
     * @param  mixed  $model
     * @return \App\Library\ImageUpload
     */
    function image($model)
    {
        return app('app.image')->setModel($model);
    }
}

if (! function_exists('strip')) {
    /**
     * Strip all unallowed HTML tags.
     *
     * @param $text
     * @return string
     */
    function strip($text)
    {
        return strip_tags($text, '<p><strong><em><strike><br><hr><ul><ol><li><span><img>');
    }
}