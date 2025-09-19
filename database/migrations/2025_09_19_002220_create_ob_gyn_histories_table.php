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
        Schema::create('ob_gyn_histories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('health_card_id')->constrained()->onDelete('cascade');

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

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ob_gyn_histories');
    }
};
