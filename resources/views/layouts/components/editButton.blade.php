@if($user && $user->role_id == $page_section->role_id)
    @if($page_section->role_id == 1 || $user->unit_id == $page_section->unit_id)

        <button type="button" class="btn btn-page-edit", id="{{ $page_section->id }}">
            <span class="glyphicon glyphicon-pencil " aria-hidden="true"></span>
        </button>
    @endif
@endif