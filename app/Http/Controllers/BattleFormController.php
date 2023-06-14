<?php

namespace App\Http\Controllers;

use App\Models\Battle;
use App\Models\Trainer;
use Illuminate\Http\Request;

class BattleFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $battle = Battle::all();

        return view('battles.index', [
            'battles' => $battle,
            'trainer1' => Trainer::get(),
            'trainer2' => Trainer::get(),
            'winner_trainer_id' => Trainer::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('battles.create', [
            'trainers' => Trainer::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //form data validation
        $validatedData = $request->validate([
            'trainer_1_id' => 'required|exists:trainers,id',
            'trainer_2_id' => 'required|exists:trainers,id',
        ]);

        //find Trainer by id
        $trainer1 = Trainer::find($validatedData['trainer_1_id']);
        $trainer2 = Trainer::find($validatedData['trainer_2_id']);

        //creates battle with empty trainers columns
        $battle = Battle::create([
            'battle_date' => now()->format('Y-m-d'),
        ]);

        //assigns winner and loser through determineWinner function
        $winner = $battle->determineWinner($trainer1->id, $trainer1->pokemon->id, $trainer2->id, $trainer2->pokemon->id);
        $loser = ($winner === $trainer1->id) ? $trainer2->id : $trainer1->id;

        //updates and saves the empty battle
        $battle->winner_trainer_id = $winner;
        $battle->loser_trainer_id = $loser;
        $battle->save();

        return redirect('/battle-results');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $battle = Battle::with('trainer')->findOrFail($id);

        //retrieves winner and loser by id
        $winner = Trainer::find($battle->winner_trainer_id);
        $loser = Trainer::find($battle->loser_trainer_id);

        return view('battles.show', [
            'battle' => $battle,
            'winner' => $winner,
            'loser' => $loser,
        ]);
    }
}
