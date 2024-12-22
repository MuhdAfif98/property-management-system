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
        Schema::create('emergency_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties');
            $table->string('contact_name');
            $table->string('organization');
            $table->string('phone_number');
            $table->string('alternative_phone')->nullable();
            $table->string('email')->nullable();
            $table->enum('type', ['police', 'fire', 'medical', 'security', 'maintenance', 'other']);
            $table->integer('priority_order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergency_contacts');
    }
};