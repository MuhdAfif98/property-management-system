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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties');
            $table->string('title');
            $table->text('content');
            $table->enum('type', ['announcement', 'alert', 'reminder', 'emergency']);
            $table->json('recipient_roles')->nullable();
            $table->datetime('scheduled_at')->nullable();
            $table->datetime('expires_at')->nullable();
            $table->json('sent_to')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};