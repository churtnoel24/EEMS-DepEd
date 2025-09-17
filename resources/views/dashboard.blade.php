@extends('layouts.app')

@section('header')
    <h2 class="fw-semibold fs-4 text-dark mb-0">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
   <div class="container mt-4">
        <!-- Stats Overview -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted small mb-1">TODAY'S APPOINTMENTS</p>
                                <h3 class="text-primary mb-0">12</h3>
                            </div>
                            <div class="bg-primary p-3 rounded-circle">
                                <i class="bi bi-calendar-check text-white fs-4"></i>
                            </div>
                        </div>
                        <div class="small text-success mt-2">
                            <i class="bi bi-arrow-up"></i> 2 from yesterday
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted small mb-1">MEDICAL RECORDS</p>
                                <h3 class="text-success mb-0">1,428</h3>
                            </div>
                            <div class="bg-success p-3 rounded-circle">
                                <i class="bi bi-file-medical text-white fs-4"></i>
                            </div>
                        </div>
                        <div class="small text-muted mt-2">
                            +24 this week
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted small mb-1">PENDING REQUESTS</p>
                                <h3 class="text-warning mb-0">7</h3>
                            </div>
                            <div class="bg-warning p-3 rounded-circle">
                                <i class="bi bi-clock-history text-white fs-4"></i>
                            </div>
                        </div>
                        <div class="small text-danger mt-2">
                            <i class="bi bi-exclamation-triangle"></i> 3 urgent
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted small mb-1">HEALTH ALERTS</p>
                                <h3 class="text-danger mb-0">5</h3>
                            </div>
                            <div class="bg-danger p-3 rounded-circle">
                                <i class="bi bi-exclamation-triangle text-white fs-4"></i>
                            </div>
                        </div>
                        <div class="small text-muted mt-2">
                            Requires attention
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-8">
                <!-- Quick Actions -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Quick Actions</h5>
                        <div class="row g-3">
                            <div class="col-sm-3 col-6">
                                <div class="d-flex flex-column align-items-center justify-content-center p-3 bg-light rounded text-center h-100">
                                    <i class="bi bi-person-plus fs-3 text-primary mb-2"></i>
                                    <span>New Employee</span>
                                </div>
                            </div>
                            <div class="col-sm-3 col-6">
                                <div class="d-flex flex-column align-items-center justify-content-center p-3 bg-light rounded text-center h-100">
                                    <i class="bi bi-file-medical fs-3 text-primary mb-2"></i>
                                    <span>New Record</span>
                                </div>
                            </div>
                            <div class="col-sm-3 col-6">
                                <div class="d-flex flex-column align-items-center justify-content-center p-3 bg-light rounded text-center h-100">
                                    <i class="bi bi-calendar-plus fs-3 text-primary mb-2"></i>
                                    <span>Schedule</span>
                                </div>
                            </div>
                            <div class="col-sm-3 col-6">
                                <div class="d-flex flex-column align-items-center justify-content-center p-3 bg-light rounded text-center h-100">
                                    <i class="bi bi-clipboard-data fs-3 text-primary mb-2"></i>
                                    <span>Reports</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Recent Medical Activity</h5>
                        <div class="border-start border-primary ps-3 mb-3">
                            <div class="d-flex justify-content-between">
                                <strong>John Doe - Annual Physical Exam</strong>
                                <span class="text-muted small">Today, 10:30 AM</span>
                            </div>
                            <p class="mb-0 text-muted">Results are within normal ranges. Blood pressure slightly elevated.</p>
                        </div>
                        <div class="border-start border-primary ps-3 mb-3">
                            <div class="d-flex justify-content-between">
                                <strong>Sarah Johnson - Vaccination</strong>
                                <span class="text-muted small">Yesterday, 2:15 PM</span>
                            </div>
                            <p class="mb-0 text-muted">Administered flu vaccine. No adverse reactions noted.</p>
                        </div>
                        <div class="border-start border-primary ps-3 mb-3">
                            <div class="d-flex justify-content-between">
                                <strong>Michael Chen - Injury Follow-up</strong>
                                <span class="text-muted small">Yesterday, 11:40 AM</span>
                            </div>
                            <p class="mb-0 text-muted">Sprained ankle healing well. Recommended light duty for 3 more days.</p>
                        </div>
                        <div class="border-start border-primary ps-3">
                            <div class="d-flex justify-content-between">
                                <strong>Lisa Rodriguez - Lab Results</strong>
                                <span class="text-muted small">Oct 12, 2023</span>
                            </div>
                            <p class="mb-0 text-muted">Blood test results show improved cholesterol levels.</p>
                        </div>
                    </div>
                </div>

                <!-- Medical Alerts -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Medical Alerts</h5>
                        <div class="alert alert-danger d-flex align-items-center">
                            <i class="bi bi-exclamation-triangle-fill me-3 fs-4"></i>
                            <div>
                                <h6 class="alert-heading mb-1">Allergy Alert - James Wilson</h6>
                                Severe allergy to penicillin. Confirm before prescribing any antibiotics.
                            </div>
                        </div>
                        <div class="alert alert-warning d-flex align-items-center">
                            <i class="bi bi-clock-fill me-3 fs-4"></i>
                            <div>
                                <h6 class="alert-heading mb-1">Medication Review Needed - Angela Martinez</h6>
                                Current prescription requires renewal in 5 days.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-4">
                <!-- Upcoming Appointments -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Upcoming Appointments</h5>
                        <div class="d-flex mb-3">
                            <div class="bg-light rounded text-center me-3" style="width: 60px;">
                                <div class="fw-bold fs-5">18</div>
                                <div class="text-uppercase small">OCT</div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <strong>Robert Brown</strong>
                                    <span class="badge bg-primary">10:00 AM</span>
                                </div>
                                <p class="mb-0 text-muted small">Annual physical examination</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="bg-light rounded text-center me-3" style="width: 60px;">
                                <div class="fw-bold fs-5">18</div>
                                <div class="text-uppercase small">OCT</div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <strong>Emily Taylor</strong>
                                    <span class="badge bg-primary">11:30 AM</span>
                                </div>
                                <p class="mb-0 text-muted small">Vaccination - HPV Dose 2</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="bg-light rounded text-center me-3" style="width: 60px;">
                                <div class="fw-bold fs-5">19</div>
                                <div class="text-uppercase small">OCT</div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <strong>David Kim</strong>
                                    <span class="badge bg-primary">9:15 AM</span>
                                </div>
                                <p class="mb-0 text-muted small">Follow-up on blood test results</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="bg-light rounded text-center me-3" style="width: 60px;">
                                <div class="fw-bold fs-5">19</div>
                                <div class="text-uppercase small">OCT</div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <strong>Maria Garcia</strong>
                                    <span class="badge bg-primary">2:00 PM</span>
                                </div>
                                <p class="mb-0 text-muted small">Work-related injury evaluation</p>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <a href="#" class="text-decoration-none">View all appointments</a>
                        </div>
                    </div>
                </div>

                <!-- Employee Health Status -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Employee Health Overview</h5>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Cleared for duty</span>
                                <span>92%</span>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 92%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Requires follow-up</span>
                                <span>5%</span>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 5%"></div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Medical leave</span>
                                <span>3%</span>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 3%"></div>
                            </div>
                        </div>
                        <h6>Top Health Concerns</h6>
                        <div class="d-flex flex-wrap gap-1">
                            <span class="badge bg-light text-dark">Hypertension</span>
                            <span class="badge bg-light text-dark">Back pain</span>
                            <span class="badge bg-light text-dark">Allergies</span>
                            <span class="badge bg-light text-dark">Stress</span>
                            <span class="badge bg-light text-dark">Respiratory</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
