<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('client_tr')->nullable()->after('status');
            $table->string('client_en')->nullable()->after('client_tr');
            $table->string('size_tr')->nullable()->after('client_en');
            $table->string('size_en')->nullable()->after('size_tr');
            $table->string('duration_tr')->nullable()->after('size_en');
            $table->string('duration_en')->nullable()->after('duration_tr');
        });
    }

        public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['client_tr', 'client_en', 'size_tr', 'size_en', 'duration_tr', 'duration_en']);
        });
    }
};
