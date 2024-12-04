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
        Schema::create('feed_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feed_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('type');
            $table->string('thumbnail')->nullable();
            $table->string('size')->comment('kb');
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feed_attachments');
    }
};
