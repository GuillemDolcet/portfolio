<form id="service-form" action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}"
      method="post" accept-charset="utf-8" data-controller="form" enctype="multipart/form-data">
    @csrf
    @if ($service->exists)
        @method('put')
    @endif
    <div class="modal-body nice-scrollbar scrollbar-primary">
        <div id="service-form-fields">
            @include('admin.services.form._fields')
        </div>
    </div>
    <div class="modal-footer">
        <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
            <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                @if($service->exists)
                    <x-icon icon="edit"/> @lang('admin.edit') @lang('admin.service')
                @else
                    <x-icon icon="plus"/> @lang('admin.add') @lang('admin.service')
                @endif
            </button>
        </div>
    </div>
</form>
