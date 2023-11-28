<form id="skill-form" action="{{ $experience->exists ? route('admin.experiences.update', $experience) : route('admin.experiences.store') }}"
      method="post" accept-charset="utf-8" data-controller="form" enctype="multipart/form-data">
    @csrf
    @if ($experience->exists)
        @method('put')
    @endif
    <div class="modal-body nice-scrollbar scrollbar-primary">
        <div id="experience-form-fields">
            @include('admin.experiences.form._fields')
        </div>
    </div>
    <div class="modal-footer">
        <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
            <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                @if($experience->exists)
                    <x-icon icon="edit"/> @lang('admin.edit') @lang('admin.experience')
                @else
                    <x-icon icon="plus"/> @lang('admin.add') @lang('admin.experience')
                @endif
            </button>
        </div>
    </div>
</form>
