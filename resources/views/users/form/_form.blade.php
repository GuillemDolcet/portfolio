<form id="orders-form" action="{{ $user->exists ? route('users.update', $user) : route('users.store') }}"
      method="post" accept-charset="utf-8">
    @csrf
    @if ($user->exists)
        @method('put')
    @endif
    <div class="modal-body nice-scrollbar scrollbar-primary">
        <div id="vendor-form-fields">
            @include('users.form._fields')
        </div>
    </div>
    <div class="modal-footer">
        <div class="d-flex">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancelar</a>
            <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                <x-icon icon="send"/> Enviar
            </button>
        </div>
    </div>
</form>
