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
        Schema::create('types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type_name');
            $table->json('strong_against')->nullable();
        });

        //encodes the effectiveness of pokemon types
        $types = [
            [
                'type_name' => 'NORMAL',
                'strong_against' => null,
            ],
            [
                'type_name' => 'FIRE',
                'strong_against' => json_encode(['GRASS', 'ICE', 'BUG']),
            ],
            [
                'type_name' => 'WATER',
                'strong_against' => json_encode(['FIRE', 'GROUND', 'ROCK']),
            ],
            [
                'type_name' => 'ELECTRIC',
                'strong_against' => json_encode(['WATER', 'FLYING']),
            ],
            [
                'type_name' => 'GRASS',
                'strong_against' => json_encode(['WATER', 'GROUND', 'ROCK']),
            ],
            [
                'type_name' => 'ICE',
                'strong_against' => json_encode(['GRASS', 'GROUND', 'FLYING', 'DRAGON']),
            ],
            [
                'type_name' => 'FIGHTING',
                'strong_against' => json_encode(['NORMAL', 'ICE', 'ROCK']),
            ],
            [
                'type_name' => 'POISON',
                'strong_against' => json_encode(['GRASS', 'BUG']),
            ],
            [
                'type_name' => 'GROUND',
                'strong_against' => json_encode(['FIRE', 'ELECTRIC', 'POISON', 'ROCK']),
            ],
            [
                'type_name' => 'FLYING',
                'strong_against' => json_encode(['GRASS', 'FIGHTING', 'BUG']),
            ],
            [
                'type_name' => 'PSYCHIC',
                'strong_against' => json_encode(['FIGHTING', 'POISON']),
            ],
            [
                'type_name' => 'BUG',
                'strong_against' => json_encode(['GRASS', 'POISON', 'PSYCHIC']),
            ],
            [
                'type_name' => 'ROCK',
                'strong_against' => json_encode(['FIRE', 'ICE', 'FLYING', 'BUG']),
            ],
            [
                'type_name' => 'GHOST',
                'strong_against' => json_encode(['GHOST']),
            ],
            [
                'type_name' => 'DRAGON',
                'strong_against' => json_encode(['DRAGON']),
            ],

        ];

        DB::table('types')->insert($types);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types');
    }
};
