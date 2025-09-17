@extends('layouts.app')

@section('header')
    <h2 class="fw-semibold fs-4 text-dark mb-0">
        {{ __('Health Card Details') }}
    </h2>
@endsection

@section('content')
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col">
                <h2 class="fw-semibold fs-4 text-dark mb-0">Health Card Details</h2>
            </div>
        </div>

        <!-- Search Box -->
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('health-cards.cards') }}" class="row g-3 align-items-center">
                    <div class="col-md-10">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" name="q" class="form-control" placeholder="Search by patient name"
                                value="{{ request('q') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary w-100" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>

        @forelse($healthCards as $card)
            <!-- Health Card -->
            <div class="card health-card shadow-sm mb-4">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0 text-primary">
                        <i class="bi bi-person-circle me-2"></i>{{ $card->name }}
                    </h5>
                    <span class="badge bg-light text-dark">
                        <i class="bi bi-calendar me-1"></i>
                        {{ \Carbon\Carbon::parse($card->date)->format('M d, Y') }}
                    </span>
                </div>

                <div class="card-body">
                    <!-- Navigation Tabs -->
                    <ul class="nav nav-tabs mb-4" id="healthCardTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="personal-tab" data-bs-toggle="tab"
                                data-bs-target="#personal-{{ $card->id }}" type="button" role="tab">
                                Personal
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="medical-tab" data-bs-toggle="tab"
                                data-bs-target="#medical-{{ $card->id }}" type="button" role="tab">
                                Medical History
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tests-tab" data-bs-toggle="tab"
                                data-bs-target="#tests-{{ $card->id }}" type="button" role="tab">
                                Tests & Results
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="social-tab" data-bs-toggle="tab"
                                data-bs-target="#social-{{ $card->id }}" type="button" role="tab">
                                Lifestyle
                            </button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="healthCardContent">
                        <!-- Personal Information Tab -->
                        <div class="tab-pane fade show active" id="personal-{{ $card->id }}" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <span class="info-label">Date of Birth:</span>
                                        <span
                                            class="d-block">{{ \Carbon\Carbon::parse($card->date_of_birth)->format('F d, Y') }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <span class="info-label">Age:</span>
                                        <span class="d-block">{{ $card->age }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <span class="info-label">Gender:</span>
                                        <span class="d-block">{{ $card->gender }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <span class="info-label">Civil Status:</span>
                                        <span class="d-block">{{ $card->civil_status }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <span class="info-label">Position:</span>
                                        <span class="d-block">{{ $card->position_designation }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <span class="info-label">Years in Service:</span>
                                        <span class="d-block">{{ $card->years_in_service }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Medical History Tab -->
                        <div class="tab-pane fade" id="medical-{{ $card->id }}" role="tabpanel">
                            <h6 class="section-title">Family History</h6>
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                @foreach ([
            'hypertension' => 'Hypertension',
            'cardiovascular_disease' => 'Cardiovascular',
            'diabetes_mellitus' => 'Diabetes',
            'kidney_disease' => 'Kidney Disease',
            'cancer' => 'Cancer',
            'asthma' => 'Asthma',
            'allergy' => 'Allergy',
        ] as $key => $label)
                                    @php
                                        $flag = "family_history_{$key}";
                                        $rel = "family_history_{$key}_relationship";
                                    @endphp
                                    @if ($card->$flag === 'Y')
                                        <span class="badge bg-info text-dark medical-badge">
                                            {{ $label }} ({{ $card->$rel }})
                                        </span>
                                    @endif
                                @endforeach
                            </div>

                            <h6 class="section-title">Past Medical History</h6>
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                @foreach ([
            'hypertension' => 'Hypertension',
            'asthma' => 'Asthma',
            'diabetes_mellitus' => 'Diabetes',
            'cardiovascular_disease' => 'Cardiovascular',
            'tuberculosis' => 'Tuberculosis',
        ] as $key => $label)
                                    @php $field = "past_medical_history_{$key}"; @endphp
                                    @if ($card->$field === 'Y')
                                        <span class="badge bg-warning text-dark medical-badge">{{ $label }}</span>
                                    @endif
                                @endforeach

                                @if ($card->has_allergy === 'Y')
                                    <span class="badge bg-warning text-dark medical-badge">
                                        Allergy: {{ $card->past_medical_history_allergy }}
                                    </span>
                                @endif

                                @if ($card->had_surgery === 'Y')
                                    <span class="badge bg-warning text-dark medical-badge">
                                        Surgery: {{ $card->past_medical_history_surgery }}
                                    </span>
                                @endif

                                @if ($card->had_been_hospitalized === 'Y')
                                    <span class="badge bg-warning text-dark medical-badge">
                                        Hospitalization: {{ $card->past_medical_history_hospitalization }}
                                    </span>
                                @endif
                            </div>

                            <h6 class="section-title">Present Health Status</h6>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ([
            'dizziness' => 'Dizziness',
            'dyspnea' => 'Dyspnea',
            'chest_back_pain' => 'Chest Pain',
            'easy_fatigability' => 'Fatigue',
            'joint_extremity_pains' => 'Joint Pain',
            'blurring_of_vision' => 'Vision Issues',
            'vaginal_discharge_bleeding' => 'Vaginal Issues',
            'lumps' => 'Lumps',
            'painful_urination' => 'Painful Urination',
            'syncope_fainting' => 'Fainting',
        ] as $key => $label)
                                    @php $field = "present_health_status_{$key}"; @endphp
                                    @if ($card->$field === 'Y')
                                        <span class="badge bg-light text-dark medical-badge">{{ $label }}</span>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <!-- Tests & Results Tab -->
                        <div class="tab-pane fade" id="tests-{{ $card->id }}" role="tabpanel">
                            <div class="row">
                                @foreach ([
            'cxr_sputum' => 'CXR/Sputum',
            'ecg' => 'ECG',
            'urinalysis' => 'Urinalysis',
            'drug_test' => 'Drug Test',
            'neuro_exam' => 'Neuro Exam',
            'bloodtyping' => 'Blood Typing',
        ] as $key => $label)
                                    @php
                                        $dateField = "last_taken_{$key}_date";
                                        $resField = "last_taken_{$key}_result";
                                    @endphp
                                    @if ($card->$dateField || $card->$resField)
                                        <div class="col-md-6 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <h6 class="card-title">{{ $label }}</h6>
                                                    @if ($card->$dateField)
                                                        <div class="mb-1">
                                                            <span class="info-label">Date:</span>
                                                            <span>{{ \Carbon\Carbon::parse($card->$dateField)->format('M d, Y') }}</span>
                                                        </div>
                                                    @endif
                                                    @if ($card->$resField)
                                                        <div>
                                                            <span class="info-label">Result:</span>
                                                            <span class="badge bg-success">{{ $card->$resField }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <!-- Lifestyle Tab -->
                        <div class="tab-pane fade" id="social-{{ $card->id }}" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    @if ($card->smoking === 'Y')
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h6 class="card-title">Smoking</h6>
                                                <div class="mb-1">
                                                    <span class="info-label">Started at age:</span>
                                                    <span>{{ $card->smoking_age_started }}</span>
                                                </div>
                                                <div class="mb-1">
                                                    <span class="info-label">Amount:</span>
                                                    <span>{{ $card->smoking_sticks_pack_per_day }} sticks/day</span>
                                                </div>
                                                <div>
                                                    <span class="info-label">Pack-years:</span>
                                                    <span>{{ $card->smoking_pack_per_year }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    @if ($card->alcohol === 'Y')
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h6 class="card-title">Alcohol Consumption</h6>
                                                <div>
                                                    <span class="info-label">Frequency:</span>
                                                    <span>{{ $card->alcohol_how_often }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @if ($card->food_preference)
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Food Preference</h6>
                                        <p class="mb-0">{{ $card->food_preference }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">Employee ID: {{ $card->id }}</small>
                        <div>
                            <button class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-printer me-1"></i>Print
                            </button>
                            <a href="{{ route('health-cards.edit', $card->id) }}"
                                class="btn btn-sm btn-outline-secondary ms-2">
                                <i class="bi bi-pencil me-1"></i>Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="card">
                <div class="card-body text-center py-5">
                    <i class="bi bi-search display-4 text-muted"></i>
                    <h5 class="mt-3 text-muted">No matching records found</h5>
                    <p class="text-muted">Try a different search term or create a new health card</p>
                    <a href="{{ route('health-card.create') }}" class="btn btn-primary mt-2">
                        <i class="bi bi-plus-circle me-1"></i>Create New Health Card
                    </a>
                </div>
            </div>
        @endforelse

        <!-- Pagination -->
        @if ($healthCards->count() > 0)
            <div class="d-flex justify-content-center mt-4">
                {{ $healthCards->withQueryString()->links() }}
            </div>
        @endif
    </div>
@endsection
