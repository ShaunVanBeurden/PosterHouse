@extends('layouts.master')

@push('styles')
<link href="/css/unitprofile.css" rel="stylesheet">
@endpush

@section('content')
    <!-- nav bar -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <!-- resumt -->
                <div class="panel panel-default">
                    <div class="panel-heading resume-heading">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-xs-12 col-sm-4">
                                    <figure>
                                        <img class="img-circle img-responsive" alt="" src="http://placehold.it/300x300">
                                    </figure>
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    <ul class="list-group">
                                        <li class="list-group-item">{{$unit->name}}</li>
                                        <li class="list-group-item"><i class="fa fa-phone"></i>{{$unit->phone_number}}</li>
                                        <li class="list-group-item"><i class="fa fa-envelope"></i> {{$unit->email}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bs-callout bs-callout-danger">
                        <h4>Omschrijving</h4>
                        <p>
                            {{$unit->description}}
                        </p>

                    </div>
                    <div class="bs-callout bs-callout-danger">
                        <h4>Project Informatie</h4>
                        <p>
                            {{$unit->project_information}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection