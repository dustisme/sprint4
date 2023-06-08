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
        Schema::create('pokemons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('level');
            $table->unsignedBigInteger('type_id');
            $table->timestamps();
            $table->foreign('type_id')->references('id')->on('pokemontype');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemons');
    }
};
