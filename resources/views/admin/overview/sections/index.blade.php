<div class="row bg-white border rounded mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between p-3 border-bottom">
            <div><h2 class="page-title">@lang('admin.sections')</h2></div>
        </div>
        @each('admin.overview.sections._section', $sections, 'section', 'admin.overview.sections._empty')
    </div>
</div>

