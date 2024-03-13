<form id="section-form" action="{{ $personalInfo->exists ? route('admin.personalInfo.update', $personalInfo) : route('admin.personalInfo.store') }}"
      method="post" accept-charset="utf-8" data-controller="form" enctype="multipart/form-data">
    @csrf
    @if ($personalInfo->exists)
        @method('put')
    @endif
    <div class="modal-body nice-scrollbar scrollbar-primary">
        <div id="education-form-fields">
            @include('admin.personalInfo.form._fields')
        </div>
    </div>
    <div class="modal-footer">
        <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
            <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                @if($personalInfo->exists)
                    <x-icon icon="edit"/> @lang('admin.edit') @lang('admin.personal-info')
                @else
                    <x-icon icon="plus"/> @lang('admin.add') @lang('admin.personal-info')
                @endif
            </button>
        </div>
    </div>
</form>
