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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_number');
            $table->string('id_number')->nullable();
            $table->foreignId('resident_id')->constrained('residents');
            $table->foreignId('property_id')->constrained('properties');
            $table->datetime('expected_arrival');
            $table->datetime('expected_departure');
            $table->datetime('actual_arrival')->nullable();
            $table->datetime('actual_departure')->nullable();
            $table->string('purpose');
            $table->enum('status', ['pending', 'approved', 'rejected', 'checked_in', 'checked_out'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};