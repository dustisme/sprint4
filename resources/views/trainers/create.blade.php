@extends('layouts.base')

@section('content')
    <x-container>

        <x-form action="/trainer" method="POST" class="p-4">

            <x-section>
                <h2 class="text-white font-bold">REGISTER POKÉMON TRAINER</h2>
                <p class="text-red-400 text-xs">&#10033; required</p>
            </x-section>
            <x-section>
                {{-- Trainer input field --}}
                <div>
                    <label for="trainer_name" class="text-white font-bold">TRAINER'S NAME <span
                            class="text-red-400 text-xs">&#10033;</span></label><br>
                    <input id="trainer_name" name="trainer_name" type="text" class="rounded"><br>
                    @error('trainer_name')
                        <small class="text-red-400">*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <br>

                <div>
                    <label for="trainer_code" class="text-white font-bold">TRAINER'S CODE <span
                            class="text-red-400 text-xs">&#10033;</span></label><br>
                    <input id="trainer_code" name="trainer_code" type="text" class="rounded"><br>
                </div>
                @error('trainer_code')
                    <small class="text-red-400">*{{ $message }}</small>
                    <br>
                @enderror
                <br>
                {{-- Pokemon input field --}}
                <div>
                    <label for="pokemon_name" class="text-white font-bold">POKÉMON NAME <span
                            class="text-red-400 text-xs">&#10033;</span></label><br>
                    <input id="pokemon_name" name="pokemon_name" type="text" class="rounded"><br>
                </div>
                @error('pokemon_name')
                    <small class="text-red-400">*{{ $message }}</small>
                    <br>
                @enderror
                <br>

                <div>
                    <label for="pokemon_level" class="text-white font-bold"> POKÉMON LEVEL<span
                            class="text-red-400 text-xs">&#10033;</span></label><br>
                    <input id="pokemon_level" name="pokemon_level" type="number" class="rounded" min="1"
                        max="100"><br>
                </div>
                @error('pokemon_level')
                    <small class="text-red-400">*{{ $message }}</small>
                    <br>
                @enderror
                <br>
                {{-- PokemonType input field --}}
                <div>
                    <label for="pokemon_type" class="text-white font-bold">POKÉMON TYPE <span
                            class="text-red-400 text-xs">&#10033; Select
                            One</span></label><br>
                    <select name="type_id" id="pokemon_type" class="rounded"><br>
                        <option value="">Select type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">
                                {{ $type->type_name }}</option>
                        @endforeach
                    </select>
                    @error('pokemon_type')
                        <small class="text-red-400">*{{ $message }}</small>
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
                    <a href="/trainers"
                        class="bg-red-400 hover:bg-red-500  hover:text-white inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-1 focus:ring-slate-50 focus:ring-offset-1 transition ease-in-out duration-150">
                        CANCEL
                    </a>
                </div>
            </x-section>

        </x-form>

    </x-container>
@endsection
