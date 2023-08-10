<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        @php
            // ---------- Simular recibir un valor de BBDD
            $color = "red";
        @endphp

        <div class="container mx-auto">
            {{-- Llama a un componente simple y pasa un parámetro --}}
            {{-- <x-alert color="red" /> --}}

            {{-- Pasar una variable como parámetro --}}
            <x-alert :color="$color" class="mb-4">
                {{-- slot con nombre, sirve para enviar parámetros largos --}}
                <x-slot:title>
                    Título 1
                </x-slot:title>

                {{-- Al usar tag de apertura y cierre, se invoca a slot, para renderizar contenido extenso --}}
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi blanditiis necessitatibus reiciendis, soluta voluptate adipisci totam minima tempora culpa iure, expedita sit, voluptatum consequatur praesentium maxime illum voluptatem? Veniam, distinctio!
            </x-alert>

            <x-alert2 color="indigo" class="mb-4">
                <x-slot:titulo>
                    Titulo de prueba
                </x-slot:titulo>

                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere doloribus, quisquam eius numquam autem, error accusamus architecto enim libero ab ad soluta facilis suscipit fugiat, culpa ducimus corrupti. Dignissimos, obcaecati!
            </x-alert2>

            <x-alert2>
                <x-slot:titulo>
                    Titulo de prueba 2
                </x-slot:titulo>

                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere doloribus, quisquam eius numquam autem, error accusamus architecto enim libero ab ad soluta facilis suscipit fugiat, culpa ducimus corrupti. Dignissimos, obcaecati!
            </x-alert2>
        </div>
    </body>
</html>
