<form id="skill-form" action="{{ $experience->exists ? route('admin.experiences.update', $experience) : route('admin.experiences.store') }}"
      @if(($experience->exists && !Auth::user()->can('update', $experience)) || (!$experience->exists && !Auth::user()->can('store', $experience))) {{ "data-disabled=true" }} @endif
      method="post" accept-charset="utf-8" data-controller="form" enctype="multipart/form-data">
    @csrf
    @if ($experience->exists)
        @method('put')
    @endif
    <div class="modal-body nice-scrollbar scrollbar-primary">
        <div id="experience-form-fields">
            @include('admin.experiences.form._fields')
        </div>
    </div>
    <div class="modal-footer">
        <div class="d-flex justify-content-between">
            @if($experience->exists)
                @can('update', $experience)
                    <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                        <x-icon icon="edit"/> @lang('admin.edit') @lang('admin.experience')
                    </button>
                @endcan
            @else
                @can('store', $experience)
                    <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                        <x-icon icon="plus"/> @lang('admin.add') @lang('admin.experience')
                    </button>
                @endcan
            @endif
        </div>
    </div>
</form>
