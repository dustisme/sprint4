<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('trainers.index');
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

        $trainer->name = $request->name;
        $trainer->code = $request->code;
        $trainer->pokemon_id = $request->pokemon_id;

        $trainer->save();

        return redirect('/trainers');

    }

    /**
     * Display the specified resource.
     */
    public function show(Trainer $trainer)
    {
        return view('trainer/{id}');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $trainer = Trainer::find($id);
        return view('trainers.edit')->with('trainer', $trainer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
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
    public function destroy(Trainer $trainer)
    {
        //
    }
}
