<div class="row bg-white border rounded mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between p-3 border-bottom">
            <div><h2 class="page-title">@lang('admin.services')</h2></div>
            <div><a href="#"
                    data-controller="remote-modal"
                    data-action="remote-modal#toggle"
                    data-remote-modal-url-value="{{ route('admin.services.create') }}"
                    data-remote-modal-target-value="#service-form-modal">
                    <x-icon icon="plus"/>
                </a></div>
        </div>
        @each('admin.overview.services._service', $services, 'service', 'admin.overview.services._empty')
    </div>
</div>

