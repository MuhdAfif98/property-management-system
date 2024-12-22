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
        Schema::create('emergency_incidents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties');
            $table->string('title');
            $table->text('description');
            $table->enum('type', ['fire', 'medical', 'security', 'natural_disaster', 'other']);
            $table->enum('severity', ['low', 'medium', 'high', 'critical']);
            $table->datetime('reported_at');
            $table->datetime('resolved_at')->nullable();
            $table->json('affected_areas');
            $table->json('response_actions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergency_incidents');
    }
};