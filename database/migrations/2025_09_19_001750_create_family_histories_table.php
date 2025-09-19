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
        Schema::create('family_histories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('health_card_id')->constrained()->onDelete('cascade');

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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_histories');
    }
};
