@extends('layouts.base')

@section('content')
    <x-container>

        <x-form action="/trainers" class="p-4">

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
                </div>
                <br>

                <div>
                    <label for="trainer_code" class="text-white font-bold">TRAINER'S CODE <span
                            class="text-red-400 text-xs">&#10033;</span></label><br>
                    <input id="trainer_code" name="trainer_code" type="text" class="rounded"><br>
                </div>
                <br>
                {{-- Pokemon input field --}}
                <div>
                    <label for="pokemon_name" class="text-white font-bold">POKÉMON NAME <span
                            class="text-red-400 text-xs">&#10033;</span></label><br>
                    <input id="pokemon_name" name="pokemon_name" type="text" class="rounded"><br>
                </div>
                <br>

                <div>
                    <label for="pokemon_level" class="text-white font-bold"> POKÉMON LEVEL<span
                            class="text-red-400 text-xs">&#10033;</span></label><br>
                    <input id="pokemon_level" name="pokemon_level" type="number" class="rounded" min="1"
                        max="100"><br>
                </div>
                <br>
                {{-- PokemonType input field --}}
                <div>
                    <label for="pokemon_type" class="text-white font-bold">POKÉMON TYPE <span
                            class="text-red-400 text-xs">&#10033; Select
                            One</span></label><br>
                    <select name="pokemon_type" id="pokemon_type" class="rounded"><br>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="flex justify-evenly">
                    <x-button class="bg-slate-500 p-2 rounded">
                        SUBMIT
                    </x-button>
                    <x-button type="reset" class="bg-slate-500 p-2 rounded">
                        RESET
                    </x-button>
                    <a href="/trainers"
                        class="bg-red-400 hover:bg-red-500  hover:text-white inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-1 focus:ring-slate-50 focus:ring-offset-1 transition ease-in-out duration-150">
                        CANCEL
                    </a>
                </div>
            </x-section>

        </x-form>

    </x-container>
@endsection
