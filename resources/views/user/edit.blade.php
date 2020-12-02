@extends('layouts.dashboard')

@section('page_heading', 'Gebruikers')

@section('section')
    <script src="/js/blockuser.js"></script>
    <div class="row">
        <div class="col-sm-6">
            @section ('cotable_panel_title','Gebruikers aanpassen')
            @section ('cotable_panel_body')
                @if ($user->blocked())
                    <div class="alert alert-warning" role="alert">
                        Deze gebruiker is geblokkeerd.
                    </div>
                @endif

                <form action="{{ route('users.update', $user) }}" method="post">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Naam</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}">

                        @if ($errors->has('name'))
                            <p class="help-block">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email adres</label>
                        <input type="email" class="form-control" name="email" id="email"
                               value="{{ old('email', $user->email) }}">

                        @if ($errors->has('email'))
                            <p class="help-block">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                        <div class="checkbox">
                            <label>
                                <input type="hidden" name="role_id" value="0">
                                <input type="checkbox" name="role_id" value="1"
                                        {{ old('role_id', $user->role_id) ? ' checked' : '' }}>
                                Administrator
                            </label>
                        </div>

                        @if ($errors->has('role_id'))
                            <p class="help-block">{{ $errors->first('role_id') }}</p>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Wijzig</button>

                    @if ($user->blocked())
                        <a href="{{ route('users.unblock', $user) }}" class="btn btn-warning"
                           onclick="event.preventDefault(); document.getElementById('unblock-form').submit();">
                            Deblokkeer gebruiker
                        </a>
                    @else

                        <a href="{{ route('users.block', $user) }}" class="btn btn-warning"
                           onclick="messageDeletePosts(); event.preventDefault(); document.getElementById('block-form').submit();">
                            Blokkeer gebruiker
                        </a>
                    @endif
                </form>

                <form id="unblock-form" action="{{ route('users.unblock', $user) }}" method="post" style="display: none;">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                </form>

                <form id="block-form" name="block-form" action="{{ route('users.block', $user) }}" method="post" style="display: none;">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <input type="hidden" name="deletePosts" id="deletePosts" value="">
                </form>
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>
    </div>
@endsection