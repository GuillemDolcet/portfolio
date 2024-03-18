<tr>
    <td>{{ ucfirst($testimonial->name) }}</td>
    <td class="text-end cursor-pointer ali">
        <div class="d-flex text-end justify-content-end">
            <a href="#" class="me-1" title="@lang('admin.section')"
               data-controller="remote-modal"
               data-action="remote-modal#toggle"
               data-remote-modal-url-value="{{ route('admin.testimonials.edit', $testimonial) }}"
               data-remote-modal-target-value="#testimonial-form-modal">
                <x-icon icon="edit"/>
            </a>
            <form method="post" action="{{ route('admin.testimonials.destroy', $testimonial) }}" data-controller="form"
                  data-confirm="@lang('admin.confirms.delete-testimonial')">
                @csrf
                @method('delete')
                <a href="#" class="text-danger" title="@lang('admin.delete')" data-action="form#submit" >
                    <x-icon icon="trash"/>
                </a>
            </form>
        </div>
    </td>
</tr>
