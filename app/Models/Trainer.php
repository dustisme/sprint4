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

    //relationship between trainer and pokemon
    public function pokemon() {

        return $this->belongsTo(Pokemon::class, 'pokemon_id');
    }

    //relationship between trainer and battle winner
    public function battlesAsWinner() {

        return $this->hasMany(Battle::class, 'winner_trainer_id');

    }
    //relationship between traienr and abttle loser
    public function battlesAsLoser() {

        return $this->hasMany(Battle::class, 'loser_trainer_id');

    }
    //counting wins
    public function battlesWonCount() {

        return $this->battlesAsWinner()->count();
    }
    //counting loses
    public function battlesLostCount() {

        return $this->battlesAsLoser()->count();
    }
}
