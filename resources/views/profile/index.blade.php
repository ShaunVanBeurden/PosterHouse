@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    @component('layouts.components.panel')
        @slot('title', 'Wijzig '.$user->name)
                        <div class="list-group">
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

                                <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                                    <div class="checkbox">
                                        <label>
                                            <input type="hidden" name="role_id" value="0">
                                            <input type="checkbox" name="role_id" value="1"
                                                    {{ old('role_id', $user->role_id) ? ' checked' : '' }}>
                                            Wilt u de nieuwsbrief ontvangen?
                                        </label>
                                    </div>

                                    @if ($errors->has('role_id'))
                                        <p class="help-block">{{ $errors->first('role_id') }}</p>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary">Wijzig</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection