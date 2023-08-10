{{-- Al no tener una clase para manejar los parámetros, se usa la directiva @props --}}
@props(['color' => 'red'])

<div {{ $attributes->merge(['class' => "flex w-full flex-col gap-2"]) }}>
    <div class="font-regular relative block w-full rounded-lg bg-{{ $color }}-500 p-4 text-base leading-5 text-white opacity-100">
        <h2 class="mb-4 text-xl font-bold bg-{{ $color }}-600">{{ $titulo }}</h2>

        <p>{{ $slot }}</p>
    </div>
</div>
