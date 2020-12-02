@extends('layouts.dashboard')

@section('page_heading', 'Sponsoren')

@section('section')
    <div class="row">
        <div class="col-sm-6">
            @section ('cotable_panel_title', $sponsor->name)
            @section ('cotable_panel_body')
                <p>
                    Naam: {{ $sponsor->name }}
                </p>
                <p>
                    Link: <a href="{{ $sponsor->url }}">{{ $sponsor->url }}</a>
                </p>
                <p>
                    <img src="{{ $sponsor->image_path }}" width="200px" alt="Sponsor">
                </p>
                <p>
                    <a href="{{ route('sponsors.edit', $sponsor) }}">
                        Wijzig sponsor
                    </a>
                </p>
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>
    </div>
@endsection