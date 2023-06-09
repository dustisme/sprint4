@extends('layouts.base')

@section('content')
    <x-container>

        <x-form action="/submitForm" class="p-4">

            <x-section>
                <h2 class="text-white font-bold">REGISTER POKÉMON TRAINER</h2>
                <p class="text-red-400 text-xs">&#10033; required</p>
            </x-section>
            <x-section>
                {{-- Trainer's input field --}}
                <div>
                    <label for="trainer_name" class="text-white font-bold">TRAINER'S NAME <span
                            class="text-red-400 text-xs">&#10033;</span></label><br>
                    <input id="trainer_name" name="trainer_name" type="text" class="rounded"><br>
                    @error('name')
                        <small class="text-red-500">*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <br>

                <div>
                    <label for="trainer_code" class="text-white font-bold">TRAINER'S CODE <span
                            class="text-red-400 text-xs">&#10033;</span></label><br>
                    <input id="trainer_code" name="trainer_code" type="text" class="rounded"><br>
                    @error('code')
                        <small class="text-red-500">*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <br>
                {{-- Pokemon input field --}}
                <div>
                    <label for="pokemon_name" class="text-white font-bold">POKÉMON NAME <span
                            class="text-red-400 text-xs">&#10033;</span></label><br>
                    <input id="pokemon_name" name="pokemon_name" type="text" class="rounded"><br>
                    @error('pokemon_name')
                        <small class="text-red-500">*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <br>

                <div>
                    <label for="pokemon_level" class="text-white font-bold"> POKÉMON LEVEL<span
                            class="text-red-400 text-xs">&#10033;</span></label><br>
                    <input id="pokemon_level" name="pokemon_level" type="number" class="rounded" min="1"
                        max="100"><br>
                    @error('pokemon_level')
                        <small class="text-red-500">*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <br>
                {{-- PokemonType input field --}}
                <div>
                    <label for="pokemon_type" class="text-white font-bold">POKÉMON TYPE <span
                            class="text-red-400 text-xs">&#10033; Select
                            One</span></label><br>
                    <select name="pokemon_type" id="pokemon_type" class="rounded"><br>
                        @foreach ($pokemonTypes as $pokemonType)
                            <option value="{{ $pokemonType->id }}">{{ $pokemonType->name }}</option>
                        @endforeach
                    </select>
                    @error('pokemon_type')
                        <small class="text-red-500">*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <br>
                <div class="flex justify-evenly">
                    <x-button class="bg-slate-500 p-2 rounded">
                        SUBMIT
                    </x-button>
                    <x-button type="reset" class="bg-slate-500 p-2 rounded">
                        RESET
                    </x-button>
                    <x-form action="/trainers.index">
                        <x-button class="bg-red-400 hover:bg-red-500 p-2 rounded">
                            CANCEL
                        </x-button>
                    </x-form>
                </div>

            </x-section>

        </x-form>

    </x-container>
@endsection
