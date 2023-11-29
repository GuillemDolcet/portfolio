<div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-sm-down modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            @unless ($project->exists)
                <h5 class="modal-title">@lang('admin.add') @lang('admin.project')</h5>
            @else
                <h5 class="modal-title">
                    @lang('admin.project') - {{ $project->name }}
                    <div class="fs-5 text-muted fw-normal">
                        <small>
                            @lang('admin.created') - {{ $project->created_at->format('d/m/Y H:i') }}
                        </small>
                    </div>
                </h5>
            @endif
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        @include('admin.projects.form._form')
    </div>
</div>
