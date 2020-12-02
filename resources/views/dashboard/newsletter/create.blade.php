@extends('layouts.dashboard')

@section('page_heading', 'Nieuws brieven')

@section('section')
    <div class="row">
        <div class="col-sm-8">
            @section ('cotable_panel_title','Maak nieuws brief')
            @section ('cotable_panel_body')
                <form action="{{ route('newsletters.store') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title">Titel</label>
                        <input type="text" class="form-control" id="title" name="title"
                               value="{{ old('title') }}" required>

                        @if ($errors->has('title'))
                            <p class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                        <label for="body">Voorwoord</label>
                        <textarea name="body" class="form-control" id="body" cols="30"
                                  rows="10" required>{{ old('body') }}</textarea>

                        @if ($errors->has('body'))
                            <p class="help-block">
                                <strong>{{ $errors->first('body') }}</strong>
                            </p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Volgende</button>
                </form>
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>
    </div>
@endsection