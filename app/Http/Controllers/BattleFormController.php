<?php

namespace App\Http\Controllers;

use App\Models\Battle;
use App\Models\Trainer;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CreateBattleRequest;

class BattleFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $battles = Battle::all();

        return view('battles.index', [
            'battles' => $battles,
            'trainer1' => Trainer::get(),
            'trainer2' => Trainer::get(),
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
    public function store(CreateBattleRequest $request): RedirectResponse
    {
        //find Trainer by id
        $trainer1 = Trainer::find($request->trainer_1_id);
        $trainer2 = Trainer::find($request->trainer_2_id);

        //creates new battle with trainers
        $battle = new Battle();
        $battle->trainer_1_id = $trainer1->id;
        $battle->trainer_2_id = $trainer2->id;

        //assigns winner and loser through determineWinner function
        $winner = $battle->determineWinner($trainer1->id, $trainer1->pokemon->id, $trainer2->id, $trainer2->pokemon->id);
        $loser = ($winner === $trainer1->id) ? $trainer2->id : $trainer1->id;

        //updates and saves battle
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
        $battle = Battle::with(['trainer1', 'trainer2'])->findOrFail($id);

        //retrieves winner and loser by id
        $winner = Trainer::find($battle->winner_trainer_id);
        $loser = Trainer::find($battle->loser_trainer_id);

        return view('battles.show', [
            'battle' => $battle,
            'trainer1' => Trainer::find($battle->trainer_1_id),
            'trainer2' => Trainer::find($battle->trainer_2_id),
            'winner' => $winner,
            'loser' => $loser,
        ]);
    }
}
