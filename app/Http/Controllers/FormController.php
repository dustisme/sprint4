<?php
//funcions del CRUD en un sol controlador
//es prioritza q les dades inputades en un sol form 
//puguin incloures en diferents taules de la db

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Trainer;
use App\Models\Type;
use Illuminate\Http\Request;

class FormController extends Controller
{

    public function index()
    {
        // $pokemon_types = PokemonType::all();
        // $pokemons = Pokemon::all();
        $trainers = Trainer::all();
        return view('trainers.index');
    }

    public function create()
    {
        return view('trainers.create', [
            'types' => Type::all(),
        ]);
    }

    public function store(Request $request)
    {
        //form data validation
        $validatedData = $request->validate([
            'trainer_name' => 'required|string|min:3',
            'trainer_code' => 'required|string|min:5|max:5',
            'pokemon_name' => 'required|string',
            'pokemon_level' => 'required|integer|min:1|max:100',
            'pokemon_type' => 'required|exists:types,id'
        ]);

        //gets the pokemon type based on name
        $pokemon_type = Type::where(
            'type_name',
            $validatedData['pokemon_type']
        )->first();

        //creates new Pokemon
        $pokemon = Pokemon::create([
            'pokemon_name' => $validatedData['pokemon_name'],
            'pokemon_level' => $validatedData['pokemon_level'],
            'type_id' => $validatedData['pokemon_type']
        ]);

        //attach pokemon type to pokemon
        if ($pokemon_type) {
            $pokemon->type_id = $pokemon_type->id;
            $pokemon->save();
        }

        //creates new Trainer
        $trainer = Trainer::create([
            'trainer_name' => $validatedData['trainer_name'],
            'trainer_code' => $validatedData['trainer_code'],
            'pokemon_id' => $pokemon->id,
        ]);


        return redirect('/trainers');
    }

    public function show(int $id)
    {
        $trainer = Trainer::find($id);
        return view('trainers.show');
    }

    public function edit(int $id)
    {
        $trainer = Trainer::find($id);
        $pokemon = $trainer->pokemon;
        $pokemon_type = $pokemon->pokemon_type;

        $pokemon_types = Type::all();

        return view('trainers.edit', compact('trainer', 'pokemon', 'pokemon_type', 'pokemon_types'));
    }

    public function update(Request $request, int $id)
    {
        //form data validation
        $validatedData = $request->validate([
            'trainer_name' => 'required|string|min:3',
            'trainer_code' => 'required|string|min:5|max:5',
            'pokemon_name' => 'required|string',
            'pokemon_level' => 'required|integer|min:1|max:100',
            'pokemon_type' => 'required|exists:types,id'
        ]);

        //finds trainer by id
        $trainer = Trainer::find($id);

        //updates trainer
        $trainer->name = $validatedData['trainer_name'];
        $trainer->save();

        //updates pokemon associated 
        $pokemon = $trainer->pokemon;
        $pokemon->name = $validatedData['pokemon_name'];
        $pokemon->type_id = $validatedData['pokemon_type'];
        $pokemon->save();

        return redirect('/trainer-info/{id}');
    }

    public function destroy(int $id)
    {
        $trainer = Trainer::find($id);
        $trainer->delete();

        return redirect('/trainers.index');
    }
}
