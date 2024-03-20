<form id="section-form" action="{{ $section->exists ? route('admin.sections.update', $section) : route('admin.sections.store') }}"
      @if(($section->exists && !Auth::user()->can('update', $section)) || (!$section->exists && !Auth::user()->can('store', $section))) {{ "data-disabled=true" }} @endif
      method="post" accept-charset="utf-8" data-controller="form" enctype="multipart/form-data">
    @csrf
    @if ($section->exists)
        @method('put')
    @endif
    <div class="modal-body nice-scrollbar scrollbar-primary">
        <div id="section-form-fields">
            @include('admin.sections.form._fields')
        </div>
    </div>
    <div class="modal-footer">
        <div class="d-flex justify-content-between">
            @if($section->exists)
                @can('update', $section)
                    <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                        <x-icon icon="edit"/> @lang('admin.edit') @lang('admin.section')
                    </button>
                @endcan
            @else
                @can('store', $section)
                    <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                        <x-icon icon="plus"/> @lang('admin.add') @lang('admin.section')
                    </button>
                @endcan
            @endif
        </div>
    </div>
</form>
