<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('past_medical_histories', function (Blueprint $table) {
            $table->enum('has_allergy', ['Y','N'])->nullable()->change();
            $table->enum('had_surgery', ['Y','N'])->nullable()->change();
            $table->enum('had_been_hospitalized', ['Y','N'])->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('past_medical_histories', function (Blueprint $table) {
            $table->boolean('has_allergy')->nullable()->change();
            $table->boolean('had_surgery')->nullable()->change();
            $table->boolean('had_been_hospitalized')->nullable()->change();
        });
    }
};
