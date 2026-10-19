<?php

// php artisan make:migration name_table --path=/database/migrations/analytics

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
        Schema::create('analytics_scode_actions', function(Blueprint $table) {
            $table->id('id_action');
            $table->integer('id_visit')->nullable();
            $table->string('action_name')->nullable();
            $table->text('action_data')->nullable();
            $table->timestamp('action_date')->nullable();    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics_scode_actions');
    }
};