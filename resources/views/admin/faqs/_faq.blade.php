<tr>
    <td>{{ $faq->question }}</td>
    <td>{{ $faq->answer }}</td>
    <td class="text-end cursor-pointer ali">
        <div class="d-flex text-end justify-content-end">
            @can('edit', $faq)
                <a href="#" class="me-1" title="@lang('admin.faq')"
                   data-controller="remote-modal"
                   data-action="remote-modal#toggle"
                   data-remote-modal-url-value="{{ route('admin.faqs.edit', $faq) }}"
                   data-remote-modal-target-value="#faq-form-modal">
                    @can('update', $faq)
                        <x-icon icon="edit"/>
                    @else
                        <x-icon icon="view"/>
                    @endcan
                </a>
            @else
                <span class="text-muted"><x-icon icon="view"/></span>
            @endcan
            @can('delete', $faq)
                <form method="post" action="{{ route('admin.faqs.destroy', $faq) }}" data-controller="form"
                      data-confirm="@lang('admin.confirms.delete-faq')">
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
