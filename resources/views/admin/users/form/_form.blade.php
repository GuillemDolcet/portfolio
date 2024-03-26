<form id="user-form" action="{{ $user->exists ? route('admin.users.update', $user) : route('admin.users.store') }}"
      method="post" accept-charset="utf-8" data-controller="form">
    @csrf
    @if ($user->exists)
        @method('put')
    @endif
    <div class="modal-body nice-scrollbar scrollbar-primary">
        <div id="user-form-fields">
            @include('admin.users.form._fields')
        </div>
    </div>
    <div class="modal-footer">
        <div class="d-flex justify-content-between">
            @if($user->exists)
                @can('manage', $user)
                    <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                        <x-icon icon="edit"/> @lang('admin.edit') @lang('admin.user')
                    </button>
                @endcan
            @else
                @can('manage', $user)
                    <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                        <x-icon icon="plus"/> @lang('admin.add') @lang('admin.user')
                    </button>
                @endcan
            @endif
        </div>
    </div>
</form>
