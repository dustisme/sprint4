<x-section>
    <table>
        <thead>
            <tr>
                @foraech($headers as $header)
                <th>{{ $header }}</th>
            </tr>
        </thead>
        <tbody>

            {{ $slot }}

        </tbody>
    </table>