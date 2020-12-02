<?php

namespace App\Http\Controllers\Dashboard;

use App\Library\AnalyticsCache;
use App\Models\Post;
use App\Models\Unit;
use App\Models\User;
use App\Models\Sponsor;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Spatie\Analytics\Analytics;
use Spatie\Analytics\Period;

class DashboardController extends Controller
{
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Spatie\Analytics\Analytics $analytics
     * @param  \App\Library\AnalyticsCache  $cache
     * @return \Illuminate\Http\Response
     */
    public function index(Analytics $analytics, AnalyticsCache $cache)
    {
        $users = User::count();
        $posts = Post::withTrashed()->count();
        $comments = Comment::count();
        $units = Unit::count();
        $sponsors = Sponsor::count();

        $views = $analytics->fetchTotalVisitorsAndPageViews(Period::days(date('y')))
            ->sum('pageViews');

        list($data, $labels) = $cache->get();

        return view('dashboard.index', compact(
            'users', 'posts', 'comments', 'units', 'sponsors', 'views', 'data', 'labels'
        ));
    }
}
