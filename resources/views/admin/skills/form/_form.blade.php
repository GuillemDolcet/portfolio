<form id="skill-form" action="{{ $skill->exists ? route('admin.skills.update', $skill) : route('admin.skills.store') }}"
      @if(($skill->exists && !Auth::user()->can('update', $skill)) || (!$skill->exists && !Auth::user()->can('store', $skill))) {{ "data-disabled=true" }} @endif
      method="post" accept-charset="utf-8" data-controller="form" enctype="multipart/form-data">
    @csrf
    @if ($skill->exists)
        @method('put')
    @endif
    <div class="modal-body nice-scrollbar scrollbar-primary">
        <div id="skill-form-fields">
            @include('admin.skills.form._fields')
        </div>
    </div>
    <div class="modal-footer">
        <div class="d-flex justify-content-between">
            @if($skill->exists)
                @can('update', $skill)
                    <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                        <x-icon icon="edit"/> @lang('admin.edit') @lang('admin.skill')
                    </button>
                @endcan
            @else
                @can('store', $skill)
                    <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                        <x-icon icon="plus"/> @lang('admin.add') @lang('admin.skill')
                    </button>
                @endcan
            @endif
        </div>
    </div>
</form>
