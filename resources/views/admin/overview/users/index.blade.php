<div class="container-lg">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="row align">
                    <div class="col-11">
                        <div class="row align-items-center">
                            <div class="col-2"><img alt="avatar" class="rounded"
                                                    src="data:image/jpg;base64,{{ $user->avatar }}"/></div>
                            <div class="col-10 d-flex flex-column">
                                <div class="mb-2"><h2 class="page-title">{{$user->name}}</h2></div>
                                <div class="d-flex">
                                    <div class="d-flex flex-column text-muted mt-2">
                                        <div class="me-2 mb-2"><small>
                                                <x-icon class="me-1" icon="location"/> {{$user->location}}</small></div>
                                        <div class="me-2 mb-2"><small>
                                                <x-icon class="me-1" icon="mail"/> {{$user->email}}</small></div>
                                        <div class="me-2"><small>
                                                <x-icon class="me-1" icon="phone"/> {{$user->phone}}</small></div>
                                    </div>
                                    <div class="d-flex flex-column text-muted mt-2 ms-4">
                                        @if(!is_null($user->linkedin))
                                            <div class="me-2 mb-2">
                                                <a href="https://www.linkedin.com/in/{{$user->linkedin}}">
                                                    <small><x-icon class="me-1" icon="linkedin"/> {{$user->linkedin}}</small>
                                                </a>
                                            </div>
                                        @endif
                                        @if(!is_null($user->x))
                                            <div class="me-2 mb-2">
                                                <a href="https://twitter.com/{{$user->x}}">
                                                    <small><x-icon class="me-1" icon="x"/> {{$user->x}}</small>
                                                </a>
                                            </div>
                                        @endif
                                        @if(!is_null($user->instagram))
                                            <div class="me-2">
                                                <a href="https://instagram.com/{{$user->instagram}}">
                                                    <small><x-icon class="me-1" icon="instagram"/> {{$user->instagram}}</small>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="d-flex justify-content-end">
                            <a href="#"
                               data-controller="remote-modal"
                               data-action="remote-modal#toggle"
                               data-remote-modal-url-value="{{ route('admin.users.edit', $user) }}"
                               data-remote-modal-target-value="#user-form-modal">
                                <x-icon icon="edit"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
