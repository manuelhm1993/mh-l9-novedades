{{-- Cargar contenido dinámicamente a distintas secciones --}}
<article>
    <header>
        {{-- Usar slots nombrados --}}
        {{ $title }}
    </header>

    <p>Esto es una alerta</p>

    {{-- Esto indica que el componente recibe contenido dinámicamente --}}
    {{ $slot }}
</article>