<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('cover_image')->nullable();
            $table->foreignId('service_id')->nullable()->constrained('services')->nullOnDelete();
            $table->string('location_tr')->nullable();
            $table->string('location_en')->nullable();
            $table->year('year')->nullable();
            $table->enum('status', ['completed', 'ongoing'])->default('completed');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->tinyInteger('order_index')->default(0);

            $table->string('title_tr');
            $table->text('scope_tr')->nullable();
            $table->longText('description_tr')->nullable();
            $table->string('meta_title_tr')->nullable();
            $table->text('meta_desc_tr')->nullable();

            $table->string('title_en')->nullable();
            $table->text('scope_en')->nullable();
            $table->longText('description_en')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->text('meta_desc_en')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
