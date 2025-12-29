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
        Schema::table('portfolios', function (Blueprint $table) {
            $table->json('title_translations')->nullable()->after('title');
            $table->json('category_translations')->nullable()->after('category');
            $table->json('description_translations')->nullable()->after('description');
            $table->json('web_type_translations')->nullable()->after('web_type');
            $table->json('use_cases_translations')->nullable()->after('use_cases');
            $table->json('challenge_translations')->nullable()->after('challenge');
            $table->json('solution_translations')->nullable()->after('solution');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn([
                'title_translations',
                'category_translations',
                'description_translations',
                'web_type_translations',
                'use_cases_translations',
                'challenge_translations',
                'solution_translations'
            ]);
        });
    }
};
