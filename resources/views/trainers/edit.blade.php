@extends('layouts.base')

@section('content')
    <x-container>

        <x-form action="/trainers" class="p-4">

            <x-section>
                <h2 class="text-white font-bold">EDIT POKÉMON TRAINER INFORMATION</h2>
            </x-section>
            <x-section>

                <div>
                    <label for="name" class="text-white font-bold">TRAINER'S NAME</label><br>
                    <input id="name" name="name" type="text" class="rounded" value="{{ old('name', $trainer->name) }}"
                        required><br>
                </div>
                <br>

                <div>
                    <label for="code" class="text-white font-bold">TRAINER'S CODE</label><br>
                    <input id="code" name="code" type="text" class="rounded"
                        value="{{ old('name', $trainer->code) }}"" required><br>
                </div>
                <br>

                <div>
                    <label for="pokemonName" class="text-white font-bold">POKÉMON NAME</label><br>
                    <input id="pokemonName" name="pokemonName" type="text" class="rounded" value="" required><br>
                </div>
                <br>

                <div>
                    <label for="pokemonLevel" class="text-white font-bold"> POKÉMON LEVEL</label><br>
                    <input id="pokemonLevel" name="pokemonLevel" type="number" class="rounded" min="1"
                        max="100" value="" required><br>
                </div>
                <br>

                <div>
                    <label for="pokemonType" class="text-white font-bold">POKÉMON TYPE</label><br>
                    <select name="pokemonType" id="pokemonType" class="rounded" value="" required><br>
                        <option value="normal" id="1" class="uppercase">NORMAL</option>
                        <option value="fire" id="2" class="uppercase">FIRE</option>
                        <option value="water" id="3" class="uppercase">WATER</option>
                        <option value="electric" id="4" class="uppercase">ELECTRIC</option>
                        <option value="grass" id="5" class="uppercase">GRASS</option>
                        <option value="ice" id="6" class="uppercase">ICE</option>
                        <option value="fighting" id="7" class="uppercase">FIGHTING</option>
                        <option value="poison" id="8" class="uppercase">POISON</option>
                        <option value="ground" id="9" class="uppercase">GROUND</option>
                        <option value="flying" id="10" class="uppercase">FLYING</option>
                        <option value="psychic" id="11" class="uppercase">PSYCHIC</option>
                        <option value="bug" id="12" class="uppercase">BUG</option>
                        <option value="rock" id="13" class="uppercase">ROCK</option>
                        <option value="ghost" id="14" class="uppercase">GHOST</option>
                        <option value="dragon" id="15" class="uppercase">DRAGON</option>
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
                    <x-button type="return" class="bg-red-400 hover:bg-red-500 p-2"
                        onclick="window.location='{{ route('trainers.index') }}'">
                        CANCEL
                    </x-button>

                </div>

            </x-section>

        </x-form>

    </x-container>
@endsection
