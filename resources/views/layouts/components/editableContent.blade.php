<div style="background-color: {{$page_section->background_color}}" class="page_section">
    <h4 class="service-heading">{{$page_section->title}}</h4>

    @include('layouts.components.editButton', ['page_section' => $page_section])

    {!! $page_section->content !!}

</div>