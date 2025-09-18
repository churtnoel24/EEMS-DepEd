@extends('layouts.app')

@section('header')
    <h2 class="fw-semibold fs-4 text-dark mb-0">
        {{ __('Health Card Details') }}
    </h2>
@endsection


@section('content')
<div class="container mt-3">
<form method="POST" action="{{ route('health-cards.update', $healthCard->id) }}">
    @csrf
    @method('PUT')

      {{-- Personal Information --}}
           @include('health-card.partials.personal-information')

            {{-- Professional Information --}}
            @include('health-card.partials.professional-information')


            {{-- Family History --}}
            @include('health-card.partials.family-history')

            {{-- Past Medical History --}}
            @include('health-card.partials.past-medical-history')

            {{-- Last Taken --}}
            @include('health-card.partials.last-taken')

            {{-- Social History --}}
            @include('health-card.partials.social-history')

            {{-- OB-GYN History --}}
            @include('health-card.partials.ob-gyn-history')

            {{-- For Male Personnel --}}
            @include('health-card.partials.for-male')

            {{-- Present Health Status --}}
           @include('health-card.partials.present-health-status')

            <div class="text-end mt-4">
                <button class="btn btn-primary px-4">Save Changes</button>
            </div>
</form>
</div>

@endsection
