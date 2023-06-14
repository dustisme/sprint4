<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $table = 'trainers';
    protected $fillable = ['trainer_name', 'trainer_code', 'pokemon_id'];
    public $timestamps = false;

    public function pokemon() {

        return $this->belongsTo(Pokemon::class, 'pokemon_id');
    }

    public function battlesAsWinner() {

        return $this->hasMany(Battle::class, 'winner_trainer_id');

    }

    public function battlesAsLoser() {

        return $this->hasMany(Battle::class, 'loser_trainer_id');

    }
}
