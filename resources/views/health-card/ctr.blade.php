@extends('layouts.app')

@section('header')
    <h2 class="fw-semibold fs-4 text-dark mb-0">
        {{ __('Consultation and Treatment Record') }}
    </h2>
@endsection

@section('content')
<div class="container mt-2">

     {{-- Flash messages --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger position-fixed top-30 end-0 shadow fade show m-3" style="z-index: 1050; opacity: 0.85;">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Consultation and Treatment Record') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('health-card.ctrstore') }}">
                        @csrf

                        <!-- Patient Name (Searchable) -->
                        <div class="mb-3">
                            <label for="health_card_id" class="form-label">Patient Name</label>
                            <select id="health_card_id" name="health_card_id" class="form-select" style="width:100%"></select>
                        </div>

                        <!-- Date of Consultation -->
                        <div class="mb-3">
                            <label for="consultation_date" class="form-label">Date of Consultation</label>
                            <input type="date" class="form-control" id="consultation_date" name="consultation_date" required>
                        </div>

                        <!-- Chief Complaint -->
                        <div class="mb-3">
                            <label for="symptoms" class="form-label">Chief Complaint</label>
                            <textarea class="form-control" id="symptoms" name="symptoms" rows="3" required></textarea>
                        </div>

                        <!-- Findings -->
                        <div class="mb-3">
                            <label for="diagnosis" class="form-label">Findings</label>
                            <textarea class="form-control" id="diagnosis" name="diagnosis" rows="3" required></textarea>
                        </div>

                        <!-- Treatment / Recommendation -->
                        <div class="mb-3">
                            <label for="treatment" class="form-label">Treatment/Recommendation</label>
                            <textarea class="form-control" id="treatment" name="treatment" rows="3" required></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#health_card_id').select2({
        placeholder: 'Search patient...',
        ajax: {
            url: '{{ route("health-cards.search") }}',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return { q: params.term || '' };
            },
            processResults: function(data) {
                return {
                    results: data.map(function(card) {
                        return { id: card.id, text: card.name };
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 1
    });
});
</script>
@endpush

