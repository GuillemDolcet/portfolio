<form id="skill-form" action="{{ $project->exists ? route('admin.projects.update', $project) : route('admin.projects.store') }}"
      method="post" accept-charset="utf-8" data-controller="form" enctype="multipart/form-data">
    @csrf
    @if ($project->exists)
        @method('put')
    @endif
    <div class="modal-body nice-scrollbar scrollbar-primary">
        <div id="project-form-fields">
            @include('admin.projects.form._fields')
        </div>
    </div>
    <div class="modal-footer">
        <div class="d-flex justify-content-between">
            @canany(['update','store'], $project)
                <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                    @if($project->exists)
                        @can('update', $project)
                            <x-icon icon="edit"/> @lang('admin.edit') @lang('admin.project')
                        @endcan
                    @else
                        @can('store', \App\Models\Project::class)
                            <x-icon icon="plus"/> @lang('admin.add') @lang('admin.project')
                        @endcan
                    @endif
                </button>
            @endcanany
        </div>
    </div>
</form>
