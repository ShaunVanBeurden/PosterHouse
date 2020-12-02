@extends('layouts.dashboard')

@section('page_heading', 'Sponsoren')

@section('section')
    <div class="row">
        <div class="col-sm-6">
            @section ('cotable_panel_title','Sponsoren beheren')
            @section ('cotable_panel_body')
                <a href="{{ route('sponsors.create') }}" class="btn btn-link">Maak een nieuwe sponsor</a>

                <table class="table">
                    <tr>
                        <th>
                            Naam
                        </th>
                        <th>
                            Link
                        </th>
                        <th>
                            Actie's
                        </th>
                    </tr>
                    @foreach($sponsors as $sponsor)
                        <tr>
                            <td>
                                <a href="{{ route('sponsors.show', $sponsor) }}">
                                    {{ $sponsor->name }}
                                </a>
                            </td>
                            <td>
                                {{ $sponsor->url }}
                            </td>
                            <td>
                                <a href="{{ route('sponsors.edit', $sponsor) }}">Wijzig</a>
                            </td>
                        </tr>
                    @endforeach
                </table>

                {{ $sponsors->links() }}

                <p>
                    <a href="{{ route('dashboard.index') }}" class="btn btn-default">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        Terug naar dashboard
                    </a>
                </p>
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>
    </div>
@endsection