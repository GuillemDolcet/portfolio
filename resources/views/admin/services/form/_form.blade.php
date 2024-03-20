<form id="service-form" action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}"
      @if(($service->exists && !Auth::user()->can('update', $service)) || (!$service->exists && !Auth::user()->can('store', $service))) {{ "data-disabled=true" }} @endif
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
            @if($service->exists)
                @can('update', $service)
                    <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                        <x-icon icon="edit"/> @lang('admin.edit') @lang('admin.service')
                    </button>
                @endcan
            @else
                @can('store', $service)
                    <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                        <x-icon icon="plus"/> @lang('admin.add') @lang('admin.service')
                    </button>
                @endcan
            @endif
        </div>
    </div>
</form>
