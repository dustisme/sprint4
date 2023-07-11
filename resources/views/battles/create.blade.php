@extends('layouts.base')

@section('content')
    <x-container>

        <x-form action="/battle" method="POST" class="p-4">

            <x-section>
                <h2 class="text-white font-bold p-3">REGISTER BATTLE</h2>
                <p class="text-red-400 text-xs">&#10033; required</p>
            </x-section>
            {{-- Battle input field --}}
            <x-section>
                <div>
                    <div>
                        <label for="trainer_1_name" class="text-white font-bold">SELECT TRAINER #1 <span
                                class="text-red-400 text-xs">&#10033;</span></label><br>
                        <select name="trainer_1_id" id="trainer_1_name" class="rounded"><br>
                            <option value="">Select one trainer</option>
                            @foreach ($trainers as $trainer)
                                <option value="{{ $trainer->id }}">
                                    {{ $trainer->trainer_name }} with {{ $trainer->pokemon->pokemon_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="text-white font-bold flex justify-center">
                        <p>VS</p>
                    </div><br>
                    <div>
                        <label for="trainer_2_name" class="text-white font-bold">SELECT TRAINER #2 <span
                                class="text-red-400 text-xs">&#10033;</span></label><br>
                        <select name="trainer_2_id" id="trainer_2_name" class="rounded"><br>
                            <option value="">Select one trainer</option>
                            @foreach ($trainers as $trainer)
                                <option value="{{ $trainer->id }}">
                                    {{ $trainer->trainer_name }} with {{ $trainer->pokemon->pokemon_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                </div>

                <div class="flex justify-evenly gap-2">
                    <x-button class="bg-slate-500 p-2 rounded">
                        SUBMIT
                    </x-button>
                    <x-button type="reset" class="bg-slate-500 p-2 rounded">
                        RESET
                    </x-button>
                    <a href="/battle-results"
                        class="bg-red-400 hover:bg-red-500  hover:text-white inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-1 focus:ring-slate-50 focus:ring-offset-1 transition ease-in-out duration-150">
                        CANCEL
                    </a>
                </div>
            </x-section>
        </x-form>

    </x-container>
@endsection
