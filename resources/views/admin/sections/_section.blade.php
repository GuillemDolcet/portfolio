<tr>
    <td>{{ ucfirst($section->name) }}</td>
    <td>{{ ucfirst($section->tag) }}</td>
    <td>{{ ucfirst($section->title) }}</td>
    <td class="text-end cursor-pointer ali">
        <div class="d-flex text-end justify-content-end">
            @can('edit', $section)
                <a href="#" class="me-1" title="@lang('admin.section')"
                   data-controller="remote-modal"
                   data-action="remote-modal#toggle"
                   data-remote-modal-url-value="{{ route('admin.sections.edit', $section) }}"
                   data-remote-modal-target-value="#section-form-modal">
                    @can('update', $section)
                        <x-icon icon="edit"/>
                    @else
                        <x-icon icon="view"/>
                    @endcan
                </a>
            @else
                <span class="text-muted"><x-icon icon="view"/></span>
            @endcan
        </div>
    </td>
</tr>
