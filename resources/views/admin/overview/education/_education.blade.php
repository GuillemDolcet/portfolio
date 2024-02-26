<div class="d-flex align-items-center justify-content-between border-bottom p-3">
    <div class="d-flex flex-column col-9">
        <div><b>{{$educationModel->school}}</b></div>
        <div>{{$educationModel->degree}}, {{$educationModel->discipline}}</div>
        <div class="text-muted">{{ ucfirst($educationModel->start_date->translatedFormat('F Y')) }} - {{ ucfirst($educationModel->finish_date->translatedFormat('F Y')) }}</div>
        <div class="mt-3">
            @lang('admin.skills'):
            @foreach($educationModel->skills as $skill)
                <img class="ms-3" src="{{\Storage::url($skill->image)}}" alt="{{$skill->name}}" height="30">
            @endforeach
        </div>
    </div>
    <div class="col-3 d-flex text-end justify-content-end">
        <a href="#" class="me-1" title="@lang('admin.edit')"
           data-controller="remote-modal"
           data-action="remote-modal#toggle"
           data-remote-modal-url-value="{{ route('admin.education.edit', $educationModel) }}"
           data-remote-modal-target-value="#education-form-modal">
            <x-icon icon="edit"/>
        </a>
        <form method="post" action="{{ route('admin.education.destroy', $educationModel) }}" data-controller="form"
              data-confirm="@lang('admin.confirms.delete-education')">
            @csrf
            @method('delete')
            <a href="#" class="text-danger" title="@lang('admin.delete')" data-action="form#submit">
                <x-icon icon="trash"/>
            </a>
        </form>
    </div>
</div>
