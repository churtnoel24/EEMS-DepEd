<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('health_cards', function (Blueprint $table) {
            // remove every column you’ve moved OUT, but keep Personal Information
            $table->dropColumn([
                // --- Professional Information ---
                'school_district_division',
                'position_designation',
                'first_year_in_service',
                'years_in_service',

                // --- Family History ---
                'family_history_hypertension',
                'family_history_hypertension_relationship',
                'family_history_cardiovascular_disease',
                'family_history_cardiovascular_disease_relationship',
                'family_history_diabetes_mellitus',
                'family_history_diabetes_mellitus_relationship',
                'family_history_kidney_disease',
                'family_history_kidney_disease_relationship',
                'family_history_cancer',
                'family_history_cancer_relationship',
                'family_history_asthma',
                'family_history_asthma_relationship',
                'family_history_allergy',
                'family_history_allergy_relationship',

                // --- Other Remarks ---
                'other_remarks',

                // --- Past Medical History ---
                'past_medical_history_hypertension',
                'past_medical_history_asthma',
                'past_medical_history_diabetes_mellitus',
                'past_medical_history_cardiovascular_disease',
                'has_allergy',
                'past_medical_history_allergy',
                'past_medical_history_tuberculosis',
                'had_surgery',
                'past_medical_history_surgery',
                'yellowish_discoloration_of_skin_selera',
                'had_been_hospitalized',
                'past_medical_history_hospitalization',
                'past_medical_history_others',

                // --- Last Taken ---
                'last_taken_cxr_sputum_date',
                'last_taken_cxr_sputum_result',
                'last_taken_ecg_date',
                'last_taken_ecg_result',
                'last_taken_urinalysis_date',
                'last_taken_urinalysis_result',
                'last_taken_drug_test_date',
                'last_taken_drug_test_result',
                'last_taken_neuro_exam_date',
                'last_taken_neuro_exam_result',
                'last_taken_bloodtyping_date',
                'last_taken_bloodtyping_result',
                'last_taken_others',

                // --- Social History ---
                'smoking',
                'smoking_age_started',
                'smoking_sticks_pack_per_day',
                'smoking_pack_per_year',
                'alcohol',
                'alcohol_how_often',
                'food_preference',

                // --- OB-GYN History ---
                'menarche',
                'cycle',
                'duration',
                'ob_gyn_parity',
                'papsmear_done',
                'papsmear_date',
                'self_breast_exam_done',
                'mass_noted',
                'mass_location',

                // --- Male Personnel ---
                'digital_rectal_exam_done',
                'digital_rectal_exam_date',
                'digital_rectal_exam_result',

                // --- Present Health Status ---
                'present_health_status_cough',
                'present_health_status_dizziness',
                'present_health_status_dyspnea',
                'present_health_status_chest_back_pain',
                'present_health_status_easy_fatigability',
                'present_health_status_joint_extremity_pains',
                'present_health_status_blurring_of_vision',
                'present_health_status_wearing_eyeglasses',
                'present_health_status_vaginal_discharge_bleeding',
                'present_health_status_dental_status',
                'present_health_status_present_medications_taken',
                'present_health_status_lumps',
                'present_health_status_painful_urination',
                'present_health_status_poor_loss_of_hearing',
                'present_health_status_syncope_fainting',
                'present_health_status_convulsions',
                'present_health_status_malaria',
                'present_health_status_goiter',
                'present_health_status_anemia',
                'present_health_status_others',
            ]);
        });
    }

    public function down(): void
    {
        // Optionally re-add columns if rolled back (define them again with their types)
    }
};

