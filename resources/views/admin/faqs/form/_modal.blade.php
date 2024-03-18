<div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-sm-down modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            @unless ($faq->exists)
                <h5 class="modal-title">@lang('admin.add') @lang('admin.faq')</h5>
            @else
                <h5 class="modal-title">
                    @lang('admin.faq') - {{ $faq->question }}
                </h5>
            @endif
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        @include('admin.faqs.form._form')
    </div>
</div>
