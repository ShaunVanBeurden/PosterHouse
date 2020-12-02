@extends('layouts.app')

@section('title', 'Wijzig Blog Post')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Blog's</div>

                    <div class="panel-body">
                        <p>
                            <a href="{{ route('posts.create') }}" class="btn btn-primary">
                                Create blog
                            </a>
                        </p>
                        <table class="table">
                            <tr>
                                <th>Title</th>
                                <th>Creator</th>
                                <th>Draft</th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        @if ($post->trashed())
                                            <a href="{{ route('posts.show', $post) }}" class="post-deleted">
                                                {{ $post->title }}
                                            </a>
                                        @else
                                            <a href="{{ route('posts.show', $post) }}">
                                                {{ $post->title }}
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $post->user->name }}
                                    </td>
                                    <td>
                                        @if ($post->isDraft())
                                            <span class="glyphicon glyphicon-ok"></span>
                                        @else
                                            <span class="glyphicon glyphicon-remove"></span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
