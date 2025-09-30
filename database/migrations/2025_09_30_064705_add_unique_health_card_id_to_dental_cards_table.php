<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('dental_cards', function (Blueprint $table) {
            // Ensure health_card_id is unique
            $table->unique('health_card_id');
        });
    }

    public function down(): void
    {
        Schema::table('dental_cards', function (Blueprint $table) {
            $table->dropUnique(['health_card_id']);
        });
    }
};

