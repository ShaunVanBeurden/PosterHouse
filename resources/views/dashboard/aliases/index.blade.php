@extends('layouts.dashboard')

@section('page_heading', 'Aliassen')

@section('section')
    <div class="row">
        <div class="col-sm-8">
            @section ('cotable_panel_title','Aliassen beheren')
            @section ('cotable_panel_body')
                <p>
                    Een alias wordt gebruikt om zoeken naar units makkelijker te maken. Bijvoorbeeld als een gebruiker zoekt
                    naar Den Bosch zal hij of zij de unit niet vinden. Dit omdat alleen 's-Hertogenbosch in de units staan. Door
                    een alias aan 's-Hertogenbosch toe te voegen, kunnen gebruikers ook zoeken door middel van 'Den Bosch'.
                </p>

                <p>
                    <a href="{{ route('aliases.create') }}" class="btn btn-primary">Maak een nieuwe alias</a>
                </p>

                <table class="table">
                    <tr>
                        <th>
                            Naam
                        </th>
                        <th>
                            Van unit
                        </th>
                        <th>
                            Actie's
                        </th>
                    </tr>
                    @foreach($aliases as $alias)
                        <tr>
                            <td>
                                <a href="{{ route('aliases.show', $alias) }}">
                                    {{ $alias->name }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('units.show', $alias->unit) }}">
                                    {{ $alias->unit->name }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('aliases.edit', $alias) }}">Wijzig</a>
                            </td>
                        </tr>
                    @endforeach
                </table>

                <p>
                    <a href="{{ route('units.index') }}" class="btn btn-default">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        Terug naar units
                    </a>
                </p>
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>
    </div>
@endsection