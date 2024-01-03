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
        Schema::create('trainees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('berthDate');
            $table->string('EducationalLevel');
            $table->string('phoneNumber');
            $table->string('email')->unique();
            $table->date('startDate');
            $table->string('UniqeSahapMAil');
            $table->enum('states',[
                'approved',
                'registered',
                'approved_lated',
                'denied',
                'graduated',
                'graduated_feeble',
                'feeble',
                'Suspended',
            ]);
            $table->date('endDate');
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainees');
    }
};
