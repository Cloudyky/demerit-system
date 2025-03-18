<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Table for offense records
        Schema::create('offense_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('offense_id')->constrained('offenses')->onDelete('cascade');
            $table->integer('demerit');
            $table->timestamps();
        });

        // Table for contribution records
        Schema::create('contribution_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('contribution_id')->constrained('contributions')->onDelete('cascade');
            $table->integer('merit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offense_records');
        Schema::dropIfExists('contribution_records');
    }
};
