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
        Schema::create('male_personnels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('health_card_id')->constrained()->onDelete('cascade');

            // --- Male Personnel ---
            $table->enum('digital_rectal_exam_done', ['Y', 'N'])->nullable();
            $table->date('digital_rectal_exam_date')->nullable();
            $table->string('digital_rectal_exam_result', 500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('male_personnels');
    }
};
