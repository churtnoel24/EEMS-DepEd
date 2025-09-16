@extends('layouts.app')

@section('header')
    <h2 class="fw-semibold fs-4 text-dark mb-0">
        {{ __('Health Card Form') }}
    </h2>
@endsection

@section('content')
<div class="container my-4">
    <form method="POST" action="{{ route('health-card.store') }}" class="needs-validation" novalidate>
        @csrf

        {{-- Personal Information --}}
        <div class="card mb-4">
            <div class="card-header fw-bold">
                <a class="d-flex justify-content-between align-items-center text-decoration-none text-dark"
                   data-bs-toggle="collapse" href="#personalInfo" aria-expanded="true" aria-controls="personalInfo">
                    <span>Personal Information</span>
                    <i class="bi bi-chevron-down"></i>
                </a>
            </div>
            <div id="personalInfo" class="collapse show">
                <div class="card-body row g-3">
                    <!-- ...personal info fields... -->
                    <div class="col-md-4">
                        <label class="form-label">Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" required maxlength="255">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Age</label>
                        <input type="number" name="age" class="form-control" min="1" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="form-select" required>
                            <option value="">-- Select --</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Civil Status</label>
                        <select name="civil_status" class="form-select" required>
                            <option value="">-- Select --</option>
                            <option>Single</option>
                            <option>Married</option>
                            <option>Widowed</option>
                            <option>Separated</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        {{-- Professional Information --}}
        <div class="card mb-4">
            <div class="card-header fw-bold">
                <a class="d-flex justify-content-between text-decoration-none text-dark"
                   data-bs-toggle="collapse" href="#professionalInfo" aria-expanded="false" aria-controls="professionalInfo">
                    <span>Professional Information</span>
                    <i class="bi bi-chevron-down"></i>
                </a>
            </div>
            <div id="professionalInfo" class="collapse">
                <div class="card-body row g-3">
                    <!-- ...professional info fields... -->
                    <div class="col-md-6">
                        <label class="form-label">School District/Division</label>
                        <input type="text" name="school_district_division" class="form-control" required maxlength="255">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Position/Designation</label>
                        <input type="text" name="position_designation" class="form-control" required maxlength="255">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">First Year in Service</label>
                        <input type="number" name="first_year_in_service" class="form-control" min="0" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Years in Service</label>
                        <input type="number" name="years_in_service" class="form-control" min="0" required>
                    </div>
                </div>
            </div>
        </div>

        {{-- Family History --}}
        <div class="card mb-4">
            <div class="card-header fw-bold">
                <a class="d-flex justify-content-between text-decoration-none text-dark"
                   data-bs-toggle="collapse" href="#familyHistory" aria-expanded="false" aria-controls="familyHistory">
                    <span>Family History</span>
                    <i class="bi bi-chevron-down"></i>
                </a>
            </div>
            <div id="familyHistory" class="collapse">
                <div class="card-body">
                    @foreach ([['family_history_hypertension','Hypertension'],['family_history_cardiovascular_disease','Cardiovascular Disease'],['family_history_diabetes_mellitus','Diabetes Mellitus'],['family_history_kidney_disease','Kidney Disease'],['family_history_cancer','Cancer'],['family_history_asthma','Asthma'],['family_history_allergy','Allergy']] as [$field,$label])
                        <div class="row g-3 mb-2">
                            <div class="col-md-3">
                                <label class="form-label mb-0">{{ $label }}</label>
                                <select name="{{ $field }}" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                                </select>
                            </div>
                            <div class="col-md-9">
                                <label class="form-label mb-0 small">Relationship (if Yes)</label>
                                <input type="text" name="{{ $field }}_relationship" class="form-control" maxlength="255">
                            </div>
                        </div>
                    @endforeach
                    <label class="form-label">Other Remarks</label>
                    <input type="text" name="other_remarks" class="form-control" maxlength="500">
                </div>
            </div>
        </div>

        {{-- Past Medical History --}}
        <div class="card mb-4">
            <div class="card-header fw-bold">
                <a class="d-flex justify-content-between text-decoration-none text-dark"
                   data-bs-toggle="collapse" href="#pastMedical" aria-expanded="false" aria-controls="pastMedical">
                    <span>Past Medical History</span>
                    <i class="bi bi-chevron-down"></i>
                </a>
            </div>
            <div id="pastMedical" class="collapse">
                <div class="card-body">
                    @foreach ([['past_medical_history_hypertension','Hypertension'],['past_medical_history_asthma','Asthma'],['past_medical_history_diabetes_mellitus','Diabetes Mellitus'],['past_medical_history_cardiovascular_disease','Cardiovascular Disease'],['past_medical_history_tuberculosis','Tuberculosis'],['yellowish_discoloration_of_skin_selera','Yellowish Discoloration of Skin/Sclera']] as [$field,$label])
                        <div class="mb-2">
                            <label class="form-label">{{ $label }}</label>
                            <select name="{{ $field }}" class="form-select">
                                <option value="">-- Select --</option>
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                            </select>
                        </div>
                    @endforeach

                    <div class="row g-3 mb-2">
                        <div class="col-md-3">
                            <label class="form-label">Has Allergy?</label>
                            <select name="has_allergy" class="form-select">
                                <option value="">-- Select --</option>
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">If Yes, specify</label>
                            <input type="text" name="past_medical_history_allergy" class="form-control" maxlength="255">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Last Taken --}}
        <div class="card mb-4">
            <div class="card-header fw-bold">
                <a class="d-flex justify-content-between text-decoration-none text-dark"
                   data-bs-toggle="collapse" href="#lastTaken" aria-expanded="false" aria-controls="lastTaken">
                    <span>Last Taken</span>
                    <i class="bi bi-chevron-down"></i>
                </a>
            </div>
            <div id="lastTaken" class="collapse">
                <div class="card-body">
                    @foreach ([['last_taken_cxr_sputum','CXR/Sputum'],['last_taken_ecg','ECG'],['last_taken_urinalysis','Urinalysis'],['last_taken_drug_test','Drug Test'],['last_taken_neuro_exam','Neuro Exam'],['last_taken_bloodtyping','Blood Typing']] as [$prefix,$label])
                        <div class="row g-3 mb-3">
                            <div class="col-md-3">
                                <label class="form-label">{{ $label }} Date</label>
                                <input type="date" name="{{ $prefix }}_date" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ $label }} Result</label>
                                <input type="text" name="{{ $prefix }}_result" class="form-control" maxlength="500">
                            </div>
                        </div>
                    @endforeach
                    <div class="mb-3">
                        <label class="form-label">Other Last Taken</label>
                        <input type="text" name="last_taken_others" class="form-control" maxlength="500">
                    </div>
                </div>
            </div>
        </div>

        {{-- Social History --}}
        <div class="card mb-4">
            <div class="card-header fw-bold">
                <a class="d-flex justify-content-between text-decoration-none text-dark"
                   data-bs-toggle="collapse" href="#socialHistory" aria-expanded="false" aria-controls="socialHistory">
                    <span>Social History</span>
                    <i class="bi bi-chevron-down"></i>
                </a>
            </div>
            <div id="socialHistory" class="collapse">
                <div class="card-body">
                    <!-- ...social history fields... -->
                    <div class="mb-3">
                        <label for="smoking" class="form-label">Smoking?</label>
                        <select id="smoking" name="smoking" class="form-select">
                            <option value="">-- Select --</option>
                            <option value="Y">Yes</option>
                            <option value="N">No</option>
                        </select>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label for="smoking_age_started" class="form-label">Age Started Smoking (if Yes)</label>
                            <input type="number" name="smoking_age_started" id="smoking_age_started" class="form-control" min="0">
                        </div>
                        <div class="col-md-4">
                            <label for="smoking_sticks_pack_per_day" class="form-label">Sticks/Pack per Day (if Yes)</label>
                            <input type="number" name="smoking_sticks_pack_per_day" id="smoking_sticks_pack_per_day" class="form-control" min="0">
                        </div>
                        <div class="col-md-4">
                            <label for="smoking_pack_per_year" class="form-label">Pack per Year (if Yes)</label>
                            <input type="number" name="smoking_pack_per_year" id="smoking_pack_per_year" class="form-control" min="0">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alcohol" class="form-label">Alcohol?</label>
                        <select id="alcohol" name="alcohol" class="form-select">
                            <option value="">-- Select --</option>
                            <option value="Y">Yes</option>
                            <option value="N">No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alcohol_how_often" class="form-label">How Often (if Yes)</label>
                        <input type="text" name="alcohol_how_often" id="alcohol_how_often" class="form-control" maxlength="255">
                    </div>
                    <div class="mb-3">
                        <label for="food_preference" class="form-label">Food Preference</label>
                        <input type="text" name="food_preference" id="food_preference" class="form-control" maxlength="255">
                    </div>
                </div>
            </div>
        </div>

        {{-- OB-GYN History --}}
        <div class="card mb-4">
            <div class="card-header fw-bold">
                <a class="d-flex justify-content-between text-decoration-none text-dark"
                   data-bs-toggle="collapse" href="#obgyn" aria-expanded="false" aria-controls="obgyn">
                    <span>OB-GYN History (for female teachers)</span>
                    <i class="bi bi-chevron-down"></i>
                </a>
            </div>
            <div id="obgyn" class="collapse">
                <div class="card-body">
                    <!-- ...OB-GYN fields... -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label for="menarche" class="form-label">Menarche</label>
                            <input type="number" name="menarche" id="menarche" class="form-control" min="0">
                        </div>
                        <div class="col-md-4">
                            <label for="cycle" class="form-label">Cycle</label>
                            <select id="cycle" name="cycle" class="form-select">
                                <option value="">-- Select --</option>
                                <option value="Regular">Regular</option>
                                <option value="Irregular">Irregular</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="number" name="duration" id="duration" class="form-control" min="0">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="ob_gyn_parity" class="form-label">Parity</label>
                        <select id="ob_gyn_parity" name="ob_gyn_parity" class="form-select">
                            <option value="">-- Select --</option>
                            <option value="F">F</option>
                            <option value="P">P</option>
                            <option value="A">A</option>
                            <option value="L">L</option>
                        </select>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="papsmear_done" class="form-label">Papsmear Done?</label>
                            <select id="papsmear_done" name="papsmear_done" class="form-select">
                                <option value="">-- Select --</option>
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="papsmear_date" class="form-label">Papsmear Date (if Yes)</label>
                            <input type="date" name="papsmear_date" id="papsmear_date" class="form-control">
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="self_breast_exam_done" class="form-label">Self Breast Exam Done?</label>
                            <select id="self_breast_exam_done" name="self_breast_exam_done" class="form-select">
                                <option value="">-- Select --</option>
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="mass_noted" class="form-label">Mass Noted?</label>
                            <select id="mass_noted" name="mass_noted" class="form-select">
                                <option value="">-- Select --</option>
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="mass_location" class="form-label">Mass Location (if Yes)</label>
                        <input type="text" name="mass_location" id="mass_location" class="form-control" maxlength="255">
                    </div>
                </div>
            </div>
        </div>

        {{-- For Male Personnel --}}
        <div class="card mb-4">
            <div class="card-header fw-bold">
                <a class="d-flex justify-content-between text-decoration-none text-dark"
                   data-bs-toggle="collapse" href="#malePersonnel" aria-expanded="false" aria-controls="malePersonnel">
                    <span>For Male Personnel</span>
                    <i class="bi bi-chevron-down"></i>
                </a>
            </div>
            <div id="malePersonnel" class="collapse">
                <div class="card-body row g-3">
                    <div class="col-md-4">
                        <label for="digital_rectal_exam_done" class="form-label">Digital Rectal Exam Done?</label>
                        <select id="digital_rectal_exam_done" name="digital_rectal_exam_done" class="form-select">
                            <option value="">-- Select --</option>
                            <option value="Y">Yes</option>
                            <option value="N">No</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="digital_rectal_exam_date" class="form-label">Date (if Yes)</label>
                        <input type="date" name="digital_rectal_exam_date" id="digital_rectal_exam_date" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="digital_rectal_exam_result" class="form-label">Result</label>
                        <input type="text" name="digital_rectal_exam_result" id="digital_rectal_exam_result" class="form-control" maxlength="500">
                    </div>
                </div>
            </div>
        </div>

        {{-- Present Health Status --}}
        <div class="card mb-4">
            <div class="card-header fw-bold">
                <a class="d-flex justify-content-between text-decoration-none text-dark"
                   data-bs-toggle="collapse" href="#presentHealth" aria-expanded="false" aria-controls="presentHealth">
                    <span>Present Health Status</span>
                    <i class="bi bi-chevron-down"></i>
                </a>
            </div>
            <div id="presentHealth" class="collapse">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="present_health_status_cough" class="form-label">Cough</label>
                        <select id="present_health_status_cough" name="present_health_status_cough" class="form-select">
                            <option value="">-- Select --</option>
                            <option value="2wks">2 weeks</option>
                            <option value="1_month">1 month</option>
                            <option value="longer">Longer</option>
                        </select>
                    </div>
                    @foreach ([['present_health_status_dizziness', 'Dizziness'], ['present_health_status_dyspnea', 'Dyspnea'], ['present_health_status_chest_back_pain', 'Chest/Back Pain'], ['present_health_status_easy_fatigability', 'Easy Fatigability'], ['present_health_status_joint_extremity_pains', 'Joint/Extremity Pains'], ['present_health_status_blurring_of_vision', 'Blurring of Vision'], ['present_health_status_wearing_eyeglasses', 'Wearing Eyeglasses'], ['present_health_status_vaginal_discharge_bleeding', 'Vaginal Discharge/Bleeding'], ['present_health_status_lumps', 'Lumps'], ['present_health_status_painful_urination', 'Painful Urination'], ['present_health_status_poor_loss_of_hearing', 'Poor/Loss of Hearing'], ['present_health_status_syncope_fainting', 'Syncope/Fainting'], ['present_health_status_convulsions', 'Convulsions'], ['present_health_status_malaria', 'Malaria'], ['present_health_status_goiter', 'Goiter'], ['present_health_status_anemia', 'Anemia']] as [$field, $label])
                        <div class="mb-3">
                            <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                            <select id="{{ $field }}" name="{{ $field }}" class="form-select">
                                <option value="">-- Select --</option>
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                            </select>
                        </div>
                    @endforeach
                    <div class="mb-3">
                        <label for="present_health_status_dental_status" class="form-label">Dental Status</label>
                        <input type="text" name="present_health_status_dental_status" id="present_health_status_dental_status" class="form-control" maxlength="500">
                    </div>
                    <div class="mb-3">
                        <label for="present_health_status_present_medications_taken" class="form-label">Present Medications Taken</label>
                        <input type="text" name="present_health_status_present_medications_taken" id="present_health_status_present_medications_taken" class="form-control" maxlength="500">
                    </div>
                    <div class="mb-3">
                        <label for="present_health_status_others" class="form-label">Others</label>
                        <input type="text" name="present_health_status_others" id="present_health_status_others" class="form-control" maxlength="500">
                    </div>
                </div>
            </div>
        </div>

        <div class="text-end mt-4">
            <button class="btn btn-primary px-4">Submit</button>
        </div>
    </form>
</div>
@endsection
