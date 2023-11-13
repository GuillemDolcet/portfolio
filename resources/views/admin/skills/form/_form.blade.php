<form id="skill-form" action="{{ $skill->exists ? route('admin.skills.update', $skill) : route('admin.skills.store') }}"
      method="post" accept-charset="utf-8" data-controller="form" enctype="multipart/form-data">
    @csrf
    @if ($skill->exists)
        @method('put')
    @endif
    <div class="modal-body nice-scrollbar scrollbar-primary">
        <div id="skill-form-fields">
            @include('admin.skills.form._fields')
        </div>
    </div>
    <div class="modal-footer">
        <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
            <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                @if($skill->exists)
                    <x-icon icon="edit"/> @lang('admin.edit') @lang('admin.skill')
                @else
                    <x-icon icon="plus"/> @lang('admin.add') @lang('admin.skill')
                @endif
            </button>
        </div>
    </div>
</form>
