<tr>
    <td>{{ $userLanguage->name }}</td>
    <td>{{ $userLanguage->level }}</td>
    <td class="text-end cursor-pointer ali">
        <div class="d-flex text-end justify-content-end">
            <a href="#" class="me-1" title="@lang('admin.edit')"
               data-controller="remote-modal"
               data-action="remote-modal#toggle"
               data-remote-modal-url-value="{{ route('admin.users.languages.edit', $userLanguage) }}"
               data-remote-modal-target-value="#language-form-modal">
                <x-icon icon="edit"/>
            </a>
            <form method="post" action="{{ route('admin.users.languages.destroy', $userLanguage) }}" data-controller="form"
                  data-confirm="@lang('admin.confirms.delete-user-language')">
                @csrf
                @method('delete')
                <a href="#" class="text-danger" title="@lang('admin.delete')" data-action="form#submit">
                    <x-icon icon="trash"/>
                </a>
            </form>
        </div>
    </td>
</tr>
