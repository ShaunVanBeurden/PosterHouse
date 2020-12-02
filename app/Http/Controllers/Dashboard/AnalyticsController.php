<?php

namespace App\Http\Controllers\Dashboard;

use App\Library\AnalyticsCache;
use App\Http\Controllers\Controller;

class AnalyticsController extends Controller
{
    /**
     * AnalyticsController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show web app analytics.
     *
     * @param  \App\Library\AnalyticsCache  $cache
     * @return \Illuminate\Http\Response
     */
    public function index(AnalyticsCache $cache)
    {
        list($data, $labels) = $cache->get();

        return view('dashboard.analytics', compact('analytics', 'data', 'labels'));
    }
}
