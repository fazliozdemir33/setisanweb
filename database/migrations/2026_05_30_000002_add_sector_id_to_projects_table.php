<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->foreignId('sector_id')->nullable()->constrained('project_sectors')->nullOnDelete()->after('service_id');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeignIfExists(['sector_id']);
            $table->dropColumnIfExists('sector_id');
        });
    }
};
