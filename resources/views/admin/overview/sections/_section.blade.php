<div class="d-flex align-items-center justify-content-between border-bottom p-3">
    <div class="col-3">
        <div><b>{{ ucfirst($section->tag) }}</b></div>
        <div>{{ $section->title }}</div>
    </div>
    <div class="col-8">{{ Str::limit($section->description, 250, ' ...') }}</div>
    <div class="col-1 d-flex text-end justify-content-end">
        <a href="#" class="me-1" title="@lang('admin.edit')"
           data-controller="remote-modal"
           data-action="remote-modal#toggle"
           data-remote-modal-url-value="{{ route('admin.sections.edit', $section) }}"
           data-remote-modal-target-value="#section-form-modal">
            <x-icon icon="edit"/>
        </a>
    </div>
</div>
