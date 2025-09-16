@props([
    'name',
    'show' => false,
    'maxWidth' => 'lg' // Bootstrap modal sizes: 'sm', 'lg', 'xl'
])

@php
    $modalSizeClass = '';
    if ($maxWidth === 'sm') {
        $modalSizeClass = 'modal-sm';
    } elseif ($maxWidth === 'lg') {
        $modalSizeClass = 'modal-lg';
    } elseif ($maxWidth === 'xl') {
        $modalSizeClass = 'modal-xl';
    }
@endphp

<div class="modal fade" id="{{ $name }}" tabindex="-1" aria-labelledby="{{ $name }}Label" aria-hidden="true">
    <div class="modal-dialog {{ $modalSizeClass }}">
        <div class="modal-content">
            {{ $slot }}
        </div>
    </div>
</div>
