<?php

namespace App\Models;

use App\Models\Type;
use App\Models\Round;
use App\Models\Trainer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Battle extends Model
{
    use HasFactory;
    protected $table = 'battles';
    protected $fillable = ['trainer_1_id', 'trainer_2_id'];
    public $timestamps = false;

    public function trainer1() {

        return $this->belongsTo(Trainer::class, 'trainer_1_id');

    }

    public function trainer2() {

        return $this->belongsTo(Trainer::class, 'trainer_2_id');

    }

    public function winnerTrainer() {

        return $this->belongsTo(Trainer::class, 'winner_trainer_id');

    }

    public function determineWinner($trainer1Id, $pokemon1Type, $trainer2Id, $pokemon2Type)
    {
        if ($trainer1Id === $trainer2Id) {
            return redirect()->back()->withErrors('Trainers cannot be the same.');
        }

        $trainer1 = Trainer::find($trainer1Id);
        $trainer2 = Trainer::find($trainer2Id);

        $pokemon1 = $trainer1->pokemon;
        $pokemon2 = $trainer2->pokemon;

        $pokemon1Level = $pokemon1->pokemon_level;
        $pokemon2Level = $pokemon2->pokemon_level;

        switch (true) {
            case $pokemon1Level > $pokemon2Level:
                //Trainer 1 wins based on pokémon level
                return $trainer1Id;
                break;
            case $pokemon1Level < $pokemon2Level:
                //Trainer 2 wins based on pokémon level
                return $trainer2Id;
                break;
            default:
                //if there's a tie due to pokémon level
                $type1 = Type::where('type_name', $pokemon1Type)->first();
                $type2 = Type::where('type_name', $pokemon2Type)->first();

                $strongAgainst1 = $type1->strong_agaisnt;
                $strongAgainst2 = $type2->strong_agaisnt;

                switch (true) {
                    case in_array($pokemon2Type, $strongAgainst1):
                        //Trainer 1 wins based on pokémon type
                        return $trainer1Id;
                        break;
                    case in_array($pokemon1Type, $strongAgainst2);
                        //Trainer 2 wins based on pokémon type
                        return $trainer2Id;
                        break;
                    default;
                        //It's a tie
                        return 0;
                }
        }
    }
}
