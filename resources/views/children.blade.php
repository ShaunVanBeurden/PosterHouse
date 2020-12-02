@extends('layouts.master')


@section('content')

    <div id="firstjumbotron" class="jumbotron page_section_parent">
        <div class="row">
            <div class="col-lg-1">
                <img class="apple" src="images/apple.png" alt="Generic placeholder image" width="120" ;>
            </div>
            <div class="col-lg-10">
                @if($page_sections->where('section', 'top')->first())
                    @include('layouts.components.editableContent', ['page_section' => $page_sections->where('section', 'top')->first()])
                @endif
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>


    <div id="secondjumbotron" class="jumbotron page_section_parent">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                @if($page_sections->where('section', 'middle')->first())
                    @include('layouts.components.editableContent', ['page_section' => $page_sections->where('section', 'middle')->first()])
                @endif
            </div>
            <div class="col-lg-1">
            <span class="pull-right">
                <img class="books" src="images/books.png" alt="Generic placeholder image" width="120" ;>
            </span>
            </div>
        </div>
    </div>

    <div id="thirdjumbotron" class="jumbotron page_section_parent">
        <div class="row">
            <div class="col-lg-1">
                <img class="books" src="images/toast.png" alt="Generic placeholder image" width="120" ;>
            </div>
            <div class="col-lg-10">
                @if($page_sections->where('section', 'bottom')->first())
                    @include('layouts.components.editableContent', ['page_section' => $page_sections->where('section', 'bottom')->first()])
                @endif
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
@endsection
