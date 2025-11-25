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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('category');
            $table->string('service_slug');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->json('technologies')->nullable();
            $table->string('web_type')->nullable();
            $table->text('use_cases')->nullable();
            $table->text('challenge')->nullable();
            $table->text('solution')->nullable();
            $table->json('results')->nullable();
            $table->json('features')->nullable();
            $table->string('client')->nullable();
            $table->string('duration')->nullable();
            $table->string('team_size')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
