<div class="accordion row bg-white border rounded mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center border-bottom">
            <div>
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-project" aria-expanded="true" aria-controls="collapse-project">
                    <span class="page-title">@lang('admin.projects')</span>
                </button>
            </div>
            @can('create', \App\Models\Project::class)
                <div class="me-3">
                    <a href="#"
                       data-controller="remote-modal"
                       data-action="remote-modal#toggle"
                       data-remote-modal-url-value="{{ route('admin.projects.create') }}"
                       data-remote-modal-target-value="#project-form-modal">
                        <x-icon icon="plus"/>
                    </a>
                </div>
            @endcan
        </div>
        <div id="collapse-project" class="accordion-collapse collapse show">
            @each('admin.overview.projects._project', $projects, 'project', 'admin.overview.projects._empty')
        </div>
    </div>
</div>

