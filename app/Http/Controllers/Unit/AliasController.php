<?php

namespace App\Http\Controllers\Unit;

use App\Models\Unit;
use App\Models\UnitAlias;
use App\Http\Controllers\Controller;
use App\Http\Requests\Alias\StoreRequest;
use App\Http\Requests\Alias\UpdateRequest;

class AliasController extends Controller
{
    /**
     * AliasController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aliases = UnitAlias::with('unit')->orderBy('name')->get();

        return view('dashboard.aliases.index', compact('aliases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::orderBy('name')->get();

        return view('dashboard.aliases.create', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Alias\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $request->persist();

        return redirect()->route('aliases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitAlias  $alias
     * @return \Illuminate\Http\Response
     */
    public function show(UnitAlias $alias)
    {
        return view('dashboard.aliases.show', compact('alias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitAlias  $alias
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitAlias $alias)
    {
        $units = Unit::orderBy('name')->get();

        return view('dashboard.aliases.edit', compact('alias', 'units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Alias\UpdateRequest  $request
     * @param  \App\Models\UnitAlias  $alias
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, UnitAlias $alias)
    {
        $request->persist();

        return redirect()->route('aliases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitAlias  $alias
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitAlias $alias)
    {
        $alias->delete();

        return redirect()->route('aliases.index');
    }
}
