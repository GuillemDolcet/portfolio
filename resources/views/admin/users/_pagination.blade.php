<div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom">
    <div>
        <b>{{ number($users->total()) }}</b> resultado/s.
    </div>
    <div class="d-flex justify-content-end">
        {{ $users->links('shared.pagination.page-links') }}
    </div>
</div>
