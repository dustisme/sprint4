<div {{ $attributes->merge([
    'class' => 'container mx-auto my-auto py-12 flex justify-center rounded',
]) }} >

    {{ $slot }}

</div>