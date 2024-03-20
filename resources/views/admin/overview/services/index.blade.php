<div class="accordion row bg-white border rounded mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center border-bottom">
            <div>
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-services" aria-expanded="true" aria-controls="collapse-services">
                    <span class="page-title">@lang('admin.services')</span>
                </button>
            </div>
            @can('create', \App\Models\Service::class)
                <div class="me-3">
                    <a href="#"
                       data-controller="remote-modal"
                       data-action="remote-modal#toggle"
                       data-remote-modal-url-value="{{ route('admin.services.create') }}"
                       data-remote-modal-target-value="#service-form-modal">
                        <x-icon icon="plus"/>
                    </a>
                </div>
            @endcan
        </div>
        <div id="collapse-services" class="accordion-collapse collapse show">
            @each('admin.overview.services._service', $services, 'service', 'admin.overview.services._empty')
        </div>
    </div>
</div>

