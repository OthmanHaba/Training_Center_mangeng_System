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
        Schema::create('program_course_titles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('programCourse_id');
            $table->integer('hours_count');
            $table->string('requiredLevel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_course_titles');
    }
};
