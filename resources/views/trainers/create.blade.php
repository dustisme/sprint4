@extends('layouts.base')

@section('content')
    <x-container>

        <x-form action="/trainers" class="p-4 rounded">

            <x-section name="banner">
                <h2 class="text-white font-bold">REGISTER POKÉMON TRAINER</h2>
            </x-section>
            <x-section>

                <div name="item" class="">
                    <label for="name" class="text-white font-bold">TRAINER'S NAME <span
                            class="text-red-400">*</span></label><br>
                    <input id="name" name="name" type="text" class="rounded" required><br>
                </div>
                <br>

                <div name="item" class="">
                    <label for="code" class="text-white font-bold">TRAINER'S CODE <span
                            class="text-red-400">*</span></label><br>
                    <input id="code" name="code" type="text" class="rounded" required><br>
                </div>
                <br>

                <div name="item" class="">
                    <label for="pokemonName" class="text-white font-bold">POKÉMON NAME <span
                            class="text-red-400">*</span></label><br>
                    <input id="pokemonName" name="pokemonName" type="text" class="rounded" required><br>
                </div>
                <br>

                <div name="item" class="">
                    <label for="pokemonLevel" class="text-white font-bold"> POKÉMON LEVEL<span
                            class="text-red-400">*</span></label><br>
                    <input id="pokemonLevel" name="pokemonLevel" type="number" class="rounded" min="1"
                        max="100" required><br>
                </div>
                <br>

                <div name="item" class="">
                    <label for="pokemonType" class="text-white font-bold">POKÉMON TYPE <span class="text-red-400">* Select
                            One</span></label><br>
                    <select name="pokemonType" id="pokemonType" class="rounded" required><br>
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
                    <x-form-button class="bg-slate-50 p-2 rounded">
                        SUBMIT
                    </x-form-button>
                    <x-form-button type="reset" class="bg-slate-50 p-2 rounded">
                        CANCEL
                    </x-form-button>
                </div>


            </x-section>

        </x-form>

    </x-container>
@endsection
