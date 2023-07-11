@php
    $files = File::files(public_path('images'));
    $startIndex = 50;
    $limit = 15;
    $count = 0;
@endphp

<footer class="flex justify-start">
    @foreach ($files as $index => $image)
        @if ($index >= $startIndex && $count < $limit)
            <img class="" src="{{ asset('images/' . $image->getFileName()) }}" alt="Footer Image">
            @php $count++; @endphp
        @endif
    @endforeach
</footer>
