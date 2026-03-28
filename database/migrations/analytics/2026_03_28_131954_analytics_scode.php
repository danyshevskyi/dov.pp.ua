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
        Schema::create('analytics_scode_visits', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->integer('user_id');
            $table->string('device');
            $table->string('os');
            $table->string('browser');
            $table->string('country');
            $table->string('region');
            $table->string('city');
            $table->string('lang');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('isp');
            $table->string('referer');
            $table->string('score');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('analytics_scode_events', function(Blueprint $table) {
            $table->id();
            $table->integer('id_visits');
            $table->string('event');
            $table->string('data');
            $table->timestamp('created_at')->nullable();    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics_scode_visits');
        Schema::dropIfExists('analytics_scode_events');
    }
};
