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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('title');
            $table->string('monthly_price_id')->nullable();
            $table->string('yearly_price_id')->nullable();
            $table->double('monthly_price')->nullable();
            $table->double('yearly_price')->nullable();
            $table->string('type');
            $table->string('description',500);
            $table->integer('monthly_swaps');
            $table->boolean('show_ads');
            $table->boolean('priority_support');
            $table->integer('retry_exam_duration')->comment('hours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
