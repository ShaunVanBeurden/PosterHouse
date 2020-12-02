<?php

namespace App\Models\Components;

trait Uploadable
{
    /**
     * Boot the trait.
     */
    public static function bootUploadable()
    {
        static::saved(function ($model) {
            $model->uploadFiles();
        });

        static::deleting(function ($model) {
            $model->deleteFiles();
        });
    }

    /**
     * Upload the uploaded file from the request to the
     * file system.
     */
    public function uploadFiles()
    {
        if (count(request()->allFiles()) > 0) {
            image($this)->handle();
        }
    }

    /**
     * Delete all files from a model.
     */
    public function deleteFiles()
    {
        image($this)->deleteFiles();
    }

    /**
     * Get the path to the image.
     */
    public function getImagePathAttribute()
    {
        return image($this)->get();
    }
}