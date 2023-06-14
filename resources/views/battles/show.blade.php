@extends('layouts.base')

@section('content')

    <x-container class="flex-col p-10">
        <x-section class="flex p-5">
            <div class="text-white px-10 py-5">
                <h1 class="pb-7">BATTLE DETAILS</h1>
                <h2>DATE: {{ $battle->battle_date }}</h2><br>
                <div class="flex justify-evenly">
                    <div class="p-2">
                        <h2>WINNER: {{ $winner->trainer_name }}</h2><br>
                        <p class="text-sm">CODE: {{ $winner->trainer_code }}</p><br>
                        @if ($winner->pokemon)
                            <p class="text-sm">POKÉMON: {{ $winner->pokemon->pokemon_name }} </p><br>
                            <p class="text-sm">LEVEL: {{ $winner->pokemon->pokemon_level }}</p><br>
                            <p class="text-sm">TYPE: {{ $winner->pokemon->type->type_name }}</p><br>
                        @endif
                    </div>
                    <div class="p-2">
                        <h2>LOSER: {{ $loser->trainer_name }}</h2><br>
                        <p class="text-sm">CODE: {{ $loser->trainer_code }}</p><br>
                        @if ($loser->pokemon)
                            <p class="text-sm">POKÉMON: {{ $loser->pokemon->pokemon_name }} </p><br>
                            <p class="text-sm">LEVEL: {{ $loser->pokemon->pokemon_level }}</p><br>
                            <p class="text-sm">TYPE: {{ $loser->pokemon->type->type_name }}</p><br>
                        @endif
                    </div>
                </div>
            </div>
        </x-section>

        <div class="pl-10 pt-10">
            <a href="/battle-results">
                <x-button class="bg-red-400 hover:bg-red-500 p-2 rounded">
                    RETURN
                </x-button>
            </a>
        </div>

    </x-container>
@endsection
