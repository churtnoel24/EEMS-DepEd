<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ctrs', function (Blueprint $table) {
            $table->id();

            // Link to health_card
            $table->foreignId('health_card_id')->constrained()->onDelete('cascade');

            // CTR fields
            $table->date('consultation_date');
            $table->text('symptoms');
            $table->text('diagnosis');
            $table->text('treatment');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ctrs');
    }
};
