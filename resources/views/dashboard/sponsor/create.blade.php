@extends('layouts.dashboard')

@section('page_heading', 'Sponsoren')

@section('section')
    <div class="row">
        <div class="col-sm-6">
            @section ('cotable_panel_title','Sponsoren aanmaken')
            @section ('cotable_panel_body')
                <form action="{{ route('sponsors.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Sponsor naam</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{ old('name') }}">

                        @if ($errors->has('name'))
                            <p class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                        <label for="url">Link naar sponsor</label>
                        <input type="url" class="form-control" id="url" name="url"
                               value="{{ old('url') }}">

                        @if ($errors->has('url'))
                            <p class="help-block">
                                <strong>{{ $errors->first('url') }}</strong>
                            </p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <label for="cover">Afbeelding</label>
                        <input type="file" id="image" name="image" accept="image/*">
                        <p class="help-block">
                            Upload hier het logo van de sponsor.
                        </p>
                        @if ($errors->has('image'))
                            <p class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </p>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Maak Sponsor</button>
                </form>
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>
    </div>
@endsection