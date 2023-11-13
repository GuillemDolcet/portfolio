<tr>
    <td class="w-1 text-muted">{{ $user->getKey() }}</td>
    <td nowrap>{{ ucfirst($user->name) }}</td>
    <td nowrap>{{ $user->email }}</td>
    <td nowrap>{{ ucfirst($user->roles()->first()->name) }}</td>
    <td class="text-end cursor-pointer ali">
        <div class="d-flex text-end justify-content-end">
            <a href="#" class="me-1" title="@lang('admin.edit')"
               data-controller="remote-modal"
               data-action="remote-modal#toggle"
               data-remote-modal-url-value="{{ route('admin.users.edit', $user) }}"
               data-remote-modal-target-value="#user-form-modal">
                <x-icon icon="edit"/>
            </a>
            @can('delete', $user)
                <form method="post" action="{{ route('admin.users.destroy', $user) }}" data-controller="form"
                      data-confirm="@lang('admin.confirms.delete-user')">
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
