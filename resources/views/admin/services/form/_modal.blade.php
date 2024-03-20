<div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-sm-down modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            @unless ($service->exists)
                <h5 class="modal-title">@lang('admin.add') @lang('admin.service')</h5>
            @else
                <h5 class="modal-title">
                    @lang('admin.service') - {{ $service->title }}
                </h5>
            @endif
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        @include('admin.services.form._form')
    </div>
</div>
