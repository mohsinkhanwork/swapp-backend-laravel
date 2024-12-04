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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advertiser_id')->constrained()->cascadeOnDelete();
            $table->foreignId('package_id')->constrained('ad_packages')->cascadeOnDelete();
            $table->integer('package_quantity')->default(1);
            $table->double('price');
            $table->integer('duration');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->json('features')->nullable();
            $table->string('url')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_color')->nullable();
            $table->string('color')->nullable();
            $table->string('bg_color')->nullable();
            $table->string('type')->comment('content or image');
            $table->boolean('active')->default(1);
            $table->string('status')->default('pending');
            $table->integer('impressions')->default(0);
            $table->integer('views')->default(0);
            $table->dateTime('published_at')->nullable();
            $table->dateTime('ends_on')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};
