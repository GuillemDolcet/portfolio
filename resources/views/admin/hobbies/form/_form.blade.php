<form id="skill-form" action="{{ $hobby->exists ? route('admin.hobbies.update', $hobby) : route('admin.hobbies.store') }}"
      method="post" accept-charset="utf-8" data-controller="form" enctype="multipart/form-data">
    @csrf
    @if ($hobby->exists)
        @method('put')
    @endif
    <div class="modal-body nice-scrollbar scrollbar-primary">
        <div id="hobby-form-fields">
            @include('admin.hobbies.form._fields')
        </div>
    </div>
    <div class="modal-footer">
        <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
            <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                @if($hobby->exists)
                    <x-icon icon="edit"/> @lang('admin.edit') @lang('admin.hobby')
                @else
                    <x-icon icon="plus"/> @lang('admin.add') @lang('admin.hobby')
                @endif
            </button>
        </div>
    </div>
</form>
