@props(['type' => 'info'])

@php
$borderClass = 'border-primary';
if ($type === 'error') {
    $borderClass = 'border-danger';
} else if ($type != 'info') {
    $borderClass = "border-{$type}";
}

$iconName = 'info-circle';
if ($type === 'success') {
    $iconName = 'check';
} elseif ($type === 'error') {
    $iconName = 'alert-circle';
}

$iconColorClass = 'text-primary';
if ($type === 'success') {
    $iconColorClass = 'text-success';
} else if ($type === 'error') {
    $iconColorClass = 'text-danger';
}
@endphp

<div {{ $attributes->merge(['class' => "toast border border-2 shadow-sm {$borderClass}"]) }}
    data-controller="toast" data-toast-auto-show-value="true">
    <div class="d-flex align-items-center justify-content-between p-1">
        <div class="{{ $iconColorClass }}">
            <x-icon icon="{{ $iconName }}" class="icon-md icon-tada" />
        </div>
        <div class="toast-body w-100 text-body">{{ $slot }}</div>
        <button type="button" class="btn-close mt-1 me-1 align-self-start" data-bs-dismiss="toast"></button>
    </div>
</div>
