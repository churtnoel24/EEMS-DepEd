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
        Schema::create('social_histories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('health_card_id')->constrained()->onDelete('cascade');

            // --- Social History ---
            $table->enum('smoking', ['Y', 'N'])->nullable();
            $table->unsignedTinyInteger('smoking_age_started')->nullable();
            $table->unsignedSmallInteger('smoking_sticks_pack_per_day')->nullable();
            $table->unsignedSmallInteger('smoking_pack_per_year')->nullable();
            $table->enum('alcohol', ['Y', 'N'])->nullable();
            $table->string('alcohol_how_often', 255)->nullable();
            $table->string('food_preference', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_histories');
    }
};
