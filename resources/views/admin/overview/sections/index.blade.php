<div class="accordion row bg-white border rounded mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center border-bottom">
            <div>
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-section" aria-expanded="true" aria-controls="collapse-section">
                    <span class="page-title">@lang('admin.sections')</span>
                </button>
            </div>
        </div>
        <div id="collapse-section" class="accordion-collapse collapse show">
            @each('admin.overview.sections._section', $sections, 'section', 'admin.overview.sections._empty')
        </div>
    </div>
</div>

