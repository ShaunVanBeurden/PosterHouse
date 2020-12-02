<?php

namespace App\Http\Controllers;

use App\Models\PageSection;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    /**
     * Show the application sponsor page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_sections = PageSection::where('page', 'sponsors')->get();
        $user = \Auth::user();
        $sponsors = Sponsor::all();
        return view('sponsor/sponsor', compact('page_sections', 'user', 'sponsors' ));
    }
}
