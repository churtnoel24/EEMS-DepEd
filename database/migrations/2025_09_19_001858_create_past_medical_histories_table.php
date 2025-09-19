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
        Schema::create('past_medical_histories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('health_card_id')->constrained()->onDelete('cascade');

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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('past_medical_histories');
    }
};
