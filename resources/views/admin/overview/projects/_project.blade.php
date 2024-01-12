<div class="d-flex align-items-center justify-content-between border-bottom p-3">
    <div class="d-flex flex-column col-8">
        <div><b>{{$project->name}}</b></div>
    </div>
    <div class="col-3 d-flex text-end justify-content-end">
        <a href="#" class="me-1" title="@lang('admin.edit')"
           data-controller="remote-modal"
           data-action="remote-modal#toggle"
           data-remote-modal-url-value="{{ route('admin.projects.edit', $project) }}"
           data-remote-modal-target-value="#project-form-modal">
            <x-icon icon="edit"/>
        </a>
        <form method="post" action="{{ route('admin.projects.destroy', $project) }}" data-controller="form"
              data-confirm="@lang('admin.confirms.delete-project')">
            @csrf
            @method('delete')
            <a href="#" class="text-danger" title="@lang('admin.delete')" data-action="form#submit">
                <x-icon icon="trash"/>
            </a>
        </form>
    </div>
</div>
