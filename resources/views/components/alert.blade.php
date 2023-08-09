{{-- Todo componente debe estar dentro de una etiqueta div --}}
<div>
    <p>Esto es una alerta</p>

    {{-- Esto indica que el componente recibe contenido dinámicamente --}}
    {{ $slot }}
</div>