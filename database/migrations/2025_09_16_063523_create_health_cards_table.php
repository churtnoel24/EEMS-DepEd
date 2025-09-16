<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('health_cards', function (Blueprint $table) {
            $table->id();

            // --- Personal Information ---
            $table->date('date');
            $table->string('name', 255);
            $table->date('date_of_birth');
            $table->unsignedTinyInteger('age');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->enum('civil_status', ['Single', 'Married', 'Widowed', 'Separated']);

            // --- Professional Information ---
            $table->string('school_district_division', 255);
            $table->string('position_designation', 255);
            $table->unsignedSmallInteger('first_year_in_service');
            $table->unsignedSmallInteger('years_in_service');

            // --- Family History ---
            $table->enum('family_history_hypertension', ['Y', 'N'])->nullable();
            $table->string('family_history_hypertension_relationship', 255)->nullable();
            $table->enum('family_history_cardiovascular_disease', ['Y', 'N'])->nullable();
            $table->string('family_history_cardiovascular_disease_relationship', 255)->nullable();
            $table->enum('family_history_diabetes_mellitus', ['Y', 'N'])->nullable();
            $table->string('family_history_diabetes_mellitus_relationship', 255)->nullable();
            $table->enum('family_history_kidney_disease', ['Y', 'N'])->nullable();
            $table->string('family_history_kidney_disease_relationship', 255)->nullable();
            $table->enum('family_history_cancer', ['Y', 'N'])->nullable();
            $table->string('family_history_cancer_relationship', 255)->nullable();
            $table->enum('family_history_asthma', ['Y', 'N'])->nullable();
            $table->string('family_history_asthma_relationship', 255)->nullable();
            $table->enum('family_history_allergy', ['Y', 'N'])->nullable();
            $table->string('family_history_allergy_relationship', 255)->nullable();

            // --- Other Remarks ---
            $table->string('other_remarks', 1000)->nullable();

            // --- Past Medical History ---
            $table->enum('past_medical_history_hypertension', ['Y', 'N'])->nullable();
            $table->enum('past_medical_history_asthma', ['Y', 'N'])->nullable();
            $table->enum('past_medical_history_diabetes_mellitus', ['Y', 'N'])->nullable();
            $table->enum('past_medical_history_cardiovascular_disease', ['Y', 'N'])->nullable();
            $table->boolean('has_allergy');
            $table->string('past_medical_history_allergy', 500)->nullable();
            $table->enum('past_medical_history_tuberculosis', ['Y', 'N'])->nullable();
            $table->boolean('had_surgery');
            $table->string('past_medical_history_surgery', 500)->nullable();
            $table->enum('yellowish_discoloration_of_skin_selera', ['Y', 'N'])->nullable();
            $table->boolean('had_been_hospitalized');
            $table->string('past_medical_history_hospitalization', 500)->nullable();
            $table->string('past_medical_history_others', 500)->nullable();

            // --- Last Taken ---
            $table->date('last_taken_cxr_sputum_date')->nullable();
            $table->string('last_taken_cxr_sputum_result', 500)->nullable();
            $table->date('last_taken_ecg_date')->nullable();
            $table->string('last_taken_ecg_result', 500)->nullable();
            $table->date('last_taken_urinalysis_date')->nullable();
            $table->string('last_taken_urinalysis_result', 500)->nullable();
            $table->date('last_taken_drug_test_date')->nullable();
            $table->string('last_taken_drug_test_result', 500)->nullable();
            $table->date('last_taken_neuro_exam_date')->nullable();
            $table->string('last_taken_neuro_exam_result', 500)->nullable();
            $table->date('last_taken_bloodtyping_date')->nullable();
            $table->string('last_taken_bloodtyping_result', 500)->nullable();
            $table->string('last_taken_others', 500)->nullable();

            // --- Social History ---
            $table->enum('smoking', ['Y', 'N'])->nullable();
            $table->unsignedTinyInteger('smoking_age_started')->nullable();
            $table->unsignedSmallInteger('smoking_sticks_pack_per_day')->nullable();
            $table->unsignedSmallInteger('smoking_pack_per_year')->nullable();
            $table->enum('alcohol', ['Y', 'N'])->nullable();
            $table->string('alcohol_how_often', 255)->nullable();
            $table->string('food_preference', 255)->nullable();

            // --- OB-GYN History ---
            $table->unsignedTinyInteger('menarche')->nullable();
            $table->enum('cycle', ['Regular', 'Irregular'])->nullable();
            $table->unsignedTinyInteger('duration')->nullable();
            $table->enum('ob_gyn_parity', ['F', 'P', 'A', 'L'])->nullable();
            $table->enum('papsmear_done', ['Y', 'N'])->nullable();
            $table->date('papsmear_date')->nullable();
            $table->enum('self_breast_exam_done', ['Y', 'N'])->nullable();
            $table->enum('mass_noted', ['Y', 'N'])->nullable();
            $table->string('mass_location', 255)->nullable();

            // --- Male Personnel ---
            $table->enum('digital_rectal_exam_done', ['Y', 'N'])->nullable();
            $table->date('digital_rectal_exam_date')->nullable();
            $table->string('digital_rectal_exam_result', 500)->nullable();

            // --- Present Health Status ---
            $table->enum('present_health_status_cough', ['2wks', '1_month', 'longer'])->nullable();
            $table->enum('present_health_status_dizziness', ['Y', 'N'])->nullable();
            $table->enum('present_health_status_dyspnea', ['Y', 'N'])->nullable();
            $table->enum('present_health_status_chest_back_pain', ['Y', 'N'])->nullable();
            $table->enum('present_health_status_easy_fatigability', ['Y', 'N'])->nullable();
            $table->enum('present_health_status_joint_extremity_pains', ['Y', 'N'])->nullable();
            $table->enum('present_health_status_blurring_of_vision', ['Y', 'N'])->nullable();
            $table->enum('present_health_status_wearing_eyeglasses', ['Y', 'N'])->nullable();
            $table->enum('present_health_status_vaginal_discharge_bleeding', ['Y', 'N'])->nullable();
            $table->string('present_health_status_dental_status', 500)->nullable();
            $table->string('present_health_status_present_medications_taken', 500)->nullable();
            $table->enum('present_health_status_lumps', ['Y', 'N'])->nullable();
            $table->enum('present_health_status_painful_urination', ['Y', 'N'])->nullable();
            $table->enum('present_health_status_poor_loss_of_hearing', ['Y', 'N'])->nullable();
            $table->enum('present_health_status_syncope_fainting', ['Y', 'N'])->nullable();
            $table->enum('present_health_status_convulsions', ['Y', 'N'])->nullable();
            $table->enum('present_health_status_malaria', ['Y', 'N'])->nullable();
            $table->enum('present_health_status_goiter', ['Y', 'N'])->nullable();
            $table->enum('present_health_status_anemia', ['Y', 'N'])->nullable();
            $table->string('present_health_status_others', 500)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('health_cards');
    }
};
