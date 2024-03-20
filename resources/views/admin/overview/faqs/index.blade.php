<div class="accordion row bg-white border rounded mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center border-bottom">
            <div>
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-faq" aria-expanded="true" aria-controls="collapse-faq">
                    <span class="page-title">@lang('admin.faqs')</span>
                </button>
            </div>
            @can('create', \App\Models\Faq::class)
                <div class="me-3">
                    <a href="#"
                       data-controller="remote-modal"
                       data-action="remote-modal#toggle"
                       data-remote-modal-url-value="{{ route('admin.faqs.create') }}"
                       data-remote-modal-target-value="#faq-form-modal">
                        <x-icon icon="plus"/>
                    </a>
                </div>
            @endcan
        </div>
        <div id="collapse-faq" class="accordion-collapse collapse show">
            @each('admin.overview.faqs._faq', $faqs, 'faq', 'admin.overview.faqs._empty')
        </div>
    </div>
</div>

