@extends('layouts.master')

@section('title', 'Wijzig ' . $post->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update blog</div>

                    <div class="panel-body">
                        <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title">Titel</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       value="{{ old('title', $post->title) }}">

                                @if ($errors->has('title'))
                                    <p class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </p>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('cover') ? ' has-error' : '' }}">
                                <label for="cover">Omslag foto</label>
                                <input type="file" id="cover" name="cover" accept="image/*">
                                <p class="help-block">
                                    Deze afbeelding gebruiken we om de blog wat mooier te weergeven aan de gebruiker.
                                </p>
                                @if ($errors->has('cover'))
                                    <p class="help-block">
                                        <strong>{{ $errors->first('cover') }}</strong>
                                    </p>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                                <label for="body">Inhoud</label>
                                <textarea name="body" class="form-control rich" id="body" cols="30"
                                          rows="10">{{ old('body', $post->body) }}</textarea>

                                @if ($errors->has('body'))
                                    <p class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </p>
                                @endif
                            </div>

                            @if (is_null($post->drafted_at))
                                <input type="submit" value="Wijzigingen opslaan" name="_action" class="btn btn-primary">
                            @else
                                <input type="submit" value="Publiceren" name="_action" class="btn btn-primary">
                                <input type="submit" value="Opslaan als concept" name="_action" class="btn btn-default">
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection