<div class="row bg-white border rounded mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between p-3 border-bottom">
            <div><h2 class="page-title">@lang('admin.experience')</h2></div>
            <div><a href="#"
                    data-controller="remote-modal"
                    data-action="remote-modal#toggle"
                    data-remote-modal-url-value="{{ route('admin.experiences.create') }}"
                    data-remote-modal-target-value="#experience-form-modal">
                    <x-icon icon="plus"/>
                </a></div>
        </div>
        @each('admin.overview.experiences._experience', $experiences, 'experience', 'admin.overview.experiences._empty')
    </div>
</div>

