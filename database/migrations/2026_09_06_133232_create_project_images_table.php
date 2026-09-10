<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_images', function (Blueprint $table) {

            $table->id();

            $table->foreignId('project_id')
                ->constrained('projects')
                ->cascadeOnDelete();

            // Path of the image in Supabase Storage
            $table->string('path');

            // Alternative text for accessibility and SEO
            $table->string('alt_text')->nullable();

            // Order of the image in the project gallery
            $table->unsignedInteger('sort_order')->default(0);

            // Main image of the gallery
            $table->boolean('is_featured')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_images');
    }
};