<div>
    <h2>{{$page_section->title}}</h2>
    <div>

        <p >
            @include('layouts.components.editButton', ['page_section' => $page_section])

            {!! nl2br(e($page_section->content)) !!}
        </p>
        @if(isset($html))
            {!!$html!!}
        @endif
    </div>
</div>