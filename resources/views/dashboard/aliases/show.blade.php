@extends('layouts.app')

@section('title', 'Alias ' . $alias->name)

@section('content')
    @component('layouts.components.panel')
        @slot('title', 'Alias')

        <p>
            Naam: {{ $alias->name }}
        </p>
        <p>
            Van unit: {{ $alias->unit->name }}
        </p>
        <p>
            <a href="{{ route('aliases.edit', $alias) }}">
                Wijzig Alias
            </a>
        </p>
    @endcomponent
@endsection