<tr>
    <td>{{ ucfirst($section->name) }}</td>
    <td>{{ ucfirst($section->tag) }}</td>
    <td>{{ ucfirst($section->title) }}</td>
    <td class="text-end cursor-pointer ali">
        <div class="d-flex text-end justify-content-end">
            <a href="#" class="me-1" title="@lang('admin.section')"
               data-controller="remote-modal"
               data-action="remote-modal#toggle"
               data-remote-modal-url-value="{{ route('admin.sections.edit', $section) }}"
               data-remote-modal-target-value="#section-form-modal">
                <x-icon icon="edit"/>
            </a>
        </div>
    </td>
</tr>
