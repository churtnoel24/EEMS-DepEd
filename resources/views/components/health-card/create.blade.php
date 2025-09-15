<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Health Card Form') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('health-card.store') }}" class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf

                {{-- Personal Information --}}
                <h3 class="font-semibold text-lg mb-2">Personal Information</h3>
                <x-input-label for="date" value="Date" />
                <x-text-input id="date" type="date" name="date" class="mb-2 w-full" required />
                <x-input-label for="name" value="Name" />
                <x-text-input id="name" type="text" name="name" class="mb-2 w-full" required maxlength="255" />
                <x-input-label for="date_of_birth" value="Date of Birth" />
                <x-text-input id="date_of_birth" type="date" name="date_of_birth" class="mb-2 w-full" required />
                <x-input-label for="age" value="Age" />
                <x-text-input id="age" type="number" name="age" class="mb-2 w-full" required min="1" />
                <x-input-label for="gender" value="Gender" />
                <select id="gender" name="gender" class="mb-2 w-full" required>
                    <option value="">-- Select --</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
                <x-input-label for="civil_status" value="Civil Status" />
                <select id="civil_status" name="civil_status" class="mb-2 w-full" required>
                    <option value="">-- Select --</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Separated">Separated</option>
                </select>

                {{-- Professional Information --}}
                <h3 class="font-semibold text-lg mt-4 mb-2">Professional Information</h3>
                <x-input-label for="school_district_division" value="School District/Division" />
                <x-text-input id="school_district_division" type="text" name="school_district_division" class="mb-2 w-full" required maxlength="255" />
                <x-input-label for="position_designation" value="Position/Designation" />
                <x-text-input id="position_designation" type="text" name="position_designation" class="mb-2 w-full" required maxlength="255" />
                <x-input-label for="first_year_in_service" value="First Year in Service" />
                <x-text-input id="first_year_in_service" type="number" name="first_year_in_service" class="mb-2 w-full" required min="0" />
                <x-input-label for="years_in_service" value="Years in Service" />
                <x-text-input id="years_in_service" type="number" name="years_in_service" class="mb-2 w-full" required min="0" />

                {{-- Family History --}}
                <h3 class="font-semibold text-lg mt-4 mb-2">Family History</h3>
                @foreach([
                    ['family_history_hypertension', 'Hypertension'],
                    ['family_history_cardiovascular_disease', 'Cardiovascular Disease'],
                    ['family_history_diabetes_mellitus', 'Diabetes Mellitus'],
                    ['family_history_kidney_disease', 'Kidney Disease'],
                    ['family_history_cancer', 'Cancer'],
                    ['family_history_asthma', 'Asthma'],
                    ['family_history_allergy', 'Allergy'],
                ] as [$field, $label])
                    <x-input-label for="{{ $field }}" value="{{ $label }}" />
                    <select id="{{ $field }}" name="{{ $field }}" class="mb-2 w-full">
                        <option value="">-- Select --</option>
                        <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select>
                    <x-input-label for="{{ $field }}_relationship" value="{{ $label }} Relationship (if Yes)" />
                    <x-text-input id="{{ $field }}_relationship" type="text" name="{{ $field }}_relationship" class="mb-2 w-full" maxlength="255" />
                @endforeach

                <x-input-label for="other_remarks" value="Other Remarks" />
                <x-text-input id="other_remarks" type="text" name="other_remarks" class="mb-2 w-full" maxlength="1000" />

                {{-- Past Medical History --}}
                <h3 class="font-semibold text-lg mt-4 mb-2">Past Medical History</h3>
                @foreach([
                    ['past_medical_history_hypertension', 'Hypertension'],
                    ['past_medical_history_asthma', 'Asthma'],
                    ['past_medical_history_diabetes_mellitus', 'Diabetes Mellitus'],
                    ['past_medical_history_cardiovascular_disease', 'Cardiovascular Disease'],
                    ['past_medical_history_tuberculosis', 'Tuberculosis'],
                    ['yellowish_discoloration_of_skin_selera', 'Yellowish Discoloration of Skin/Sclera'],
                ] as [$field, $label])
                    <x-input-label for="{{ $field }}" value="{{ $label }}" />
                    <select id="{{ $field }}" name="{{ $field }}" class="mb-2 w-full">
                        <option value="">-- Select --</option>
                        <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select>
                @endforeach

                <x-input-label for="has_allergy" value="Has Allergy?" />
                <select id="has_allergy" name="has_allergy" class="mb-2 w-full" required>
                    <option value="">-- Select --</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                <x-input-label for="past_medical_history_allergy" value="Allergy Details (if Yes)" />
                <x-text-input id="past_medical_history_allergy" type="text" name="past_medical_history_allergy" class="mb-2 w-full" maxlength="500" />

                <x-input-label for="had_surgery" value="Had Surgery?" />
                <select id="had_surgery" name="had_surgery" class="mb-2 w-full" required>
                    <option value="">-- Select --</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                <x-input-label for="past_medical_history_surgery" value="Surgery Details (if Yes)" />
                <x-text-input id="past_medical_history_surgery" type="text" name="past_medical_history_surgery" class="mb-2 w-full" maxlength="500" />

                <x-input-label for="had_been_hospitalized" value="Had Been Hospitalized?" />
                <select id="had_been_hospitalized" name="had_been_hospitalized" class="mb-2 w-full" required>
                    <option value="">-- Select --</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                <x-input-label for="past_medical_history_hospitalization" value="Hospitalization Details (if Yes)" />
                <x-text-input id="past_medical_history_hospitalization" type="text" name="past_medical_history_hospitalization" class="mb-2 w-full" maxlength="500" />

                <x-input-label for="past_medical_history_others" value="Other Past Medical History" />
                <x-text-input id="past_medical_history_others" type="text" name="past_medical_history_others" class="mb-2 w-full" maxlength="500" />

                {{-- Last Taken --}}
                <h3 class="font-semibold text-lg mt-4 mb-2">Last Taken</h3>
                @foreach([
                    ['last_taken_cxr_sputum', 'CXR/Sputum'],
                    ['last_taken_ecg', 'ECG'],
                    ['last_taken_urinalysis', 'Urinalysis'],
                    ['last_taken_drug_test', 'Drug Test'],
                    ['last_taken_neuro_exam', 'Neuro Exam'],
                    ['last_taken_bloodtyping', 'Blood Typing'],
                ] as [$prefix, $label])
                    <x-input-label for="{{ $prefix }}_date" value="{{ $label }} Date" />
                    <x-text-input id="{{ $prefix }}_date" type="date" name="{{ $prefix }}_date" class="mb-2 w-full" />
                    <x-input-label for="{{ $prefix }}_result" value="{{ $label }} Result" />
                    <x-text-input id="{{ $prefix }}_result" type="text" name="{{ $prefix }}_result" class="mb-2 w-full" maxlength="500" />
                @endforeach
                <x-input-label for="last_taken_others" value="Other Last Taken" />
                <x-text-input id="last_taken_others" type="text" name="last_taken_others" class="mb-2 w-full" maxlength="500" />

                {{-- Social History --}}
                <h3 class="font-semibold text-lg mt-4 mb-2">Social History</h3>
                <x-input-label for="smoking" value="Smoking?" />
                <select id="smoking" name="smoking" class="mb-2 w-full">
                    <option value="">-- Select --</option>
                    <option value="Y">Yes</option>
                    <option value="N">No</option>
                </select>
                <x-input-label for="smoking_age_started" value="Age Started Smoking (if Yes)" />
                <x-text-input id="smoking_age_started" type="number" name="smoking_age_started" class="mb-2 w-full" min="0" />
                <x-input-label for="smoking_sticks_pack_per_day" value="Sticks/Pack per Day (if Yes)" />
                <x-text-input id="smoking_sticks_pack_per_day" type="number" name="smoking_sticks_pack_per_day" class="mb-2 w-full" min="0" />
                <x-input-label for="smoking_pack_per_year" value="Pack per Year (if Yes)" />
                <x-text-input id="smoking_pack_per_year" type="number" name="smoking_pack_per_year" class="mb-2 w-full" min="0" />

                <x-input-label for="alcohol" value="Alcohol?" />
                <select id="alcohol" name="alcohol" class="mb-2 w-full">
                    <option value="">-- Select --</option>
                    <option value="Y">Yes</option>
                    <option value="N">No</option>
                </select>
                <x-input-label for="alcohol_how_often" value="How Often (if Yes)" />
                <x-text-input id="alcohol_how_often" type="text" name="alcohol_how_often" class="mb-2 w-full" maxlength="255" />
                <x-input-label for="food_preference" value="Food Preference" />
                <x-text-input id="food_preference" type="text" name="food_preference" class="mb-2 w-full" maxlength="255" />

                {{-- OB-GYN History --}}
                <h3 class="font-semibold text-lg mt-4 mb-2">OB-GYN History (for female teachers)</h3>
                <x-input-label for="menarche" value="Menarche" />
                <x-text-input id="menarche" type="number" name="menarche" class="mb-2 w-full" min="0" />
                <x-input-label for="cycle" value="Cycle" />
                <select id="cycle" name="cycle" class="mb-2 w-full">
                    <option value="">-- Select --</option>
                    <option value="Regular">Regular</option>
                    <option value="Irregular">Irregular</option>
                </select>
                <x-input-label for="duration" value="Duration" />
                <x-text-input id="duration" type="number" name="duration" class="mb-2 w-full" min="0" />
                <x-input-label for="ob_gyn_parity" value="Parity" />
                <select id="ob_gyn_parity" name="ob_gyn_parity" class="mb-2 w-full">
                    <option value="">-- Select --</option>
                    <option value="F">F</option>
                    <option value="P">P</option>
                    <option value="A">A</option>
                    <option value="L">L</option>
                </select>
                <x-input-label for="papsmear_done" value="Papsmear Done?" />
                <select id="papsmear_done" name="papsmear_done" class="mb-2 w-full">
                    <option value="">-- Select --</option>
                    <option value="Y">Yes</option>
                    <option value="N">No</option>
                </select>
                <x-input-label for="papsmear_date" value="Papsmear Date (if Yes)" />
                <x-text-input id="papsmear_date" type="date" name="papsmear_date" class="mb-2 w-full" />
                <x-input-label for="self_breast_exam_done" value="Self Breast Exam Done?" />
                <select id="self_breast_exam_done" name="self_breast_exam_done" class="mb-2 w-full">
                    <option value="">-- Select --</option>
                    <option value="Y">Yes</option>
                    <option value="N">No</option>
                </select>
                <x-input-label for="mass_noted" value="Mass Noted?" />
                <select id="mass_noted" name="mass_noted" class="mb-2 w-full">
                    <option value="">-- Select --</option>
                    <option value="Y">Yes</option>
                    <option value="N">No</option>
                </select>
                <x-input-label for="mass_location" value="Mass Location (if Yes)" />
                <x-text-input id="mass_location" type="text" name="mass_location" class="mb-2 w-full" maxlength="255" />

                {{-- For Male Personnel --}}
                <h3 class="font-semibold text-lg mt-4 mb-2">For Male Personnel</h3>
                <x-input-label for="digital_rectal_exam_done" value="Digital Rectal Exam Done?" />
                <select id="digital_rectal_exam_done" name="digital_rectal_exam_done" class="mb-2 w-full">
                    <option value="">-- Select --</option>
                    <option value="Y">Yes</option>
                    <option value="N">No</option>
                </select>
                <x-input-label for="digital_rectal_exam_date" value="Digital Rectal Exam Date (if Yes)" />
                <x-text-input id="digital_rectal_exam_date" type="date" name="digital_rectal_exam_date" class="mb-2 w-full" />
                <x-input-label for="digital_rectal_exam_result" value="Digital Rectal Exam Result" />
                <x-text-input id="digital_rectal_exam_result" type="text" name="digital_rectal_exam_result" class="mb-2 w-full" maxlength="500" />

                {{-- Present Health Status --}}
                <h3 class="font-semibold text-lg mt-4 mb-2">Present Health Status</h3>
                <x-input-label for="present_health_status_cough" value="Cough" />
                <select id="present_health_status_cough" name="present_health_status_cough" class="mb-2 w-full">
                    <option value="">-- Select --</option>
                    <option value="2wks">2 weeks</option>
                    <option value="1_month">1 month</option>
                    <option value="longer">Longer</option>
                </select>
                @foreach([
                    ['present_health_status_dizziness', 'Dizziness'],
                    ['present_health_status_dyspnea', 'Dyspnea'],
                    ['present_health_status_chest_back_pain', 'Chest/Back Pain'],
                    ['present_health_status_easy_fatigability', 'Easy Fatigability'],
                    ['present_health_status_joint_extremity_pains', 'Joint/Extremity Pains'],
                    ['present_health_status_blurring_of_vision', 'Blurring of Vision'],
                    ['present_health_status_wearing_eyeglasses', 'Wearing Eyeglasses'],
                    ['present_health_status_vaginal_discharge_bleeding', 'Vaginal Discharge/Bleeding'],
                    ['present_health_status_lumps', 'Lumps'],
                    ['present_health_status_painful_urination', 'Painful Urination'],
                    ['present_health_status_poor_loss_of_hearing', 'Poor/Loss of Hearing'],
                    ['present_health_status_syncope_fainting', 'Syncope/Fainting'],
                    ['present_health_status_convulsions', 'Convulsions'],
                    ['present_health_status_malaria', 'Malaria'],
                    ['present_health_status_goiter', 'Goiter'],
                    ['present_health_status_anemia', 'Anemia'],
                ] as [$field, $label])
                    <x-input-label for="{{ $field }}" value="{{ $label }}" />
                    <select id="{{ $field }}" name="{{ $field }}" class="mb-2 w-full">
                        <option value="">-- Select --</option>
                        <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select>
                @endforeach
                <x-input-label for="present_health_status_dental_status" value="Dental Status" />
                <x-text-input id="present_health_status_dental_status" type="text" name="present_health_status_dental_status" class="mb-2 w-full" maxlength="500" />
                <x-input-label for="present_health_status_present_medications_taken" value="Present Medications Taken" />
                <x-text-input id="present_health_status_present_medications_taken" type="text" name="present_health_status_present_medications_taken" class="mb-2 w-full" maxlength="500" />
                <x-input-label for="present_health_status_others" value="Others" />
                <x-text-input id="present_health_status_others" type="text" name="present_health_status_others" class="mb-2 w-full" maxlength="500" />

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
