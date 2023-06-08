@props([
    'method' => 'POST',
])
<x-form method="{{ $method }}" action="{{ $action }}">
    <div>
        <x-button {{ $attributes }}>
            @csrf

            {{ $slot }}
            
        </x-button>
    </div>
</x-form>
