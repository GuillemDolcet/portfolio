<div class="row bg-white border rounded p-3">
        <div class="card-body">
            <div class="row align">
                <div class="col-11">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <img src="{{\Storage::url($personalInfo->image)}}" width="100" alt="{{$personalInfo->firstName}}">
                        </div>
                        <div class="col-10 d-flex flex-column">
                            <div class="mb-2">
                                <h2 class="page-title">{{$personalInfo->firstName}} {{$personalInfo->lastName}}</h2>
                            </div>
                            <div class="d-flex">
                                <div class="d-flex flex-column text-muted mt-2">
                                    <div class="me-2 mb-2">
                                        <small><x-icon class="me-1" icon="location"/> {{$personalInfo->location}}</small>
                                    </div>
                                    <div class="me-2 mb-2">
                                        <small><x-icon class="me-1" icon="mail"/> {{$personalInfo->email}}</small>
                                    </div>
                                    <div class="me-2">
                                        <small><x-icon class="me-1" icon="phone"/> {{$personalInfo->phone}}</small>
                                    </div>
                                </div>
                                <div class="d-flex flex-column text-muted mt-2 ms-4">
                                    @if(!is_null($personalInfo->linkedin))
                                        <div class="me-2 mb-2">
                                            <a href="https://www.linkedin.com/in/{{$personalInfo->linkedin}}" target="_blank">
                                                <small><x-icon class="me-1" icon="linkedin"/> {{$personalInfo->linkedin}}</small>
                                            </a>
                                        </div>
                                    @endif
                                    @if(!is_null($personalInfo->github))
                                        <div class="me-2 mb-2">
                                            <a href="https://www.github.com/{{$personalInfo->github}}" target="_blank">
                                                <small><x-icon class="me-1" icon="github"/>{{$personalInfo->github}}</small>
                                            </a>
                                        </div>
                                    @endif
                                    @if(!is_null($personalInfo->twitter))
                                        <div class="me-2 mb-2">
                                            <a href="https://twitter.com/{{$personalInfo->twitter}}" target="_blank">
                                                <small><x-icon class="me-1" icon="x"/> {{$personalInfo->twitter}}</small>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <div class="d-flex flex-column text-muted mt-2 ms-4">
                                    <div class="me-2 mb-2">
                                        <a href="{{ route('personalInfo.downloadCv', $personalInfo) }}">
                                            <x-icon class="me-1" icon="cv"/> @lang('admin.download_cv')
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="d-flex justify-content-end">
                        @can('edit', $personalInfo)
                            <a href="#"
                               data-controller="remote-modal"
                               data-action="remote-modal#toggle"
                               data-remote-modal-url-value="{{ route('admin.personalInfo.edit', $personalInfo) }}"
                               data-remote-modal-target-value="#personal-info-form-modal">
                                @can('update', $personalInfo)
                                    <x-icon icon="edit"/>
                                @else
                                    <x-icon icon="view"/>
                                @endcan
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
    </div>
</div>
