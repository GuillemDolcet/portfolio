<tr>
    <td>
        <div class="d-flex align-items-center">
            <div class="me-4"><img src="{{\Storage::url($skill->image)}}" width="50" alt="{{$skill->name}}"></div>
            <div><b>{{ ucfirst($skill->name) }}</b></div>
        </div>
    </td>
    <td>{{ $skill->level }}</td>
    <td>{{ $skill->order }}</td>
    <td class="text-end cursor-pointer ali">
        <div class="d-flex text-end justify-content-end">
            @can('edit', $skill)
                <a href="#" class="me-1" title="@lang('admin.edit')"
                   data-controller="remote-modal"
                   data-action="remote-modal#toggle"
                   data-remote-modal-url-value="{{ route('admin.skills.edit', $skill) }}"
                   data-remote-modal-target-value="#skill-form-modal">
                    @can('update', $skill)
                        <x-icon icon="edit"/>
                    @else
                        <x-icon icon="view"/>
                    @endcan
                </a>
            @else
                <span class="text-muted"><x-icon icon="view"/></span>
            @endcan
            @can('delete', $skill)
                <form method="post" action="{{ route('admin.skills.destroy', $skill) }}" data-controller="form"
                      data-confirm="@lang('admin.confirms.delete-skill')">
                    @csrf
                    @method('delete')
                    <a href="#" class="text-danger" title="@lang('admin.delete')" data-action="form#submit">
                        <x-icon icon="trash"/>
                    </a>
                </form>
            @else
                <span class="text-muted"><x-icon icon="trash"/></span>
            @endcan
        </div>
    </td>
</tr>
