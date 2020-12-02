@extends('layouts.master')

@section('content')


    <div class="jumbotron">
        @if($page_sections->where('section', 'top')->first())
            @include('layouts.components.editableContent', ['page_section' => $page_sections->where('section', 'top')->first()])
        @endif
        <div class="row">

            <div class="col-sm-1"></div>
            <div class="col-sm-1">
                <a class="btn btn-primary my-2 my-sm-0 mr-sm-2 " href="{{route('contact.index')}}">Neem contact met ons
                    op</a>

            </div>
        </div>
    </div>


        <div class="jumbotron">
            <h2>Onze Sponsoren</h2>
            <div class="row">
                @foreach($sponsors as $sponsor)
                    <div class="col-lg-4">
                        <p>
                            {{ $sponsor->name }}
                        </p>
                        <p>
                            <a href="{{ $sponsor->url }}">{{ $sponsor->url }}</a>
                        </p>
                        <p>
                            <img src="{{ $sponsor->image_path }}" width="200px" alt="Sponsor" class="rounded-circle">
                        </p>
                    </div>
                @endforeach
            </div>


        </div>
@endsection