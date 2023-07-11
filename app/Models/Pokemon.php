<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;
    protected $table = 'pokemons';
    protected $fillable = ['pokemon_name', 'pokemon_level', 'type_id'];
    public $timestamps = false;

    public function trainer() {

        return $this->hasOne(Trainer::class, 'pokemon_id');
    }

    public function type() {

        return $this->belongsTo(Type::class);

    }

}
