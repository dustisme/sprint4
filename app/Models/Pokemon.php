<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    private $effectiveness = [
        'normal' => [
            'rock' => 0.5,
            'ghost' => 0.0
        ],
        'fire' => [
            'fire' => 0.5,
            'water' => 0.5,
            'grass' => 200,
            'ice' => 200,
            'bug' => 200,
            'rock' => 0.5,
            'dragon' => 0.5
        ],
        'water' => [
            'fire' => 200,
            'water' => 0.5,
            'grass' => 0.5,
            'ground' => 200,
            'rock' => 200,
            'dragon' => 0.5
        ],
        'electric' => [
            'water' => 200,
            'electric' => 0.5,
            'grass' => 0.5,
            'ground' => 0.0,
            'flying' => 200,
            'dragon' => 0.5
        ],
        'grass' => [
            'fire' => 0.5,
            'water' => 200,
            'grass' => 0.5,
            'poison' => 0.5,
            'ground' => 200,
            'flying' => 0.5,
            'bug' => 0.5,
            'rock' => 200,
            'dragon' => 0.5
        ],
        'ice' => [
            'water' => 0.5,
            'grass' => 200,
            'ice' => 0.5,
            'ground' => 200,
            'flying' => 200,
            'dragon' => 200
        ],
        'fighting' => [
            'normal' => 200,
            'ice' => 200,
            'poison' => 0.5,
            'flying' => 0.5,
            'psychic' => 0.5,
            'bug' => 0.5,
            'rock' => 200,
            'ghost' => 0.0
        ],
        'poison' => [
            'grass' => 200,
            'poison' => 0.5,
            'ground' => 0.5,
            'bug' => 200,
            'rock' => 0.5,
            'ghost' => 0.5
        ],
        'ground' => [
            'fire' => 200,
            'electric' => 200,
            'grass' => 0.5,
            'poison' => 200,
            'flying' => 0.0,
            'bug' => 0.5,
            'rock' => 200
        ],
        'flying' => [
            'electric' => 0.5,
            'grass' => 200,
            'fighting' => 200,
            'bug' => 200,
            'rock' => 0.5
        ],
        'psychic' => [
            'fighting' => 200,
            'poison' => 200,
            'psychic' => 0.5
        ],
        'bug' => [
            'fire' => 0.5,
            'grass' => 200,
            'fighting' => 0.5,
            'poison' => 200,
            'flying' => 0.5,
            'psychic' => 200,
            'ghost' => 0.5
        ],
        'rock' => [
            'fire' => 200,
            'ice' => 200,
            'fighting' => 0.5,
            'ground' => 0.5,
            'flying' => 200,
            'bug' => 200
        ],
        'ghost' => [
            'normal' => 0.0,
            'psychic' => 0.0,
            'ghost' => 200
        ],
        'dragon' => [
            'dragon' => 200,
        ]
    ];

    function pokemonTypeAttack($rival_type) {
        if (isset($this->effectiveness[$this->type][$rival_type])) {
            return $this->effectiveness[$this->type][$rival_type];
        } else {
            return 1.0;
        }
    }
}
