<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('present_health_statuses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('health_card_id')->constrained()->onDelete('cascade');

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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('present_health_statuses');
    }
};
