<?php

namespace App\Models;

use App\Models\Components\SluggableWrapper;
use App\Models\Components\Uploadable;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use SluggableWrapper, Uploadable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'url'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ]
        ];
    }
}
