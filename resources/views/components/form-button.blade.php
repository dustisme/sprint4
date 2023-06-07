@props([
    'type' => 'submit'
])
<div>
    <button type="{{$type === 'submit' ? 'submit' : 'reset'}}" {{ $attributes }}>
        @csrf 
        {{ $slot }}
    </button>
</div>
