<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('battles', function (Blueprint $table) {
            $table->id();
            $table->date('battle_date')->default(DB::raw('CURRENT_DATE'));
            $table->unsignedBigInteger('trainer_1_id')->nullable();
            $table->unsignedBigInteger('trainer_2_id')->nullable();
            $table->unsignedBigInteger('winner_trainer_id')->nullable();
            $table->foreign('trainer_1_id')->references('id')->on('trainers');
            $table->foreign('trainer_2_id')->references('id')->on('trainers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('battles');
    }
};
