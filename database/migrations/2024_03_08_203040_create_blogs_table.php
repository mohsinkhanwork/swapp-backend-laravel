<?php

use App\Models\Admin;
use App\Models\BlogCategory;
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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(BlogCategory::class)->nullable();
            $table->foreignIdFor(Admin::class)->nullable();
            $table->string('title');
            $table->string('slug');
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->text('summary')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('published')->default(0);
            $table->timestamp('published_at')->default(now());
            $table->string('thumbnail')->nullable();
            $table->integer('reads')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
