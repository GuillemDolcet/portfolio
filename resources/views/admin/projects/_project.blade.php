<tr>
    <td>
        <a href="{{$project->url}}" target="_blank">
            <div><img src="{{\Storage::url($project->image)}}" width="200" alt="{{$project->name}}"></div>
        </a>
    </td>
    <td>{{ ucfirst($project->description) }}</td>
    <td>
        <div class="d-flex flex-wrap gap-1">
            @foreach($project->skills as $skill)
                <div class="me-2"><img src="{{\Storage::url($skill->image)}}" alt="{{$skill->name}}" height="40"/></div>
            @endforeach
        </div>
    </td>
    <td class="text-end cursor-pointer ali">
        <div class="d-flex text-end justify-content-end">
            <a href="#" class="me-1" title="@lang('admin.project')"
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
                <a href="#" class="text-danger" title="@lang('admin.delete')" data-action="form#submit" >
                    <x-icon icon="trash"/>
                </a>
            </form>
        </div>
    </td>
</tr>
