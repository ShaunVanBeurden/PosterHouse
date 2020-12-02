@extends ('layouts.dashboard')
@section('page_heading','Charts')
@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-6">
                @section ('cchart1_panel_title', 'Pagina weergavan')
                @section ('cchart1_panel_body')
                        @include('widgets.charts.simple-line', compact('labels', 'data'))
                @endsection
                @include('widgets.panel', array('header'=>true, 'as'=>'cchart1'))
            </div>
        </div>
    </div>
@endsection
