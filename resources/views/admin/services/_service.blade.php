<tr>
    <td>{{ ucfirst($service->title) }}</td>
    <td>{{ ucfirst($service->description) }}</td>
    <td>{{ $service->icon }}</td>
    <td class="text-end cursor-pointer ali">
        <div class="d-flex text-end justify-content-end">
            <a href="#" class="me-1" title="@lang('admin.edit')"
               data-controller="remote-modal"
               data-action="remote-modal#toggle"
               data-remote-modal-url-value="{{ route('admin.services.edit', $service) }}"
               data-remote-modal-target-value="#service-form-modal">
                <x-icon icon="edit"/>
            </a>
            <form method="post" action="{{ route('admin.services.destroy', $service) }}" data-controller="form"
                  data-confirm="@lang('admin.confirms.delete-service')">
                @csrf
                @method('delete')
                <a href="#" class="text-danger" title="@lang('admin.delete')" data-action="form#submit" >
                    <x-icon icon="trash"/>
                </a>
            </form>
        </div>
    </td>
</tr>
