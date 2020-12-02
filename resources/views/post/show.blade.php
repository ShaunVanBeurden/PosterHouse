@extends('layouts.master')

@push('styles')
<link href="/css/blog.css" rel="stylesheet">
<link href="/css/comments.css" rel="stylesheet">
@endpush

@section('title', $post->title)
@section('content')
    <!-- Page Header -->
    <header class="intro-header"
            style="background-image: url({{asset("/storage/posts/$post->id.jpeg")}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1>{!! strip_tags($post->title) !!}</h1>
                        <h2 class="subheading">{!! strip_tags($post->sub_title) !!}</h2>
                        <span class="meta">
                            Gepubliceerd door
                            <a href="#" class="post-author">{{$post->user->name}}</a>
                            {{$post->created_at->diffForHumans()}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    {!! strip($post->body) !!}

                </div>
            </div>
            @can('update', $post)
                <p>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-default">
                        Wijzig post
                    </a>

                    <a href="{{ route('posts.destroy', $post) }}" class="btn btn-warning"
                       onclick="event.preventDefault(); document.getElementById('delete-blog').submit();">
                        Verwijder post
                    </a>

                <form id="delete-blog" action="{{ route('posts.destroy', $post) }}" method="POST"
                      style="display: none;">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                </form>
                </p>
            @endcan
        </div>
    </article>
    <hr>

    @if(!$post->isDraft())
        <div class="container">
            <div class="row">
                <div class="comments-container">
                    @if (Auth::check())
                        <form method="POST" id="test1" action="{{ route('comments.store', $post) }}">
                            {{csrf_field()}}
                            <textarea name="body" class="form-control" placeholder="Reactie achterlaten"></textarea>

                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <button type="submit" class="btn btn-primary">Opslaan</button>
                        </form>
                    @else
                        <textarea name="body" class="form-control"
                                  disabled>Om een reactie achter te laten moet u registreren en uw account geactiveerd hebben</textarea>
                    @endif
                </div>
            </div>
        </div>


    <!-- /resources/views/comments/comment.blade.php -->

        @include('post.components.comment', ['comments' => $comments])
    @endif
@endsection
