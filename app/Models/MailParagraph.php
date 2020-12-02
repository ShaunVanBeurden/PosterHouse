<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailParagraph extends Model
{
    protected $fillable = [
      'subject', 'body', 'newsletter_id', 'link',
    ];

    public function newsletter()
    {
        return $this->belongsTo(Newsletter::class);
    }
}
