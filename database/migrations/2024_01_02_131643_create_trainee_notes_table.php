<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trainee_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainee_id');
            $table->date('note_date');
            $table->enum('note_category', [
                'behavior',
                'performance'
            ]);
            $table->enum('note_type',[
               'Positive',
               'negative'
            ]);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainee_notes');
    }
};
