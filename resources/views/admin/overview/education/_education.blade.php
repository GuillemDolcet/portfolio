<div class="d-flex align-items-center justify-content-between border-bottom p-3">
    <div class="d-flex flex-column col-9">
        <div><b>{{$educationModel->school}}</b></div>
        <div>{{$educationModel->degree}}, {{$educationModel->discipline}}</div>
        <div class="text-muted">{{ ucfirst($educationModel->start_date->translatedFormat('F Y')) }} - {{ !is_null($educationModel->finish_date) ? ucfirst($educationModel->finish_date->translatedFormat('F Y')) : Lang::get('admin.currently') }}</div>
        <div class="mt-3">
            @foreach($educationModel->skills as $skill)
                <img class="me-3" src="{{\Storage::url($skill->image)}}" alt="{{$skill->name}}" height="30">
            @endforeach
        </div>
    </div>
    <div class="col-3 d-flex text-end justify-content-end">
        @can('edit', $educationModel)
            <a href="#" class="me-1" title="@lang('admin.education')"
               data-controller="remote-modal"
               data-action="remote-modal#toggle"
               data-remote-modal-url-value="{{ route('admin.education.edit', $educationModel) }}"
               data-remote-modal-target-value="#education-form-modal">
                @can('update', $educationModel)
                    <x-icon icon="edit"/>
                @else
                    <x-icon icon="view"/>
                @endcan
            </a>
        @else
            <span class="text-muted"><x-icon icon="view"/></span>
        @endcan
        @can('delete', $educationModel)
            <form method="post" action="{{ route('admin.education.destroy', $educationModel) }}"
                  data-controller="form"
                  data-confirm="@lang('admin.confirms.delete-education')">
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
