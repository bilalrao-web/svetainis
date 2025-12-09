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
        Schema::table('services', function (Blueprint $table) {
            $table->json('title_translations')->nullable()->after('title');
            $table->json('description_translations')->nullable()->after('description');
            $table->json('intro_translations')->nullable()->after('intro');
            $table->json('closing_translations')->nullable()->after('closing');
            $table->json('note_translations')->nullable()->after('note');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'title_translations',
                'description_translations',
                'intro_translations',
                'closing_translations',
                'note_translations'
            ]);
        });
    }
};
