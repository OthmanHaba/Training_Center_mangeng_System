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
        Schema::create('program_delivery_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('programDelivery_id');
            $table->foreignId('rate_id');
            $table->date('end_date');
            $table->multiLineString('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_delivery_details');
    }
};
