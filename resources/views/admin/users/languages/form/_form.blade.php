<form id="users-form" action="{{ $userLanguage->exists ? route('admin.users.languages.update', $userLanguage) : route('admin.users.languages.store') }}"
      method="post" accept-charset="utf-8" data-controller="form">
    @csrf
    @if ($userLanguage->exists)
        @method('put')
    @endif
    <div class="modal-body nice-scrollbar scrollbar-primary">
        <div id="user-form-fields">
            @include('admin.users.languages.form._fields')
        </div>
    </div>
    <div class="modal-footer">
        <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
            <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                @if($userLanguage->exists)
                    <x-icon icon="edit"/> @lang('admin.edit') @lang('admin.user')
                @else
                    <x-icon icon="user-plus"/> @lang('admin.add') @lang('admin.user')
                @endif
            </button>
        </div>
    </div>
</form>
