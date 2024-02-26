<div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            @unless ($userLanguage->exists)
                <h5 class="modal-title">@lang('admin.add') @lang('admin.language')</h5>
            @else
                <h5 class="modal-title">
                    @lang('admin.user') - {{ $userLanguage->name }}
                </h5>
            @endif
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        @include('admin.users.languages.form._form')
    </div>
</div>
