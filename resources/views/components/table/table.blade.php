<x-section>
    <table {{ $attributes->merge([
        'class' => 'w-full table-auto text-right',
    ]) }}>
        <thead>
            <tr>
                @foreach ($headers as $header)
                    <th {{ $attributes->merge([
                        'class' => 'px-4 py-2 ',
                    ]) }}>
                        {{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody {{ $attributes }}>

            {{ $slot }}

        </tbody>
    </table>
</x-section>
