<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('offense_records', function (Blueprint $table) {
            $table->foreignId('assigned_by')->nullable()->constrained('users')->onDelete('set null');
        });

        Schema::table('contribution_records', function (Blueprint $table) {
            $table->foreignId('assigned_by')->nullable()->constrained('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('offense_records', function (Blueprint $table) {
            $table->dropForeign(['assigned_by']);
            $table->dropColumn('assigned_by');
        });

        Schema::table('contribution_records', function (Blueprint $table) {
            $table->dropForeign(['assigned_by']);
            $table->dropColumn('assigned_by');
        });
    }
};

