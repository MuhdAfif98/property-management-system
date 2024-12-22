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
        Schema::create('event_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events');
            $table->foreignId('resident_id')->constrained('residents');
            $table->integer('guest_count')->default(0);
            $table->json('guest_details')->nullable();
            $table->enum('status', ['registered', 'cancelled', 'attended', 'no_show'])->default('registered');
            $table->decimal('amount_paid', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_registrations');
    }
};
