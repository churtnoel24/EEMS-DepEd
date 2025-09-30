@extends('layouts.app')

@section('content')
    <div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Create Dental Card</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('dental-card.store') }}" class="needs-validation" novalidate>
                        @csrf

                        {{-- Health Card Select --}}
                        <div class="mb-3">
                            <label for="health_card_id" class="form-label">Select Health Card</label>
                            <select class="form-select" id="health_card_id" name="health_card_id" required>
                                <option value="">-- Choose an existing user --</option>
                                @foreach ($healthCards as $card)
                                    <option value="{{ $card->id }}">
                                        {{ $card->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="region" class="form-label">Region</label>
                                <input type="text" class="form-control" id="region" name="region" placeholder="Region">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="division" class="form-label">Division</label>
                                <input type="text" class="form-control" id="division" name="division" placeholder="Division">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="district" class="form-label">District</label>
                                <input type="text" class="form-control" id="district" name="district" placeholder="District">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="school" class="form-label">School</label>
                                <input type="text" class="form-control" id="school" name="school" placeholder="School">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Submit
                            </button>
                        </div>
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
