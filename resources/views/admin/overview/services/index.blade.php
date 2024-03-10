<div class="row bg-white border rounded mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between p-3 border-bottom">
            <div><h2 class="page-title">@lang('admin.services')</h2></div>
        </div>
        @each('admin.overview.services._service', $services, 'service', 'admin.overview.services._empty')
    </div>
</div>

