<div class="accordion row bg-white border rounded mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center border-bottom">
            <div>
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-education" aria-expanded="true" aria-controls="collapse-education">
                    <span class="page-title">@lang('admin.education')</span>
                </button>
            </div>
            @can('create', \App\Models\Education::class)
                <div class="me-3">
                    <a href="#"
                       data-controller="remote-modal"
                       data-action="remote-modal#toggle"
                       data-remote-modal-url-value="{{ route('admin.education.create') }}"
                       data-remote-modal-target-value="#education-form-modal">
                        <x-icon icon="plus"/>
                    </a>
                </div>
            @endcan
        </div>
        <div id="collapse-education" class="accordion-collapse collapse show">
            @each('admin.overview.education._education', $education, 'educationModel', 'admin.overview.education._empty')
        </div>
    </div>
</div>

