@extends('layouts.app')

@section('header')
    <h2 class="fw-semibold fs-4 text-dark mb-0">
        {{ __('Consultation & Treatment Records') }}
    </h2>
@endsection

@section('content')
<div class="container mt-3">
    <div class="card">

        <div class="container mt-3">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>All Records</span>
            <form method="GET" action="{{ route('health-card.ctrs') }}" class="d-flex">
                <input type="text"
                       name="q"
                       class="form-control me-2"
                       placeholder="Search by patient name"
                       value="{{ request('q') }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>


        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Patient Name</th>
                        <th>Date of Consultation</th>
                        <th>Chief Complaint</th>
                        <th>Findings</th>
                        <th>Treatment/Recommendation</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ctrs as $ctr)
                        <tr>
                            <td>{{ $ctr->id }}</td>
                            <td>{{ $ctr->healthCard->name ?? '—' }}</td>
                            <td>{{ \Carbon\Carbon::parse($ctr->consultation_date)->format('F d, Y') }}</td>
                            <td>{{ $ctr->symptoms }}</td>
                            <td>{{ $ctr->diagnosis }}</td>
                            <td>{{ $ctr->treatment }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center">No records yet.</td></tr>
                    @endforelse
                </tbody>
            </table>

            {{ $ctrs->links() }}
        </div>
    </div>
</div>
@endsection
