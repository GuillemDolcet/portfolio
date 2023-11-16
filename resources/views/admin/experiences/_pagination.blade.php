<div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom">
    <div>
        <b>{{ number($experiences->total()) }}</b> @lang('pagination.results').
    </div>
    <div class="d-flex justify-content-end">
        {{ $experiences->links('shared.pagination.page-links') }}
    </div>
</div>
