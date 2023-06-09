@extends('layouts.base')

@section('content')

    <x-container class="flex-col p-10">
        <x-section class="flex p-5">
            <div class="text-white px-10 py-5">
                <h1 class="pb-7">TRAINER'S DETAILS</h1>
                <h2>NAME: {{ $trainer->name }}</h2>
                <h2>CODE: {{ $trainer->code }}</h2>
            </div>

            <div class="text-white px-10 py-5">
                <h2>POKÉMON:</h2>
                <h3>LEVEL:</h3>
                <h3>TYPE:</h3>
            </div>

            <div class="text-white px-10 py-5">
                <h2>BATTLES</h2>
                <h3>WON:</h3>
                <h3>LOST:</h3>
            </div>
        </x-section>

        <div class="pl-10 pt-10">
            <a href="/edit-info/{{ $trainer->id }}">
                <x-button class="bg-slate-500 p-2 rounded">EDIT</x-button>
            </a>
            <a href="/trainers">
                <x-button class="bg-red-400 hover:bg-red-500 p-2 rounded">
                    RETURN
                </x-button>
            </a>
        </div>

    </x-container>
