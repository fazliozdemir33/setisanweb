<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('cover_image')->nullable();
            $table->string('author')->default('Setisan Elektromekanik');
            $table->string('category')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();

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
        Schema::dropIfExists('blog_posts');
    }
};
