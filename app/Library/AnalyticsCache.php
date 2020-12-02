<?php

namespace App\Library;

use Carbon\Carbon;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Support\Facades\DB;
use Spatie\Analytics\Analytics;
use Spatie\Analytics\Period;

class AnalyticsCache
{
    /**
     * The analytics instance.
     *
     * @var \Spatie\Analytics\Analytics
     */
    private $analytics;

    /**
     * The connection interface.
     *
     * @var \Illuminate\Database\ConnectionInterface
     */
    private $connection;

    /**
     * AnalyticsCache constructor.
     *
     * @param  \Spatie\Analytics\Analytics  $analytics
     * @param  \Illuminate\Database\ConnectionInterface  $connection
     */
    public function __construct(Analytics $analytics, ConnectionInterface $connection)
    {
        $this->analytics = $analytics;
        $this->connection = $connection;
    }

    /**
     * Get the analytics.
     *
     * @return array
     */
    public function get()
    {
        $data = [];
        $labels = [];

        for ($i = 0; $i < 12; $i++) {
            $start = new Carbon('first day of ' . $i . ' month ago');
            $end = new Carbon('last day of ' . $i . ' month ago');

            $key = $start->format('Y_m');

            if ($this->keyExists($key)) {
                $views = $this->getViews($key);
            } else {
                $period = Period::create($start, $end);

                $views = $this->analytics->fetchTotalVisitorsAndPageViews($period)
                    ->sum('pageViews');

                $this->setViews($key, $views);
            }

            $data[] = $views;
            $labels[] = $start->format('F');
        }

        return [
            array_reverse($data),
            array_reverse($labels)
        ];
    }

    /**
     * Determine if the given key represents the current month.
     *
     * @param  string $key
     * @return bool
     */
    private function keyIsThisMonth($key)
    {
        return date('Y_m') == $key;
    }

    /**
     * Determine is the key exists.
     *
     * @param  string $key
     * @return bool
     */
    private function keyExists($key)
    {
        return DB::table('analytics')
            ->whereKey($key)
            ->exists();
    }

    /**
     * Get page views by key.
     *
     * @param  string  $key
     * @return int
     */
    private function getViews($key)
    {
        return DB::table('analytics')
            ->whereKey($key)
            ->first(['views'])
            ->views;
    }

    /**
     * Set (cache) the views.
     *
     * @param  string  $key
     * @param  int  $views
     * @return bool
     */
    private function setViews($key, $views)
    {
        return DB::table('analytics')
            ->insert(compact('key', 'views'));
    }

    /**
     * Get an instance of the query builder with the correct
     * corresponding table.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    protected function getTable()
    {
        return $this->connection->table('analytics');
    }
}