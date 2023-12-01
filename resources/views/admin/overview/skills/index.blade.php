<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="d-flex justify-content-between mb-4">
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
                    <div class="d-flex">
                        @foreach($skills as $skill)
                            <div class="d-flex align-items-center">
                                <div class="col-5"><img src="{{\Storage::url($skill->image)}}" alt="{{$skill->name}}"/></div>
                                <div class="col-7">
                                    <div><h4>{{$skill->name}}</h4></div>
                                    <div>Level: {{$skill->level}}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div>No skills</div>
                @endif
            </div>
        </div>
    </div>
</div>

