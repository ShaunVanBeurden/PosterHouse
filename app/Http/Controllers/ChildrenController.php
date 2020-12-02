<?php

namespace App\Http\Controllers;

use App\Models\PageSection;

class ChildrenController extends Controller
{
    /**
     * The children page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $page_sections = PageSection::where('page', 'children')->get();
        $user = \Auth::user();

        return view('children', compact('page_sections', 'user'));
    }
}
