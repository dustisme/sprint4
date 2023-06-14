@props([
    'type' => 'error',
    'colors' => [
        'error' => 'bg-red-400',
        'success' => 'bg-emerald-400',
    ],
])

<div {{ $attribtues->merge(['class' => "{$colors[$type]}"]) }}>
    @if ($errors->any())
        <div class="flex justify-between">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button>&times;</button>
        </div>
    @endif
</div>
