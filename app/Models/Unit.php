<?php

namespace App\Models;

use App\Models\Components\SluggableWrapper;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use SluggableWrapper;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

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
                'separator' => '-'
            ],
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function aliases()
    {
        return $this->hasMany(UnitAlias::class);
    }
}
