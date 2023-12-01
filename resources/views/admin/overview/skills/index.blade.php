<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="d-flex justify-content-between mb-2">
                    <div><h2 class="page-title">@lang('admin.skills')</h2></div>
                    <div><a href="#"
                            data-controller="remote-modal"
                            data-action="remote-modal#toggle"
                            data-remote-modal-url-value="{{ route('admin.skills.create') }}"
                            data-remote-modal-target-value="#skill-form-modal">
                            <x-icon icon="plus"/>
                        </a></div>
                </div>
                @if(!empty($skills))
                    <div class="d-flex flex-column">
                        @foreach($skills as $skill)
                            <div class="d-flex align-items-center justify-content-between p-3">
                                <div class="col-1 me-4"><img src="{{\Storage::url($skill->image)}}" alt="{{$skill->name}}" width="32" height="32"/></div>
                                <div class="d-flex flex-column col-10">
                                    <div class="mb-2"><b>{{$skill->name}}</b></div>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: {{$skill->level}}%" role="progressbar" aria-valuenow="{{$skill->level}}" aria-valuemin="0" aria-valuemax="100" aria-label="{{$skill->level}}% Complete">
                                            <span class="visually-hidden">{{$skill->level}}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-red">Empty</div>
                @endif
            </div>
        </div>
    </div>
</div>

