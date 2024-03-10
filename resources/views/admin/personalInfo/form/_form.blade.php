<form id="section-form" action="{{ $section->exists ? route('admin.sections.update', $section) : route('admin.sections.store') }}"
      method="post" accept-charset="utf-8" data-controller="form" enctype="multipart/form-data">
    @csrf
    @if ($section->exists)
        @method('put')
    @endif
    <div class="modal-body nice-scrollbar scrollbar-primary">
        <div id="education-form-fields">
            @include('admin.sections.form._fields')
        </div>
    </div>
    <div class="modal-footer">
        <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
            <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                @if($section->exists)
                    <x-icon icon="edit"/> @lang('admin.edit') @lang('admin.section')
                @else
                    <x-icon icon="plus"/> @lang('admin.add') @lang('admin.section')
                @endif
            </button>
        </div>
    </div>
</form>
