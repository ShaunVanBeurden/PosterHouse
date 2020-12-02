@extends('layouts.dashboard')

@section('page_heading', 'Aliassen')

@section('section')
    <div class="row">
        <div class="col-sm-6">
            @section ('cotable_panel_title','Aliassen aanmaken')
            @section ('cotable_panel_body')
                <form action="{{ route('aliases.store') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Alias naam</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{ old('name') }}">

                        @if ($errors->has('name'))
                            <p class="help-block"><strong>{{ $errors->first('name') }}</strong></p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('unit') ? ' has-error' : '' }}">
                        <label for="unit">De unit van de alias</label>
                        <select class="form-control single-select" id="unit" name="unit">
                            @foreach($units as $unit)
                                <option value="{{ $unit->id }}"{{ old('unit') == $unit->id ? ' selected' : '' }}>
                                    {{ $unit->name }}
                                </option>
                            @endforeach
                        </select>

                        @if ($errors->has('unit'))
                            <p class="help-block"><strong>{{ $errors->first('unit') }}</strong></p>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Maak Alias</button>
                </form>
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>
    </div>
@endsection