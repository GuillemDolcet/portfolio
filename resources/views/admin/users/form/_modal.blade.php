<div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            @unless ($user->exists)
                <h5 class="modal-title">@lang('admin.add') @lang('admin.user')</h5>
            @else
                <h5 class="modal-title">
                    @lang('admin.user') - {{ $user->name }}
                    <div class="fs-5 text-muted fw-normal">
                       <small>
                           @lang('admin.created') - {{ $user->created_at->format('d/m/Y H:i') }}
                       </small>
                    </div>
                </h5>
            @endif
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        @include('admin.users.form._form')
    </div>
</div>
