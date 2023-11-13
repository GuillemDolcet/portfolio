<tr>
    <td>{{ ucfirst($skill->name) }}</td>
    <td>{{ $skill->level }}</td>
    <td>{{ $skill->order }}</td>
    <td>{{ $skill?->created_at->format('d/m/y H:i') ?? '-' }}</td>
    <td>{{ $skill?->updated_at->format('d/m/y H:i') ?? '-' }}</td>
    <td class="text-end cursor-pointer ali">
        <div class="d-flex text-end justify-content-end">
            <a href="#" class="me-1" title="@lang('admin.edit')"
               data-controller="remote-modal"
               data-action="remote-modal#toggle"
               data-remote-modal-url-value="{{ route('admin.skills.edit', $skill) }}"
               data-remote-modal-target-value="#skill-form-modal">
                <x-icon icon="edit"/>
            </a>
            <form method="post" action="{{ route('admin.skills.destroy', $skill) }}" data-controller="form"
                  data-confirm="@lang('admin.confirms.delete-skill')">
                @csrf
                @method('delete')
                <a href="#" class="text-danger" title="@lang('admin.delete')" data-action="form#submit" >
                    <x-icon icon="trash"/>
                </a>
            </form>
        </div>
    </td>
</tr>
