<div class="row bg-white border rounded mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between p-3 border-bottom">
            <div><h2 class="page-title">@lang('admin.testimonials')</h2></div>
            <div>
                @can('create', \App\Models\Testimonial::class)
                    <a href="#"
                        data-controller="remote-modal"
                        data-action="remote-modal#toggle"
                        data-remote-modal-url-value="{{ route('admin.testimonials.create') }}"
                        data-remote-modal-target-value="#testimonial-form-modal">
                        <x-icon icon="plus"/>
                    </a>
                @endcan
            </div>
        </div>
        @each('admin.overview.testimonials._testimonial', $testimonials, 'testimonial', 'admin.overview.testimonials._empty')
    </div>
</div>

