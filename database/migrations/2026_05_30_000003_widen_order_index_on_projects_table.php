<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // tinyInteger max 127 — büyük kataloglar için smallInteger (max 32767)
            $table->smallInteger('order_index')->default(0)->change();
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->tinyInteger('order_index')->default(0)->change();
        });
    }
};
