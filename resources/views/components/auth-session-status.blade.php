@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'alert alert-success mb-2 small fw-medium']) }}>
        {{ $status }}
    </div>
@endif
