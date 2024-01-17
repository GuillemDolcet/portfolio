<div class="container-lg">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="row align">
                    <div class="col-8">
                        <div class="row align-items-center">
                            <div class="col-3"><img alt="avatar" class="rounded" src="data:image/jpg;base64,{{ $user->avatar }}"/></div>
                            <div class="col-9 d-flex flex-column">
                                <div class="mb-2"><h2 class="page-title">{{$user->name}}</h2></div>
                                <div class="d-flex flex-column text-muted mt-2">
                                    <div class="me-2 mb-2"><small><x-icon class="me-1" icon="location"/> {{$user->location}}</small></div>
                                    <div class="me-2 mb-2"><small><x-icon class="me-1" icon="mail"/> {{$user->email}}</small></div>
                                    <div class="me-2"><small><x-icon class="me-1" icon="phone"/> {{$user->phone}}</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
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
