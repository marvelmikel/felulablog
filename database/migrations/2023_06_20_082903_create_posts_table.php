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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable(); // making it nullable bcos of rss feed posts
            $table->string('category_id')->default(1); // 1 = General
            $table->longText('excerpt')->nullable();
            $table->longText('body')->nullable();
            $table->string('title')->nullable();

            $table->string('link')->nullable();
            $table->string('source')->nullable();
            $table->string('author')->nullable();
            $table->boolean('is_rss')->default(false);

            $table->boolean('is_published')->default(false);
            $table->string('featured_image')->nullable();
            $table->dateTime('published_date')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
