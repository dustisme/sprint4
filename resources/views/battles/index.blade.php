@extends('layouts.base')

@section('content')
    <x-container class="flex-col">
        {{-- Register button --}}
        <div class="pl-10 pb-10">
            <a href="new-battle">
                <x-button class="text-white bg-slate-600 rounded">NEW BATTLE</x-button>
            </a>
        </div>

        <x-section>
            {{-- battles table --}}
            <x-table.table class="text-white" :headers="['#', 'DATE', 'TRAINER 1', 'TRAINER 2', 'WINNER', '']">

                @foreach ($battles as $battle)
                    <tr>
                        <x-table.td class="text-white font-bold">{{ $battle->id }}</x-table.td>
                        <x-table.td class="text-white font-bold">{{ $battle->battle_date }}</x-table.td>
                        <x-table.td class="text-white font-bold">{{ $battle->trainer1->trainer_name }}</x-table.td>
                        <x-table.td class="text-white font-bold">{{ $battle->trainer2->trainer_name }}</x-table.td>
                        <x-table.td class="text-white font-bold">{{ $battle->winnerTrainer->trainer_name }}</x-table.td>
                        <x-table.td class="text-white font-bold flex gap-x-4 justify-end">
                            <a href="/battle-info/{{ $battle->id }}">
                                <x-button class="bg-slate-600 rounded">SHOW DETAILS</x-button>
                            </a>
                        </x-table.td>
                    </tr>
                @endforeach

            </x-table.table>

        </x-section>
        {{-- more buttons --}}
        <div class="pl-10 pt-10">
            <a href="/new-battle">
                <x-button class="text-white bg-slate-600 rounded">NEW BATTLE</x-button>
            </a>
            <a href="/">
                <x-button class="text-white bg-slate-600 rounded">GO TO HOMEPAGE</x-button>
            </a>
        </div>
    </x-container>
@endsection
