<div class="row bg-white border rounded">
    <div class="card-body">
        <div class="d-flex justify-content-between p-3">
            <div><h2 class="page-title">@lang('admin.skills')</h2></div>
            <div><a href="#"
                    data-controller="remote-modal"
                    data-action="remote-modal#toggle"
                    data-remote-modal-url-value="{{ route('admin.skills.create') }}"
                    data-remote-modal-target-value="#skill-form-modal">
                    <x-icon icon="plus"/>
                </a></div>
        </div>
        @each('admin.overview.skills._skill', $skills, 'skill', 'admin.overview.skills._empty')
    </div>
</div>
@if ($skills->hasMorePages())
    <div class="mt-2 mb-2 justify-content-center d-flex" id="products-pagination">
        <button type="button" class="btn btn-primary d-none d-sm-inline-block w-100" data-pagination-per_page-value="5"
                data-controller="pagination" data-action="pagination#next" data-pagination-url-value="{{route('admin.skills.index')}}"
                data-pagination-auto-value="false" data-pagination-page-value="{{ $skills->currentPage() }}">
            Cargar más
        </button>
    </div>
@endif

