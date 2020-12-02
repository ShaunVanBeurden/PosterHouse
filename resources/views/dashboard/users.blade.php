@extends('layouts.dashboard')

@section('page_heading', 'Gebruikers')

@section('section')
    <div class="row">
        <div class="col-sm-6">
            @section ('cotable_panel_title','Gebruikers beheren')
            @section ('cotable_panel_body')
                <div class="row" style="margin-bottom: 2%;">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div id="imaginary_container">
                            <form action="{{ route('dashboard.users') }}" method="get">
                                <div class="input-group stylish-input-group">
                                    <input type="text" name="q" class="form-control" placeholder="Zoeken" value="{{ request('q') }}">
                                    <span class="input-group-addon">
                            <button type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <tr>
                        <th>
                            Naam
                        </th>
                        <th>
                            Blog posts
                        </th>
                        <th>
                            Comments
                        </th>
                        <th>
                            Actie
                        </th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td class="{{ $user->blocked() ? ' user-blocked' : '' }}">
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->posts->count() }}
                            </td>
                            <td>
                                {{ $user->comments->count() }}
                            </td>
                            <td>
                                <a href="{{ route('users.edit', $user) }}">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $users->appends(['q' => request('q')])->links() }}

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