@extends('layouts.dashboard')

@section('page_heading', 'Nieuwsbrief')

@section('section')
    <div class="row">
        <div class="col-sm-6">
            @section ('cotable_panel_title','NieuwsBrief aanpassen')
            @section ('cotable_panel_body')
                <form action="{{ route('newsletters.update', $newsletter) }}" method="post">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title">Titel</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $newsletter->title) }}">
                        @if ($errors->has('title'))
                            <p class="help-block">{{ $errors->first('title') }}</p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                        <label for="body">voorwoord</label>
                        <input type="text" class="form-control" name="body" id="body"
                               value="{{ old('body', $newsletter->body) }}">

                        @if ($errors->has('body'))
                            <p class="help-block">{{ $errors->first('body') }}</p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                        <label for="email">Afleverdatum</label>
                                <div class='input-group date' id='datetimepicker1'>
                                    <input id="triggerdate" name="triggerdate" placeholder="{{ date('d-m-Y h:i:s', strtotime($newsletter->triggerdate)) }}"
                                           type='text' class="datetimepicker" value="{{ old('triggerdate', $newsletter->triggerdate) }}">
                                    @if ($errors->has('triggerdate'))
                                        <p class="help-block">{{ $errors->first('triggerdate') }}</p>
                                        @endif
                                </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Wijzig</button>
                </form>
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>
    </div>
@endsection