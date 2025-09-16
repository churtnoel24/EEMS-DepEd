@props(['align' => 'right'])

@php
    $dropdownMenuClass = 'dropdown-menu';
    if ($align === 'left') {
        $dropdownMenuClass .= ' dropdown-menu-start';
    } else {
        $dropdownMenuClass .= ' dropdown-menu-end';
    }
@endphp

<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ $trigger }}
    </button>
    <div class="{{ $dropdownMenuClass }}">
        {{ $content }}
    </div>
</div>
