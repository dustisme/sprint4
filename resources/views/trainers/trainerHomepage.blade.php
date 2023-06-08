@extends('layouts.base')

@section('content')

    </x-table.table :headers="['NAME', 'CODE', 'POKÉMON', 'ACTIONS']">

        @foraech($trainers as $trainer)
        <tr>
            <x-table.td>{{ $trainer->name }}</x-table.td>
            <x-table.td>{{ $trainer->code }}</x-table.td>
            <x-table.td>{{ $trainer->pokemon_id }}</x-table.td>
            <x-table.td>
                <a href="/trainer/{{ $trainer->id }}">
                    <x-button 
                    class="bg-slate-100 p-2 rounded">SHOW DETAILS</x-button>
                </a>
                <x-form-button class="bg-slate-100 p-2 rounded">
                    DELETE
                </x-form-button>
            </x-table.td>

        </tr>

    </x-section>
@endsection
