@extends('layouts.base')
{{ $title = 'Pokémon League' }}

@section('content')
<x-section>
    <table>
        <thead>
            <tr>
                <th scope="col">NAME</th>
                <th scope="col">POKÉMON</th>
                <th scope="col">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trainers as $trainer)
                <tr>
                    <td>{{ $trainer->name }}</td>
                    <td>{{ $trainer->pokemon->name }}</td>
            @endforeach

            <tr>
                <td><a href="">SHOW DETAILS</a></td>
                <td>
                    <x-form-button method="POST" action="DELETE">
                        DELETE
                    </x-form-button>
                </td>
            </tr>
        </tbody>
    </table>
</x-section>
@endsection
