<div class="row bg-white border rounded mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between p-3 border-bottom">
            <div><h2 class="page-title">@lang('admin.skills')</h2></div>
            <div><a href="#"
                    data-controller="remote-modal"
                    data-action="remote-modal#toggle"
                    data-remote-modal-url-value="{{ route('admin.skills.create') }}"
                    data-remote-modal-target-value="#skill-form-modal">
                    <x-icon icon="plus"/>
                </a></div>
        </div>
        @each('admin.overview.skills._skill', $skills, 'skill', 'admin.overview.skills._empty')
    </div>
</div>

