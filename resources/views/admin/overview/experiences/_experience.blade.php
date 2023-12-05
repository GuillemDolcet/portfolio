<div class="d-flex align-items-center justify-content-between border-bottom p-3">
    <div class="d-flex flex-column col-8">
        <div class="mb-2"><b>{{$experience->company}}</b></div>
    </div>
    <div class="col-3 d-flex text-end justify-content-end">
        <a href="#" class="me-1" title="@lang('admin.edit')"
           data-controller="remote-modal"
           data-action="remote-modal#toggle"
           data-remote-modal-url-value="{{ route('admin.experiences.edit', $experience) }}"
           data-remote-modal-target-value="#experience-form-modal">
            <x-icon icon="edit"/>
        </a>
        <form method="post" action="{{ route('admin.experiences.destroy', $experience) }}" data-controller="form"
              data-confirm="@lang('admin.confirms.delete-experience')">
            @csrf
            @method('delete')
            <a href="#" class="text-danger" title="@lang('admin.delete')" data-action="form#submit">
                <x-icon icon="trash"/>
            </a>
        </form>
    </div>
</div>
