<form id="personal-info-form" action="{{ $personalInfo->exists ? route('admin.personalInfo.update', $personalInfo) : route('admin.personalInfo.store') }}"
      @if(($personalInfo->exists && !Auth::user()->can('update', $personalInfo)) || (!$personalInfo->exists && !Auth::user()->can('store', $personalInfo))) {{ "data-disabled=true" }} @endif
      method="post" accept-charset="utf-8" data-controller="form" enctype="multipart/form-data">
    @csrf
    @if ($personalInfo->exists)
        @method('put')
    @endif
    <div class="modal-body nice-scrollbar scrollbar-primary">
        <div id="education-form-fields">
            @include('admin.personalInfo.form._fields')
        </div>
    </div>
    <div class="modal-footer">
        <div class="d-flex justify-content-between">
            @if($personalInfo->exists)
                @can('update', $personalInfo)
                    <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                        <x-icon icon="edit"/> @lang('admin.edit') @lang('admin.personal-info')
                    </button>
                @endcan
            @else
                @can('store', $personalInfo)
                    <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                        <x-icon icon="plus"/> @lang('admin.add') @lang('admin.personal-info')
                    </button>
                @endcan
            @endif
        </div>
    </div>
</form>
