<div role="alert" 
{{ $attributes->merge(['class' => "bg-$color-100 border-t border-b border-$color-500 text-$color-600 px-4 py-3"]) }}>
{{-- Se usa merge para especificar los valores del atributo en el componente sumados los recibidos --}}

    <p class="font-bold">{{ $title }}</p>
    <p class="text-sm">{{ $slot }}</p>

    {{-- $attributes es un array indexado --}}
    {{-- @dump($attributes) --}}

    {{-- Si se pasan atributos html al componente y no se reciben en el constructor se almacenan en la variable attributes --}}
    {{-- {{ $attributes }} --}}
</div>
