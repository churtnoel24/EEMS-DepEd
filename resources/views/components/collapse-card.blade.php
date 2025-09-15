<div class="card mb-4">
    <div class="card-header fw-bold">
        <a class="d-flex justify-content-between text-decoration-none text-dark"
           data-bs-toggle="collapse" href="#{{ $id }}" aria-expanded="false" aria-controls="{{ $id }}">
            <span>{{ $title }}</span>
            <i class="bi bi-chevron-down"></i>
        </a>
    </div>
    <div id="{{ $id }}" class="collapse">
        <div class="card-body">
            {{ $slot }}
        </div>
    </div>
</div>
