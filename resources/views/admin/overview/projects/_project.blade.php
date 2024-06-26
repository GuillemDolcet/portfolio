<div class="d-flex align-items-center justify-content-between border-bottom p-3">
    <div class="col d-flex align-baseline align-items-center">
        <div class="me-4">
            <a href="{{$project->url}}" target="_blank">
                <img class="ms-3" src="{{\Storage::url($project->image)}}" alt="{{$project->name}}" width="130">
            </a>
        </div>
        <div>
            <div><a href="{{$project->url}}"><b>{{$project->name}}</b></a></div>
            <div class="mt-2 mb-2">{{$project->description}}</div>
        </div>
    </div>
    <div class="col-2 d-flex text-end justify-content-end">
        @can('edit', $project)
            <a href="#" class="me-1" title="@lang('admin.edit')"
               data-controller="remote-modal"
               data-action="remote-modal#toggle"
               data-remote-modal-url-value="{{ route('admin.projects.edit', $project) }}"
               data-remote-modal-target-value="#project-form-modal">
                @can('update', $project)
                    <x-icon icon="edit"/>
                @else
                    <x-icon icon="view"/>
                @endcan
            </a>
        @endcan
        @can('delete', $project)
            <form method="post" action="{{ route('admin.projects.destroy', $project) }}" data-controller="form"
                  data-confirm="@lang('admin.confirms.delete-project')">
                @csrf
                @method('delete')
                <a href="#" class="text-danger" title="@lang('admin.delete')" data-action="form#submit">
                    <x-icon icon="trash"/>
                </a>
            </form>
        @endcan
    </div>
</div>
