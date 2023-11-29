<tr>
    <td>{{ ucfirst($project->name) }}</td>
    <td>{{ ucfirst($project->description) }}</td>
    <td>{{ ucfirst($project->url) }}</td>
    <td>{{ $project->start_date->format('d/m/y') }}</td>
    <td>{{ !is_null($project->finish_date) ? $project->finish_date->format('d/m/y') : Lang::get('admin.currently') }}</td>
    <td>
        <div class="d-flex">
            @foreach($project->skills as $skill)
                <div><img src="{{\Storage::url($skill->image)}}" alt="{{$skill->name}}" width="40" height="40"/></div>
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
