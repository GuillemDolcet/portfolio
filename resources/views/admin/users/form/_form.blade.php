<form id="orders-form" action="{{ $user->exists ? route('admin.users.update', $user) : route('admin.users.store') }}"
      method="post" accept-charset="utf-8" data-controller="form">
    @csrf
    @if ($user->exists)
        @method('put')
    @endif
    <div class="modal-body nice-scrollbar scrollbar-primary">
        <div id="vendor-form-fields">
            @include('admin.users.form._fields')
        </div>
    </div>
    <div class="modal-footer">
        <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
            <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                @if($user->exists)
                    <x-icon icon="edit"/> Edit user
                @else
                    <x-icon icon="user-plus"/> Add user
                @endif
            </button>
        </div>
    </div>
</form>
