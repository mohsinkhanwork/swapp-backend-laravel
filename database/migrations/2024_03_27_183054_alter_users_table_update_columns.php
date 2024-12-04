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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name','caption');
            $table->string('username')->after('email');
            $table->string('first_name')->after('id');
            $table->string('last_name')->after('first_name')->nullable();
            $table->string('profession')->nullable();
            $table->boolean('newsletter_subscribed')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name');
            $table->string('caption');
            $table->dropColumn('first_name','last_name','profession','newsletter_subscribed','username');
        });
    }
};
