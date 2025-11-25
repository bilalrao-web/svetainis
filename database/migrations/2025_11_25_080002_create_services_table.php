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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('intro')->nullable();
            $table->text('note')->nullable();
            $table->text('closing')->nullable();
            $table->string('image')->nullable();
            $table->json('services_list')->nullable(); // Array of services
            $table->json('why_choose')->nullable(); // Array of benefits
            $table->json('benefits')->nullable(); // Array of benefits
            $table->json('service_details')->nullable(); // For complex nested structures
            $table->string('portfolio_project')->nullable();
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
        Schema::dropIfExists('services');
    }
};
