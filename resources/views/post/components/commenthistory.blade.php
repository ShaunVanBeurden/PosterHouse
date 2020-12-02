@extends('layouts.app')

@push('styles')
<link href="/css/itemstable.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container">
        <table class="table-fill">
            <thead>
            <tr>
                <th class="text-left">Body</th>
                <th class="text-left">Created At</th>
            </tr>
            </thead>
            <tbody class="table-hover">
            @foreach($comment_archives as $archive)
                <tr>
                    <td class="text-left">{{$archive->body}}</td>
                    <td class="text-left">{{$archive->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection