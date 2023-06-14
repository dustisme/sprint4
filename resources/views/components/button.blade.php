@props([
    'type' => 'submit',
])
<button type="{{ $type }}"
    {{ $attributes->merge([
        'class' =>
            'inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-slate-700 hover:text-white focus:outline-none focus:ring-1 focus:ring-slate-50 focus:ring-offset-1 transition ease-in-out duration-150',
    ]) }}>

    {{ $slot }}

</button>
