<form id="faq-form" action="{{ $faq->exists ? route('admin.faqs.update', $faq) : route('admin.faqs.store') }}"
      method="post" accept-charset="utf-8" data-controller="form" enctype="multipart/form-data">
    @csrf
    @if ($faq->exists)
        @method('put')
    @endif
    <div class="modal-body nice-scrollbar scrollbar-primary">
        <div id="section-form-fields">
            @include('admin.faqs.form._fields')
        </div>
    </div>
    <div class="modal-footer">
        <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
            <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                @if($faq->exists)
                    <x-icon icon="edit"/> @lang('admin.edit') @lang('admin.faq')
                @else
                    <x-icon icon="plus"/> @lang('admin.add') @lang('admin.faq')
                @endif
            </button>
        </div>
    </div>
</form>
