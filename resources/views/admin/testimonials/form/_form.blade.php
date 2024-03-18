<form id="testimonial-form" action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}"
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
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
            <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                @if($testimonial->exists)
                    <x-icon icon="edit"/> @lang('admin.edit') @lang('admin.testimonial')
                @else
                    <x-icon icon="plus"/> @lang('admin.add') @lang('admin.testimonial')
                @endif
            </button>
        </div>
    </div>
</form>
