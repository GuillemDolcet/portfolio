<form id="education-form" action="{{ $education->exists ? route('admin.education.update', $education) : route('admin.education.store') }}"
      @if(($education->exists && !Auth::user()->can('update', $education)) || (!$education->exists && !Auth::user()->can('store', $education))) {{ "data-disabled=true" }} @endif
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
            @if($education->exists)
                @can('update', $education)
                    <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                        <x-icon icon="edit"/> @lang('admin.edit') @lang('admin.education')
                    </button>
                @endcan
            @else
                @can('store', $education)
                    <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                        <x-icon icon="plus"/> @lang('admin.add') @lang('admin.education')
                    </button>
                @endcan
            @endif
        </div>
    </div>
</form>
