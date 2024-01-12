<div class="row bg-white border rounded mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between p-3 border-bottom">
            <div><h2 class="page-title">@lang('admin.hobbies')</h2></div>
            <div><a href="#"
                    data-controller="remote-modal"
                    data-action="remote-modal#toggle"
                    data-remote-modal-url-value="{{ route('admin.hobbies.create') }}"
                    data-remote-modal-target-value="#hobby-form-modal">
                    <x-icon icon="plus"/>
                </a></div>
        </div>
        @each('admin.overview.hobbies._hobby', $hobbies, 'hobby', 'admin.overview.hobbies._empty')
        @if ($hobbies->hasMorePages())
            <div class="mt-2 mb-2 justify-content-center d-flex">
                <a href="{{route('admin.hobbies.index')}}">
                    @lang('admin.show.hobbies') ({{$hobbies->total()}}) <x-icon icon="share" />
                </a>
            </div>
        @endif
    </div>
</div>

