<x-form method="{{ $method }}" action="{{ $action }}">
    <div>
        <button {{ $attributes }}>

            {{ $slot }}

        <button>
    </div>
</x-form>
