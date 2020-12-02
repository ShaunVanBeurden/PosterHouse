<?php

namespace App\Http\Controllers;

use App\Models\PageSection;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_sections = PageSection::where('page', 'welcome')->get();
        $sponsors = Sponsor::latest()->get();
        $user = \Auth::user();
        return view('welcome', compact('page_sections', 'user' , 'sponsors'));
    }
}
