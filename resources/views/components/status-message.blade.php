<div class="alert {{ $alertClass }} alert-dismissible">
    <div class="d-flex">
        @if (!!$iconClass)
            <div><x-icon class="alert-icon" icon="{{ $iconClass }}" /></div>
        @endif
        <div>
                <h4 class="alert-title">{!! $message !!}</h4>
        </div>
    </div>
    <a class="btn-close" data-bs-dismiss="alert" aria-label="cerrar"></a>
</div>
