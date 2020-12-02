<?php

namespace App\Models\Components;

use Cviebrock\EloquentSluggable\Sluggable;

trait SluggableWrapper
{
    use Sluggable;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}