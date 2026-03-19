<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->nullable();
            $table->string('icon')->nullable();
            $table->text('short_description');
            $table->string('excerpt_note')->nullable();
            $table->longText('overview')->nullable();
            $table->text('thumbnail');
            $table->string('thumbnail_alt')->nullable();
            $table->string('industry')->nullable();
            $table->string('client_name')->nullable();
            $table->date('project_date')->nullable();
            $table->string('project_url')->nullable();
            $table->json('tags')->nullable();
            $table->json('key_features')->nullable();
            $table->json('results')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};