<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->string('cover_image')->nullable();
            $table->tinyInteger('order_index')->default(0);
            $table->boolean('is_active')->default(true);

            $table->string('title_tr');
            $table->text('excerpt_tr')->nullable();
            $table->longText('content_tr')->nullable();
            $table->string('meta_title_tr')->nullable();
            $table->text('meta_desc_tr')->nullable();

            $table->string('title_en')->nullable();
            $table->text('excerpt_en')->nullable();
            $table->longText('content_en')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->text('meta_desc_en')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
