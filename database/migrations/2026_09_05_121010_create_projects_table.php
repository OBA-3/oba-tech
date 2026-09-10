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

            // Category
            $table->foreignId('category_id')
                ->constrained('categories')
                ->restrictOnDelete();

            // Basic information
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('short_description');
            $table->text('description')->nullable();

            // Case Study
            $table->text('challenge')->nullable();
            $table->text('solution')->nullable();
            $table->text('role')->nullable();

            // Project information
            $table->string('client_type')->default('Personal');
            $table->string('project_type')->default('Team');
            $table->string('duration')->nullable();

            // Publication
            $table->string('status')->default('Draft');
            $table->string('visibility')->default('Public');
            $table->boolean('featured')->default(false);

            // Media & links
            $table->string('cover_image')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('video_url')->nullable();
            $table->string('github_url')->nullable();

            // Results
            $table->text('results')->nullable();

            // Publication date
            $table->timestamp('published_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};