<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 04/04/2017
 * Time: 21:12
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $fillable = [
        'title', 'body', 'triggerdate'
    ];

    protected $dates = [
        'triggerdate'
    ];

    public function paragraphs()
    {
        return $this->hasMany(MailParagraph::class, 'newsletter_id');
    }
}