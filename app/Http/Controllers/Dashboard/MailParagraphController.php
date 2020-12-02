<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\MailParagraph;
use App\Http\Controllers\Controller;
use App\Models\Newsletter;

class MailParagraphController extends Controller
{

    public function store(Newsletter $newsletter)
    {
        if(request('link')) {
            MailParagraph::create([
                'subject' => request('subject'),
                'body' => request('body'),
                'link' => request('link'),
                'newsletter_id' => $newsletter->id
            ]);
        }else{
            MailParagraph::create([
                'subject' => request('subject'),
                'body' => request('body'),
                'newsletter_id' => $newsletter->id
            ]);
        }

        return redirect()->route('newsletters.show', $newsletter);
    }

    public function destroy(MailParagraph $paragraph)
    {
        $newsletter = $paragraph->newsletter;
        $paragraph->delete();

        return redirect()->route('newsletters.show', compact('newsletter'));
    }
}