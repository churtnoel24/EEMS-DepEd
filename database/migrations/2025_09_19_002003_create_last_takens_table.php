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
        Schema::create('last_takens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('health_card_id')->constrained()->onDelete('cascade');

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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('last_takens');
    }
};
