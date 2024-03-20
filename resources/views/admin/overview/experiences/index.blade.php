<div class="accordion row bg-white border rounded mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center border-bottom">
            <div>
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-experience" aria-expanded="true" aria-controls="collapse-experience">
                    <span class="page-title">@lang('admin.experience')</span>
                </button>
            </div>
            @can('create', \App\Models\Experience::class)
                <div class="me-3">
                    <a href="#"
                       data-controller="remote-modal"
                       data-action="remote-modal#toggle"
                       data-remote-modal-url-value="{{ route('admin.experiences.create') }}"
                       data-remote-modal-target-value="#experience-form-modal">
                        <x-icon icon="plus"/>
                    </a>
                </div>
            @endcan
        </div>
        <div id="collapse-experience" class="accordion-collapse collapse show">
            @each('admin.overview.experiences._experience', $experiences, 'experience', 'admin.overview.experiences._empty')
        </div>
    </div>
</div>

