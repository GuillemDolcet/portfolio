<div class="row bg-white border rounded mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between p-3 border-bottom">
            <div><h2 class="page-title">@lang('admin.projects')</h2></div>
            @can('create', \App\Models\Project::class)
                <div>
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
        @each('admin.overview.projects._project', $projects, 'project', 'admin.overview.projects._empty')
    </div>
</div>

