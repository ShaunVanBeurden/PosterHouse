@extends('layouts.dashboard')

@section('page_heading', 'Units')

@section('section')
    <div class="row">
        <div class="col-sm-12">
            @section ('cotable_panel_title','Units beheren')
            @section ('cotable_panel_body')
                <div class="row">
                    <div class="col-lg-6">
                        <form action="{{ route('units.index') }}" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Zoeken" name="q" value="{{ request('q') }}" autocomplete="off">
                                <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Zoek</button>
                        </span>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{ route('aliases.index') }}" class="btn btn-success pull-right">Aliases</a>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <br />

                <table class="table">
                    <tr>
                        <th>
                            Gemeente
                        </th>
                        <th>
                            Inwoners
                        </th>
                    </tr>
                    @foreach($units as $unit)
                        <tr>
                            <td>
                                <a href="{{ route('units.show', $unit) }}">{{ $unit->name }}</a>
                            </td>
                            <td>
                                {{ number_format($unit->inhabitants, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $units->appends(['q' => request('q')])->links() }}
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>
    </div>
@endsection