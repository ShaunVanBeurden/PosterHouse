<?php

namespace App\Library;

use App\Models\Unit;
use App\Models\UnitAlias;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchUnits
{
    /**
     * Handle the unit search.
     *
     * @param  string  $query
     * @param  boolean  $paginate
     * @return LengthAwarePaginator|\Illuminate\Support\Collection
     */
    public function handle($query, $paginate = true)
    {
        $units = $this->getAllUnitsFromQuery($this->like($query));

        return $paginate ? $this->addPagination($units) : $units;
    }

    /**
     * Get all units and aliases from a search query.
     *
     * @param  string  $query
     * @return \Illuminate\Support\Collection
     */
    private function getAllUnitsFromQuery($query)
    {
        $units = $this->getUnitsFromQuery($query);

        return $units->merge($this->getUnitAliasesFromQuery($query))
            ->unique();
    }

    /**
     * Get all units from a search query.
     *
     * @param  string  $query
     * @return \Illuminate\Support\Collection
     */
    private function getUnitsFromQuery($query)
    {
        return Unit::where('name', 'like', $query)->paginate(15);
    }

    /**
     * Get all unit aliases from a search query.
     *
     * @param  string  $query
     * @return \Illuminate\Support\Collection|array
     */
    private function getUnitAliasesFromQuery($query)
    {
        $units = [];

        UnitAlias::where('name', 'like', $query)->with(['unit' => function($query) use (&$units) {
            $units = $query->get();
        }])->get();

        return $units;
    }

    /**
     * Convert search query to like.
     *
     * @param  string  $query
     * @return string
     */
    private function like($query)
    {
        return '%'.$query.'%';
    }

    /**
     * Convert a collection to pagination.
     *
     * @param  \Illuminate\Support\Collection  $units
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    private function addPagination($units)
    {
        $total = $units->count();

        $paginator = new LengthAwarePaginator($units, $total, 15);

        return $paginator->withPath(route('units.index'));
    }
}