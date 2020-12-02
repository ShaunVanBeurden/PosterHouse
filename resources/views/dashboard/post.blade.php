@extends('layouts.dashboard')

@section('page_heading', 'Blog')

@section('section')
    <div class="row">
        <div class="col-sm-12">
            @section ('cotable_panel_title','Blog posts')
            @section ('cotable_panel_body')
                <table class="table table-hover">
                    <tr>
                        <th>Titel</th>
                        <th>Auteur</th>
                        <th>Actie's</th>
                        <th>Is concept</th>
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
                                <a href="{{ route('posts.destroy', $post) }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('delete-blog-{{ $post->id }}').submit();">
                                            <span class="glyphicon glyphicon-trash text-danger"
                                                  aria-hidden="true"></span>
                                </a>

                                <form id="delete-blog-{{ $post->id }}" action="{{ route('posts.destroy', $post) }}"
                                      method="POST">

                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                </form>
                            </td>
                            <td>
                                @if($post->isDraft())
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                @else
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                @endif
                            </td>
                        </tr>

                    @endforeach
                </table>
                {{ $posts->links() }}
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>
    </div>
@endsection