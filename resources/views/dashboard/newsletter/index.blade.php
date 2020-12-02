@extends('layouts.dashboard')

@section('page_heading', 'Blog')

@section('section')
    <div class="row">
        <div class="col-sm-6">
            @section ('cotable_panel_title','Nieuwsbrieven')
            @section ('cotable_panel_body')
                <a href="{{ route('newsletters.create') }}" class="btn- btn-link">Maak een nieuwe nieuwsbrief</a>
            <br>
                <table class="table table-hover">
                    <tr>
                        <th>Titel</th>
                        <th>Aflever Datum</th>
                        <th>Actie's</th>
                    </tr>

                    @foreach($newsletters as $newsletter)
                        <tr>
                            <td>
                                <a href="{{ route('newsletters.show', $newsletter) }}">{{ $newsletter->title }}</a>
                            </td>
                            <td>
                                {{ date('d-m-Y h:i:s', strtotime($newsletter->triggerdate)) }}
                            <td>
                                <a href="{{ route('newsletters.destroy', $newsletter) }}"
                                   onclick="event.preventDefault();
                                           document.getElementById('delete-newsletter-{{ $newsletter->id }}').submit();">
                                            <span class="glyphicon glyphicon-trash text-danger"
                                                  aria-hidden="true"></span>
                                </a>

                                <form id="delete-newsletter-{{ $newsletter->id }}" action="{{ route('newsletters.destroy', $newsletter) }}"
                                      method="POST">

                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                </form>
                                <a href="{{ route('newsletters.edit', $newsletter) }}">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                </table>
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>
    </div>
@endsection