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
        Schema::create('analytics_scode_activities', function(Blueprint $table) {
            $table->id('id_activity');
            $table->integer('id_visit')->nullable();
            $table->string('activity')->nullable();
            $table->string('body')->nullable();
            $table->timestamp('date_activity')->nullable();    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics_scode_activity');
    }
};