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
        Schema::create('field_applications', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('university');
            $table->string('program');
            $table->string('year_of_study');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('duration_weeks');
            $table->text('experience')->nullable();
            $table->text('learning_goals')->nullable();
            $table->string('source')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('field_applications');
    }
};
