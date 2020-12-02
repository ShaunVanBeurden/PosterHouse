@extends('layouts.dashboard')

@section('page_heading', 'Aliassen')

@section('section')
    <div class="row">
        <div class="col-sm-6">
            @section ('cotable_panel_title','Aliassen aanpassen')
            @section ('cotable_panel_body')
                <form action="{{ route('aliases.update', $alias) }}" method="post" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Naam</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{ old('name', $alias->name) }}">

                        @if ($errors->has('name'))
                            <p class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('unit') ? ' has-error' : '' }}">
                        <label for="unit">De unit van de alias</label>
                        <select class="form-control single-select" id="unit" name="unit">
                            @foreach($units as $unit)
                                <option value="{{ $unit->id }}"{{ old('unit', $alias->unit_id) == $unit->id ? ' selected' : '' }}>
                                    {{ $unit->name }}
                                </option>
                            @endforeach
                        </select>

                        @if ($errors->has('unit'))
                            <p class="help-block"><strong>{{ $errors->first('unit') }}</strong></p>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Wijzig Alias</button>
                    <a href="{{ route('aliases.index') }}" class="btn btn-default">Ga terug</a>
                </form>
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>
    </div>
@endsection