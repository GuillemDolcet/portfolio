<div class="row bg-white border rounded mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between p-3">
            <div><h2 class="page-title">@lang('admin.projects')</h2></div>
            <div><a href="#"
                    data-controller="remote-modal"
                    data-action="remote-modal#toggle"
                    data-remote-modal-url-value="{{ route('admin.projects.create') }}"
                    data-remote-modal-target-value="#project-form-modal">
                    <x-icon icon="plus"/>
                </a></div>
        </div>
        @each('admin.overview.projects._project', $projects, 'project', 'admin.overview.projects._empty')
        @if ($projects->hasMorePages())
            <div class="mt-2 mb-2 justify-content-center d-flex">
                <a href="{{route('admin.skills.index')}}">
                    @lang('admin.show.skills') ({{$projects->total()}}) <x-icon icon="share" />
                </a>
            </div>
        @endif
    </div>
</div>
