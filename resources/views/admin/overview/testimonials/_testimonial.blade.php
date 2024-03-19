<div class="d-flex align-items-center justify-content-between p-3 border-end border-bottom">
    <div class="d-flex flex-column col-6">
        <div class="mb-2"><b>{{ $testimonial->name }} - {{ $testimonial->job }}</b></div>
        <div class="mb-2">{{ $testimonial->comment }}</div>
    </div>
    <div class="col-3 d-flex text-end justify-content-end">
        @can('edit', $testimonial)
            <a href="#" class="me-1" title="@lang('admin.section')"
               data-controller="remote-modal"
               data-action="remote-modal#toggle"
               data-remote-modal-url-value="{{ route('admin.testimonials.edit', $testimonial) }}"
               data-remote-modal-target-value="#testimonial-form-modal">
                @can('update', $testimonial)
                    <x-icon icon="edit"/>
                @else
                    <x-icon icon="view"/>
                @endcan
            </a>
        @else
            <span class="text-muted"><x-icon icon="view"/></span>
        @endcan
        @can('delete', $testimonial)
            <form method="post" action="{{ route('admin.testimonials.destroy', $testimonial) }}"
                  data-controller="form"
                  data-confirm="@lang('admin.confirms.delete-testimonial')">
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
</div>
