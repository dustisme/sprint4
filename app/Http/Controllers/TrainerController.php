<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $trainers = DB::table('trainers')
        // ->leftjoin('pokemon', 'pokemon.id', "=", 'trainers.pokemon_id')
        // ->select('trainers.name', 'pokemon.name')
        // ->get();

        // return view('trainers.index', ['trainers' => $trainers]);


        $trainers = Trainer::all();
        return view('trainers.index')->with('trainers', $trainers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $trainer = new Trainer;

        //get the form data
        $trainer->name = $request->name;
        $trainer->code = $request->code;
        
        //inserts the data into the trainers table
        $trainer->id = DB::table('trainers')->insertGetId([
            'name' => $trainer->name,
            'code' => $trainer->code,
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $trainer = Trainer::find($id);
        return view('trainers.show')->with('trainer', $trainer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $trainer = Trainer::find($id);
        return view('trainers.edit')->with('trainer', $trainer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $trainer = Trainer::find($id);
        
        $trainer->name = $request->get('name');
        $trainer->pokemon_id = $request->get('pokemon_id');

        $trainer->save();

        return redirect('/trainer/{id}');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        $trainer = Trainer::find($id);
        $trainer->delete();

        return redirect('/trainers.index');
    }
}
