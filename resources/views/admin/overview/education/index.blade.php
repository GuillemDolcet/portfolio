<div class="row bg-white border rounded mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between p-3 border-bottom">
            <div><h2 class="page-title">@lang('admin.education')</h2></div>
            <div>
                <a href="#"
                    data-controller="remote-modal"
                    data-action="remote-modal#toggle"
                    data-remote-modal-url-value="{{ route('admin.education.create') }}"
                    data-remote-modal-target-value="#education-form-modal">
                    <x-icon icon="plus"/>
                </a>
            </div>
        </div>
        @each('admin.overview.education._education', $education, 'educationModel', 'admin.overview.education._empty')
        @if ($experiences->hasMorePages())
            <div class="mt-2 mb-2 justify-content-center d-flex">
                <a href="{{route('admin.education.index')}}">
                    @lang('admin.show.education') ({{$education->total()}}) <x-icon icon="share" />
                </a>
            </div>
        @endif
    </div>
</div>

