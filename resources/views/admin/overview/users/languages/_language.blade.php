<div class="d-flex align-items-center justify-content-between border-bottom p-3">
    <div class="d-flex flex-column col-11">
        <div class="mb-2"><b>{{$userLanguage->name}}</b></div>
        <div class="progress">
            <div class="progress-bar" style="width: {{$userLanguage->level}}%" role="progressbar"
                 aria-valuenow="{{$userLanguage->level}}" aria-valuemin="0" aria-valuemax="100"
                 aria-label="{{$userLanguage->level}}% Complete">
                <span class="visually-hidden">{{$userLanguage->level}}%</span>
            </div>
        </div>
    </div>
    <div class="col d-flex text-end justify-content-end">
        <a href="#" class="me-1" title="@lang('admin.edit')"
           data-controller="remote-modal"
           data-action="remote-modal#toggle"
           data-remote-modal-url-value="{{ route('admin.users.languages.edit', $userLanguage) }}"
           data-remote-modal-target-value="#language-form-modal">
            <x-icon icon="edit"/>
        </a>
        <form method="post" action="{{ route('admin.users.languages.destroy', $userLanguage) }}" data-controller="form"
              data-confirm="@lang('admin.confirms.delete-skill')">
            @csrf
            @method('delete')
            <a href="#" class="text-danger" title="@lang('admin.delete')" data-action="form#submit">
                <x-icon icon="trash"/>
            </a>
        </form>
    </div>
</div>
