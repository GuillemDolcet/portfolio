<div class="d-flex align-items-center justify-content-between border-bottom p-3">
    <div class="col-2"><img src="{{\Storage::url($hobby->image)}}" alt="{{$hobby->name}}" width="50"/></div>
    <div class="col-8"><b>{{$hobby->name}}</b></div>
    <div class="col-2 d-flex text-end justify-content-end">
        <a href="#" class="me-1" title="@lang('admin.edit')"
           data-controller="remote-modal"
           data-action="remote-modal#toggle"
           data-remote-modal-url-value="{{ route('admin.hobbies.edit', $hobby) }}"
           data-remote-modal-target-value="#hobby-form-modal">
            <x-icon icon="edit"/>
        </a>
        <form method="post" action="{{ route('admin.hobbies.destroy', $hobby) }}" data-controller="form"
              data-confirm="@lang('admin.confirms.delete-hobby')">
            @csrf
            @method('delete')
            <a href="#" class="text-danger" title="@lang('admin.delete')" data-action="form#submit">
                <x-icon icon="trash"/>
            </a>
        </form>
    </div>
</div>
