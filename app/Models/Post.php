<?php

namespace App\Models;

use App\Models\Components\Uploadable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Components\SluggableWrapper;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes, SluggableWrapper, Uploadable;

    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'body', 'drafted_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
        'drafted_at',
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
                'source' => 'title'
            ]
        ];
    }

    /**
     * Determine if the blog post is a draft.
     *
     * @return bool
     */
    public function isDraft()
    {
        return ! is_null($this->drafted_at);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
}
