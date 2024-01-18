<div class="row bg-white border rounded mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between p-3 border-bottom">
            <div><h2 class="page-title">@lang('admin.languages')</h2></div>
            <div><a href="#"
                    data-controller="remote-modal"
                    data-action="remote-modal#toggle"
                    data-remote-modal-url-value="{{ route('admin.users.languages.create') }}"
                    data-remote-modal-target-value="#language-form-modal">
                    <x-icon icon="plus"/>
                </a></div>
        </div>
        @each('admin.overview.users.languages._language', $userLanguages, 'userLanguage', 'admin.overview.users.languages._empty')
        @if ($userLanguages->hasMorePages())
            <div class="mt-2 mb-2 justify-content-center d-flex">
                <a href="{{route('admin.users.languages.index')}}">
                    @lang('admin.show.skills') ({{$userLanguages->total()}}) <x-icon icon="share" />
                </a>
            </div>
        @endif
    </div>
</div>

