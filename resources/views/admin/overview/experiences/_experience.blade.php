<div class="d-flex align-items-center justify-content-between border-bottom p-3">
    <div class="d-flex flex-column col-10">
        <div><b>{{$experience->position}}</b></div>
        <div>{{$experience->company}}</div>
        <div class="text-muted">{{ ucfirst($experience->start_date->translatedFormat('F Y')) }} - {{ !is_null($experience->finish_date) ? ucfirst($experience->finish_date->translatedFormat('F Y')) : Lang::get('admin.currently') }}</div>
        <div class="mt-3">
            @foreach($experience->skills as $skill)
                <img class="me-3" src="{{\Storage::url($skill->image)}}" alt="{{$skill->name}}" height="30">
            @endforeach
        </div>
    </div>
    <div class="col-2 d-flex text-end justify-content-end">
        @can('edit', $experience)
            <a href="#" class="me-1" title="@lang('admin.experience')"
               data-controller="remote-modal"
               data-action="remote-modal#toggle"
               data-remote-modal-url-value="{{ route('admin.experiences.edit', $experience) }}"
               data-remote-modal-target-value="#experience-form-modal">
                @can('update', $experience)
                    <x-icon icon="edit"/>
                @else
                    <x-icon icon="view"/>
                @endcan
            </a>
        @else
            <span class="text-muted"><x-icon icon="view"/></span>
        @endcan
        @can('delete', $experience)
            <form method="post" action="{{ route('admin.experiences.destroy', $experience) }}"
                  data-controller="form"
                  data-confirm="@lang('admin.confirms.delete-experience')">
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
