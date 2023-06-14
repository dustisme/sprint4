@extends('layouts.base')

@section('content')
{{-- <x-header /> --}}
    <x-container>

        <x-section>

            <div class="text-white text-center font-bold font-Figtree px-4 py-10">
                <h1 class="text-4xl pb-8">Welcome to the Indigo <br>Pokemon League</h1>
                <h2 class="text-2xl">What would you like to do?</h2>
            </div>
            <div class="text-white text-center font-PokemonGB flex flex-col px-2 py-8">
                {{-- Create new Trainer --}}
                <a href="/new-trainer" class="pb-2">&#9205; Register a Pokémon Trainer</a>
                {{-- List Trainers --}}
                <a href="/trainers" class="pb-2">&#9205; Look which Pokémon Trainers participate</a>
                {{-- Create new Battle --}}
                <a href="/new-battle" class="pb-2">&#9205; Register a new Pokémon Battle</a>
                {{-- List Battles --}}
                <a href="/battle-results" class="pb-2">&#9205; View Pokémon Battles results</a>
            </div>

            </div>

        </x-section>

    </x-container>
{{-- <x-footer /> --}}
@endsection
