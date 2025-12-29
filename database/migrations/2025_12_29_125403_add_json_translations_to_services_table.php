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
            $table->json('services_list_translations')->nullable()->after('services_list');
            $table->json('why_choose_translations')->nullable()->after('why_choose');
            $table->json('benefits_translations')->nullable()->after('benefits');
            $table->json('service_details_translations')->nullable()->after('service_details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'services_list_translations',
                'why_choose_translations',
                'benefits_translations',
                'service_details_translations'
            ]);
        });
    }
};
