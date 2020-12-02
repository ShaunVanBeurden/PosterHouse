@extends('layouts.master')
@push('styles')
<link href="/css/blog.css" rel="stylesheet">
<link href="/css/font-awesome.css" rel="stylesheet">
@endpush

@section('title', 'Alle Blog Posts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @if(Auth::check())
                    @if(Auth::user()->isAdmin() || Auth::user()->isUnit())
                        <p>
                            <a href="{{ route('posts.create') }}" class="btn btn-primary">
                                Create blog
                            </a>
                        </p>
                    @endif
                @endif

                @include('post.components.postlist', ['posts' => $posts])

                <ul class="pager">
                    <li class="next">
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <hr>
@endsection

