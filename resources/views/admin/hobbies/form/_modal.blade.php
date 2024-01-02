<div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-sm-down modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            @unless ($hobby->exists)
                <h5 class="modal-title">@lang('admin.add') @lang('admin.hobby')</h5>
            @else
                <h5 class="modal-title">
                    @lang('admin.hobby') - {{ $hobby->name }}
                    <div class="fs-5 text-muted fw-normal">
                       <small>
                           @lang('admin.created') - {{ $hobby->created_at->format('d/m/Y H:i') }}
                       </small>
                    </div>
                </h5>
            @endif
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        @include('admin.hobbies.form._form')
    </div>
</div>