<form id="testimonial-form" action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}"
      @if(($testimonial->exists && !Auth::user()->can('update', $testimonial)) || (!$testimonial->exists && !Auth::user()->can('store', $testimonial))) {{ "data-disabled=true" }} @endif
      method="post" accept-charset="utf-8" data-controller="form" enctype="multipart/form-data">
    @csrf
    @if ($testimonial->exists)
        @method('put')
    @endif
    <div class="modal-body nice-scrollbar scrollbar-primary">
        <div id="section-form-fields">
            @include('admin.testimonials.form._fields')
        </div>
    </div>
    <div class="modal-footer">
        <div class="d-flex justify-content-between">
            @if($testimonial->exists)
                @can('update', $testimonial)
                    <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                        <x-icon icon="edit"/> @lang('admin.edit') @lang('admin.testimonial')
                    </button>
                @endcan
            @else
                @can('store', $testimonial)
                    <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                        <x-icon icon="plus"/> @lang('admin.add') @lang('admin.testimonial')
                    </button>
                @endcan
            @endif
        </div>
    </div>
</form>
