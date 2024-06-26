<div class="d-flex align-items-center justify-content-between border-bottom p-3">
    <div class="col-2 justify-content-center d-flex">
        <div><img src="{{\Storage::url($service->image)}}" alt="{{$service->title}}" width="50"/></div>
    </div>
    <div class="col-9">
        <div><b>{{ ucfirst($service->title) }}</b></div>
        <div>{{ Str::limit($service->description, 250, ' ...') }}</div>
    </div>
    <div class="col-1 d-flex text-end justify-content-end">
        @can('edit', $service)
            <a href="#" class="me-1" title="@lang('admin.edit')"
               data-controller="remote-modal"
               data-action="remote-modal#toggle"
               data-remote-modal-url-value="{{ route('admin.services.edit', $service) }}"
               data-remote-modal-target-value="#service-form-modal">
                @can('update', $service)
                    <x-icon icon="edit"/>
                @else
                    <x-icon icon="view"/>
                @endcan
            </a>
        @else
            <span class="text-muted"><x-icon icon="view"/></span>
        @endcan
        @can('delete', $service)
            <form method="post" action="{{ route('admin.services.destroy', $service) }}" data-controller="form"
                  data-confirm="@lang('admin.confirms.delete-service')">
                @csrf
                @method('delete')
                <a href="#" class="text-danger" title="@lang('admin.delete')" data-action="form#submit">
                    <x-icon icon="trash"/>
                </a>
            </form>
        @else
            <span class="text-muted"><x-icon icon="trash"/></span>
        @endcan
    </div>
</div>
