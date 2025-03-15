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
        //
        Schema::create('removed_students', function (Blueprint $table) {
            $table->id('id')->autoIncrement();
            $table->string('name');
            $table->string('ic')->unique();
            $table->string('gender');
            $table->string('kohort');
            $table->string('class');
            $table->integer('merit_points');
            $table->integer('removed_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('removed_students');
    }
};
