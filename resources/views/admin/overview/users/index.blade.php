<div class="container-lg">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div class="row">
                            <div class="col-2"><img alt="avatar" class="rounded" src="data:image/jpg;base64,{{ $user->avatar }}"/></div>
                            <div class="col-10 d-flex flex-column">
                                <div class="mb-2"><h2 class="page-title">{{$user->name}}</h2></div>
                                <div class="d-flex flex-wrap text-muted">
                                    <div class="me-2 mb-2"><small><x-icon class="me-1" icon="location"/> Location</small></div>
                                    <div class="me-2 mb-2"><small><x-icon class="me-1" icon="mail"/> {{$user->email}}</small></div>
                                    <div class="me-2 mb-2"><small><x-icon class="me-1" icon="phone"/> +34 444 444 444</small></div>
                                    <div class="me-2 mb-2"><small><x-icon class="me-1" icon="location"/> Location</small></div>
                                    <div class="me-2 mb-2"><small><x-icon class="me-1" icon="mail"/> {{$user->email}}</small></div>
                                    <div class="me-2 mb-2"><small><x-icon class="me-1" icon="phone"/> +34 444 444 444</small></div>
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
