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
        Schema::create('prescription_treatment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('treatment_id')->references('id')->on('treatments')->onDelete('cascade');
            $table->foreignId('prescription_id')->references('id')->on('prescriptions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescription_treatment');
    }
};
