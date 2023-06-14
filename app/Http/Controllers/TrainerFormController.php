<?php
//funcions del CRUD en un sol controlador
//es prioritza q les dades inputades en un sol form 
//puguin incloures en diferents taules de la db

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Pokemon;
use App\Models\Trainer;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\EditPokemonRequest;
use App\Http\Requests\EditTrainerRequest;
use App\Http\Requests\CreatePokemonRequest;
use App\Http\Requests\CreateTrainerRequest;

class TrainerFormController extends Controller
{

    public function index()
    {
        return view('trainers.index', [
            'trainers' => Trainer::all(),
            'pokemons' => Pokemon::all(),
            'types' => Type::all(),
        ]);
    }

    public function create()
    {
        return view('trainers.create', [
            'types' => Type::all(),
        ]);
    }

    public function store(CreateTrainerRequest $trainerRrequest, CreatePokemonRequest $pokemonRequest): RedirectResponse
    {
        //creates pokemon
        $pokemon = new Pokemon();
        $pokemon->pokemon_name = $pokemonRequest->get('pokemon_name');
        $pokemon->pokemon_level = $pokemonRequest->get('pokemon_level');
        $pokemon->type_id = $pokemonRequest->get('type_id');
        $pokemon->save();

        //creates trainer
        $trainer = new Trainer();
        $trainer->trainer_name = $trainerRrequest->get('trainer_name');
        $trainer->trainer_code = $trainerRrequest->get('trainer_code');
        $trainer->pokemon_id = $pokemon->id;
        $trainer->save();

        return redirect('/trainers');
    }

    public function show(string $id)
    {
        $trainer = Trainer::with('pokemon')->findOrFail($id);

        return view('trainers.show', ['trainer' => $trainer]);
    }

    public function edit(string $id)
    {
        $trainer = Trainer::with('pokemon')->findOrFail($id);

        return view('trainers.edit', [
            'trainer' => $trainer,
            'types' => Type::all(),
        ]);
    }

    public function update(EditTrainerRequest $trainerRequest, EditPokemonRequest $pokemonRequest, string $id): RedirectResponse
    {
        //finds trainer by id
        $trainer = Trainer::find($id);

        //updates trainer
        $trainer->trainer_name = $trainerRequest->get('trainer_name');
        $trainer->trainer_code = $trainerRequest->get('trainer_code');
        $trainer->save();

        //finds pokemon by id
        $pokemon = Pokemon::find($trainer->pokemon_id);

        //updates pokemon
        $pokemon->pokemon_name = $pokemonRequest->get('pokemon_name');
        $pokemon->pokemon_level = $pokemonRequest->get('pokemon_level');
        $pokemon->type_id = $pokemonRequest->get('type_id');
        $pokemon->save();

        return redirect("/trainer-info/$trainer->id");
    }

    public function destroy(string $id): RedirectResponse
    {
        //finds trainer by id
        $trainer = Trainer::find($id);

        //deletes trainer from db
        $trainer->delete();

        return redirect('/trainers');
    }
}
