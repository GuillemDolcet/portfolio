<div class="row bg-white border rounded mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between p-3 border-bottom">
            <div><h2 class="page-title">@lang('admin.faqs')</h2></div>
            <div>
                @can('create', \App\Models\Faq::class)
                    <a href="#"
                       data-controller="remote-modal"
                       data-action="remote-modal#toggle"
                       data-remote-modal-url-value="{{ route('admin.faqs.create') }}"
                       data-remote-modal-target-value="#faq-form-modal">
                        <x-icon icon="plus"/>
                    </a>
                @endcan
            </div>
        </div>
        @each('admin.overview.faqs._faq', $faqs, 'faq', 'admin.overview.faqs._empty')
    </div>
</div>

