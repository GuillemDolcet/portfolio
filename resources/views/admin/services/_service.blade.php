<tr>
    <td>{{ ucfirst($service->title) }}</td>
    <td>{{ ucfirst($service->description) }}</td>
    <td>{{ $service->icon }}</td>
    <td class="text-end cursor-pointer ali">
        <div class="d-flex text-end justify-content-end">
            @can('edit', $service)
                <a href="#" class="me-1" title="@lang('admin.edit')"
                   data-controller="remote-modal"
                   data-action="remote-modal#toggle"
                   data-remote-modal-url-value="{{ route('admin.services.edit', $service) }}"
                   data-remote-modal-target-value="#service-form-modal">
                    @can('update', $service)
                        <x-icon icon="edit"/>
                    @else
                        <x-icon icon="view"/>
                    @endcan
                </a>
            @else
                <span class="text-muted"><x-icon icon="view"/></span>
            @endcan
            @can('delete', $service)
                <form method="post" action="{{ route('admin.services.destroy', $service) }}" data-controller="form"
                      data-confirm="@lang('admin.confirms.delete-service')">
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
