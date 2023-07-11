<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TrainerController;

class PokemonController extends Controller
{
    protected $trainerController;

    public function __construct(TrainerController $trainerController)
    {
        $this->trainerController = $trainerController;
    }
    /**
     * Display a listing of the resource.
     *
    public function index()
    {
        //
    }*/

    /**
     * Show the form for creating a new resource.
     *
    public function create()
    {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pokemon = new Pokemon;

        //get the form data
        $pokemon->name = $request->pokemonName;
        $pokemon->level = $request->pokemonLevel;
        $pokemon->type = $request->type;

        // $pokemon->save();

        //insert the data into the trainers' table and get the trainer's id
        $trainerId = $this->trainerController->store($request);

        //insert the data into the pokemon table
        $pokemonId = DB::table('pokemons')->insertGetId([
            'name' => $pokemon->name,
            'level' => $pokemon->level,
            'type_id' => DB::table('pokemontype')
                ->where('name', $pokemon->type_name)
                ->value('id'),
        ]);

        //update the trainer's pokemon_id with the id of the trainer's pokemon
        DB::table('trainers')
            ->where('id', $trainerId)
            ->update(['pokemon_id' => $pokemonId]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        //
    }
}
