<form id="skill-form" action="{{ $project->exists ? route('admin.projects.update', $project) : route('admin.projects.store') }}"
      @if(($project->exists && !Auth::user()->can('update', $project)) || (!$project->exists && !Auth::user()->can('store', $project))) {{ "data-disabled=true" }} @endif
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
            @if($project->exists)
                @can('update', $project)
                    <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                        <x-icon icon="edit"/> @lang('admin.edit') @lang('admin.project')
                    </button>
                @endcan
            @else
                @can('store', $project)
                    <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                        <x-icon icon="plus"/> @lang('admin.add') @lang('admin.project')
                    </button>
                @endcan
            @endif
        </div>
    </div>
</form>
