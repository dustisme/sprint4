<header class="flex justify-start">
    @php $limit = 15; $count = 0; @endphp
    @foreach (File::files(public_path('images')) as $image)
        @if ($count >= $limit)
            @break
        @endif
        <img class="" src="{{ asset('images/' . $image->getFileName()) }} " alt="Header Image">
        @php $count++; @endphp
    @endforeach
</header>
