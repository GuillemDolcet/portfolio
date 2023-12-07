<form id="skill-form" action="{{ $education->exists ? route('admin.education.update', $education) : route('admin.education.store') }}"
      method="post" accept-charset="utf-8" data-controller="form" enctype="multipart/form-data">
    @csrf
    @if ($education->exists)
        @method('put')
    @endif
    <div class="modal-body nice-scrollbar scrollbar-primary">
        <div id="education-form-fields">
            @include('admin.education.form._fields')
        </div>
    </div>
    <div class="modal-footer">
        <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
            <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                @if($education->exists)
                    <x-icon icon="edit"/> @lang('admin.edit') @lang('admin.education')
                @else
                    <x-icon icon="plus"/> @lang('admin.add') @lang('admin.education')
                @endif
            </button>
        </div>
    </div>
</form>
