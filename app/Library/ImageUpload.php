<?php

namespace App\Library;

use File;
use Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;

class ImageUpload
{
    /**
     * The model instance the upload images for.
     *
     * @var mixed
     */
    private $model;

    /**
     * Handle file upload.
     */
    public function handle()
    {
        $this->deleteFiles();

        $this->uploadFile($this->getFileFromRequest());
    }

    /**
     * Upload a file.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @throws \Exception
     */
    public function uploadFile(UploadedFile $file)
    {
        if (is_null($this->model) || ! $this->model instanceof Model) {
            throw new \Exception("No model has been set for file uploading.");
        }

        $file->storePubliclyAs($this->getDirName(), $this->getUploadFileName($file));
    }

    /**
     * Delete all files from a model.
     */
    public function deleteFiles()
    {
        $path = 'app/' . $this->getDirName() . '/' . $this->getModelDir() . $this->model->id;

        Storage::delete(File::glob(storage_path($path)));
    }

    /**
     * Get the first uploaded file from the request.
     *
     * @return \Illuminate\Http\UploadedFile
     */
    public function getFileFromRequest()
    {
        return head(request()->allFiles());
    }

    /**
     * Get the directory name to store file into.
     *
     * @return string
     */
    private function getDirName()
    {
        return 'public/' . $this->getModelDir();
    }

    /**
     * Get the directory name for a model.
     *
     * @return string
     */
    private function getModelDir()
    {
        return $this->model->getTable();
    }

    /**
     * Get the filename.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @return string
     */
    private function getUploadFileName(UploadedFile $file)
    {
        return $this->model->id . '.' . $file->extension();
    }

    /**
     * Set the model instance.
     *
     * @param  mixed  $model
     * @return \App\Library\ImageUpload
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get the extension from the given file.
     *
     * @param  string  $file
     * @return string
     */
    private function getExtension($file)
    {
        return last(explode('.', $file));
    }

    /**
     * Get the image path.
     *
     * @return string
     */
    public function get()
    {
        $path = 'storage/' . $this->getModelDir() . '/' . $this->model->id . '.';

        $files = File::glob(public_path($path . '*'));

        return $files
            ? asset($path . $this->getExtension(head($files)))
            : '';
    }
}