@extends('layouts.app')

@section('header')
    <h2 class="fw-semibold fs-4 text-dark mb-0">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <span class="fs-5">{{ __("You're logged in!") }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
