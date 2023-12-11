<tr>
    <td>{{ ucfirst($hobby->name) }}</td>
    <td>{{ $hobby->order ?? '-' }}</td>
    <td class="text-end cursor-pointer ali">
        <div class="d-flex text-end justify-content-end">
            <a href="#" class="me-1" title="@lang('admin.hobby')"
               data-controller="remote-modal"
               data-action="remote-modal#toggle"
               data-remote-modal-url-value="{{ route('admin.hobbies.edit', $hobby) }}"
               data-remote-modal-target-value="#hobby-form-modal">
                <x-icon icon="edit"/>
            </a>
            <form method="post" action="{{ route('admin.hobbies.destroy', $hobby) }}" data-controller="form"
                  data-confirm="@lang('admin.confirms.delete-hobby')">
                @csrf
                @method('delete')
                <a href="#" class="text-danger" title="@lang('admin.delete')" data-action="form#submit" >
                    <x-icon icon="trash"/>
                </a>
            </form>
        </div>
    </td>
</tr>
