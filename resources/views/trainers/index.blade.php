@extends('layouts.base')

@section('content')
    <x-container class="flex-col">
        <div class="pl-10 pb-10">
            <a href="/new-trainer">
                <x-button class="text-white bg-slate-600 rounded">REGISTER TRAINER</x-button>
            </a>
        </div>
        <x-section>
            <x-table.table class="text-white" :headers="['NAME', 'CODE', 'POKÉMON', 'ACTIONS']">

                @foreach ($trainers as $trainer)
                    <tr>
                        <x-table.td class="text-white font-bold">{{ $trainer->trainer_name }}</x-table.td>
                        <x-table.td class="text-white font-bold">{{ $trainer->trainer_code }}</x-table.td>
                        <x-table.td class="text-white font-bold">{{ $trainer->pokemon->pokemon_name }}</x-table.td>
                        <x-table.td class="text-white font-bold flex gap-x-4 justify-end">
                            <a href="/trainer-info/{{ $trainer->id }}">
                                <x-button class="bg-slate-600 rounded">SHOW DETAILS</x-button>
                            </a>
                            <x-form action="/trainers/{{ $trainer->id }}">
                                @method('DELETE')
                                <x-button class="bg-red-400 rounded hover:bg-red-500">DELETE</x-button>
                            </x-form>

                        </x-table.td>

                    </tr>
                @endforeach
            </x-table.table>
        </x-section>
        <div class="pl-10 pt-10">
            <a href="/new-trainer">
                <x-button class="text-white bg-slate-600 rounded">REGISTER TRAINER</x-button>
            </a>
            <a href="/">
                <x-button class="text-white bg-slate-600 rounded">GO TO HOMEPAGE</x-button>
            </a>
        </div>
    </x-container>
@endsection
