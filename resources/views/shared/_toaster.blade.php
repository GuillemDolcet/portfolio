@section('toaster')
<div id="toaster" class="toast-container position-fixed top-0 end-0 py-4 px-3" style="z-index: 5050;">
    @if (session()->has('status') && session()->get('status.message'))
        <x-simple-toast type="{{ session()->get('status.type') }}">{!! session()->get('status.message') !!}</x-simple-toast>
    @endif

    @stack('toaster-contents')
</div>
@show
