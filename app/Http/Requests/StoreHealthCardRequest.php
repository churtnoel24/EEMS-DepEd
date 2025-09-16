<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHealthCardRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // change later that only nurses and doctors can access this
    }

    public function rules(): array
    {
        return [
            // --- Personal Information ---
            'date' => 'required|date',
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'age' => 'required|integer|min:1',
            'gender' => 'required|string|in:Male,Female,Other',
            'civil_status' => 'required|string|in:Single,Married,Widowed,Separated',

            // --- Professional Information ---
            'school_district_division' => 'required|string|max:255',
            'position_designation'     => 'required|string|max:255',
            'first_year_in_service'    => 'required|integer|min:0',
            'years_in_service'         => 'required|integer|min:0',

            // --- Family History ---
            'family_history_hypertension' => 'nullable|string|in:Y,N',
            'family_history_hypertension_relationship' =>
                'nullable|string|max:255|required_if:family_history_hypertension,Y',

            'family_history_cardiovascular_disease' => 'nullable|string|in:Y,N',
            'family_history_cardiovascular_disease_relationship' =>
                'nullable|string|max:255|required_if:family_history_cardiovascular_disease,Y',

            'family_history_diabetes_mellitus' => 'nullable|string|in:Y,N',
            'family_history_diabetes_mellitus_relationship' =>
                'nullable|string|max:255|required_if:family_history_diabetes_mellitus,Y',

            'family_history_kidney_disease' => 'nullable|string|in:Y,N',
            'family_history_kidney_disease_relationship' =>
                'nullable|string|max:255|required_if:family_history_kidney_disease,Y',

            'family_history_cancer' => 'nullable|string|in:Y,N',
            'family_history_cancer_relationship' =>
                'nullable|string|max:255|required_if:family_history_cancer,Y',

            'family_history_asthma' => 'nullable|string|in:Y,N',
            'family_history_asthma_relationship' =>
                'nullable|string|max:255|required_if:family_history_asthma,Y',

            'family_history_allergy' => 'nullable|string|in:Y,N',
            'family_history_allergy_relationship' =>
                'nullable|string|max:255|required_if:family_history_allergy,Y',

            // --- Other Remarks ---
            'other_remarks' => 'nullable|string|max:1000',

            // --- Past Medical History ---
            'past_medical_history_hypertension'        => 'nullable|string|in:Y,N',
            'past_medical_history_asthma'             => 'nullable|string|in:Y,N',
            'past_medical_history_diabetes_mellitus'  => 'nullable|string|in:Y,N',
            'past_medical_history_cardiovascular_disease' => 'nullable|string|in:Y,N',
            'has_allergy'                             => 'nullable|in:Y,N',
            'past_medical_history_allergy'            => 'nullable|required_if:has_allergy,true|string|max:500',
            'past_medical_history_tuberculosis'       => 'nullable|string|in:Y,N',
            'had_surgery'                             => 'nullable|in:Y,N',
            'past_medical_history_surgery'            => 'nullable|required_if:had_surgery,true|string|max:500',
            'yellowish_discoloration_of_skin_selera'  => 'nullable|string|in:Y,N',
            'had_been_hospitalized'                   => 'nullable|in:Y,N',
            'past_medical_history_hospitalization'    => 'nullable|required_if:had_been_hospitalized,true|string|max:500',
            'past_medical_history_others'             => 'nullable|string|max:500',

            // --- Last Taken ---
            'last_taken_cxr_sputum_date'   => 'nullable|date',
            'last_taken_cxr_sputum_result' => 'nullable|string|max:500',

            'last_taken_ecg_date'   => 'nullable|date',
            'last_taken_ecg_result' => 'nullable|string|max:500',

            'last_taken_urinalysis_date'   => 'nullable|date',
            'last_taken_urinalysis_result' => 'nullable|string|max:500',

            'last_taken_drug_test_date'   => 'nullable|date',
            'last_taken_drug_test_result' => 'nullable|string|max:500',

            'last_taken_neuro_exam_date'   => 'nullable|date',
            'last_taken_neuro_exam_result' => 'nullable|string|max:500',

            'last_taken_bloodtyping_date'   => 'nullable|date',
            'last_taken_bloodtyping_result' => 'nullable|string|max:500',

            'last_taken_others' => 'nullable|string|max:500',

            // --- Social History ---
            'smoking'                   => 'nullable|string|in:Y,N',
            'smoking_age_started'       => 'nullable|integer|min:0|required_if:smoking,Y',
            'smoking_sticks_pack_per_day' => 'nullable|integer|min:0|required_if:smoking,Y',
            'smoking_pack_per_year'     => 'nullable|integer|min:0|required_if:smoking,Y',

            'alcohol'             => 'nullable|string|in:Y,N',
            'alcohol_how_often'   => 'nullable|string|max:255|required_if:alcohol,Y',
            'food_preference'     => 'nullable|string|max:255',

            // --- OB-GYN History ---
            'menarche'           => 'nullable|integer|min:0',
            'cycle'              => 'nullable|string|in:Regular,Irregular',
            'duration'           => 'nullable|integer|min:0',
            'ob_gyn_parity'      => 'nullable|string|in:F,P,A,L',
            'papsmear_done'      => 'nullable|string|in:Y,N',
            'papsmear_date'      => 'nullable|date|required_if:papsmear_done,Y',
            'self_breast_exam_done' => 'nullable|string|in:Y,N',
            'mass_noted'         => 'nullable|string|in:Y,N',
            'mass_location'      => 'nullable|string|max:255|required_if:mass_noted,Y',

            // --- Male Personnel ---
            'digital_rectal_exam_done'   => 'nullable|string|in:Y,N',
            'digital_rectal_exam_date'   => 'nullable|date|required_if:digital_rectal_exam_done,Y',
            'digital_rectal_exam_result' => 'nullable|string|max:500',

            // --- Present Health Status ---
            'present_health_status_cough' => 'nullable|string|in:2wks,1_month,longer',

            'present_health_status_dizziness'          => 'nullable|string|in:Y,N',
            'present_health_status_dyspnea'           => 'nullable|string|in:Y,N',
            'present_health_status_chest_back_pain'   => 'nullable|string|in:Y,N',
            'present_health_status_easy_fatigability' => 'nullable|string|in:Y,N',
            'present_health_status_joint_extremity_pains' => 'nullable|string|in:Y,N',
            'present_health_status_blurring_of_vision' => 'nullable|string|in:Y,N',
            'present_health_status_wearing_eyeglasses' => 'nullable|string|in:Y,N',
            'present_health_status_vaginal_discharge_bleeding' => 'nullable|string|in:Y,N',

            'present_health_status_dental_status'            => 'nullable|string|max:500',
            'present_health_status_present_medications_taken' => 'nullable|string|max:500',

            'present_health_status_lumps'           => 'nullable|string|in:Y,N',
            'present_health_status_painful_urination' => 'nullable|string|in:Y,N',
            'present_health_status_poor_loss_of_hearing' => 'nullable|string|in:Y,N',
            'present_health_status_syncope_fainting' => 'nullable|string|in:Y,N',
            'present_health_status_convulsions'     => 'nullable|string|in:Y,N',
            'present_health_status_malaria'         => 'nullable|string|in:Y,N',
            'present_health_status_goiter'          => 'nullable|string|in:Y,N',
            'present_health_status_anemia'          => 'nullable|string|in:Y,N',

            'present_health_status_others' => 'nullable|string|max:500',
        ];
    }
}
