<div class="d-flex align-items-center justify-content-between p-3 border-end border-bottom">
    <div class="col justify-content-center d-flex">
        <div><img src="{{\Storage::url($skill->image)}}" alt="{{$skill->name}}" width="75"/></div>
    </div>
    <div class="d-flex flex-column col-6">
        <div class="mb-2"><b>{{$skill->name}}</b></div>
        <div class="progress">
            <div class="progress-bar" style="width: {{$skill->level}}%" role="progressbar"
                 aria-valuenow="{{$skill->level}}" aria-valuemin="0" aria-valuemax="100"
                 aria-label="{{$skill->level}}% Complete">
                <span class="visually-hidden">{{$skill->level}}%</span>
            </div>
        </div>
    </div>
    <div class="col-3 d-flex text-end justify-content-end">
        @can('edit', $skill)
            <a href="#" class="me-1" title="@lang('admin.edit')"
               data-controller="remote-modal"
               data-action="remote-modal#toggle"
               data-remote-modal-url-value="{{ route('admin.skills.edit', $skill) }}"
               data-remote-modal-target-value="#skill-form-modal">
                @can('update', $skill)
                    <x-icon icon="edit"/>
                @else
                    <x-icon icon="view"/>
                @endcan
            </a>
        @else
            <span class="text-muted"><x-icon icon="view"/></span>
        @endcan
        @can('delete', $skill)
            <form method="post" action="{{ route('admin.skills.destroy', $skill) }}" data-controller="form"
                  data-confirm="@lang('admin.confirms.delete-skill')">
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
