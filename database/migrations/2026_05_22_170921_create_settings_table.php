<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value_tr')->nullable();
            $table->text('value_en')->nullable();
            $table->enum('type', ['text', 'textarea', 'image', 'json', 'boolean'])->default('text');
            $table->string('group')->default('general'); // 'seo','contact','social','general'
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
