<tr>
    <td class="w-1 text-muted">{{ $user->getKey() }}</td>
    <td nowrap>{{ $user->name }}</td>
    <td nowrap>{{ $user->email }}</td>
    <td class="text-end cursor-pointer">
        <a href="#" class="me-1" title="Edit"
           data-controller="remote-modal"
           data-action="remote-modal#toggle"
           data-remote-modal-url-value="{{ route('admin.users.edit', $user) }}"
           data-remote-modal-target-value="#user-form-modal">
            <x-icon icon="edit" />
        </a>
        @can('delete', $user)
            <a href="{{ route('admin.users.destroy', $user) }}" class="text-danger"
               title="Delete" data-turbo-method="delete"
               data-turbo-confirm="¿Realmente desea eliminar a este usuario? Esta acción no se puede deshacer.">
                <x-icon icon="trash" />
            </a>
        @else
            <span class="text-muted"><x-icon icon="trash" /></span>
        @endcan
    </td>
</tr>
