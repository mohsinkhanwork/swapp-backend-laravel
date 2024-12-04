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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');                   // New event title
            $table->date('date');                      // Date
            $table->time('from_time')->nullable();     // From Time
            $table->time('end_time')->nullable();      // End Time
            $table->boolean('all_day')->default(false); // All Day Flag
            $table->enum('location_type', ['virtual', 'physical']); // Location Type (virtual or physical)
            $table->enum('meeting_type', ['zoom', 'google_meet'])->nullable(); // Meeting (Zoom or Google Meet)
            $table->string('location')->nullable();    // Location (for physical meetings)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
