<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Newsletter\StoreRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Newsletter\UpdateRequest;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function create()
    {
        return view('dashboard.newsletter.create');
    }

    public function index()
    {
        $newsletters = Newsletter::paginate(15);
        return view('dashboard.newsletter.index', compact('newsletters'));
    }

    public function show(Newsletter $newsletter)
    {
        $paragraphs = $newsletter->paragraphs()->get();

        return view('dashboard.newsletter.show', compact('newsletter', 'paragraphs'));
    }

    public function edit(Newsletter $newsletter)
    {
        return view('dashboard.newsletter.edit', compact('newsletter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Newsletter\StoreRequest $request
     *
     * @return \Illuminate\Http\Response
     */

    public function store(StoreRequest $request)
    {
        $nextdate = date('Y-m-d', strtotime('First Monday of'.date('F o', strtotime("+1 month"))));
            $newsletter = Newsletter::create([
                'title' => request('title'),
                'body' => request('body'),
                'triggerdate' => $nextdate
            ]);
      //  $this->show($newsletter);
        return redirect()->route('newsletters.show', compact('newsletter'));
    }

    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();

        return redirect()->route('newsletters.index');
    }

    public function update(UpdateRequest $request, Newsletter $newsletter)
    {
        $request->persist();

        return redirect()->route('newsletters.index');
    }
}
