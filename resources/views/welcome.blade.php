<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>

    <body class="antialiased">
        

        <form action="{{ route('procesar') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            {{-- Equivalente con etiquetas blade --}}
            {{-- @csrf --}}

            <div>
                <label for="name">Name</label>
                <br>
                {{-- Si falla la validación no se perderá su valor --}}
                <input type="text" name="name" id="name" value="{{ old('name') }}">
            </div>

            <div>
                <label for="description">Description</label>
                <br>
                {{-- Es el mismo procedimiento, pero en el texarea se aplica dentro de las etiquetas --}}
                <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
            </div>

            <div>
                <p>Frutas favoritas</p>

                <label>
                    <input type="checkbox" name="fruits[]" value="1">
                    Banana
                </label>

                <label>
                    <input type="checkbox" name="fruits[]" value="2">
                    Manzana
                </label>

                <label>
                    <input type="checkbox" name="fruits[]" value="3">
                    Pera
                </label>
            </div>

            <div>
                <p>Active</p>

                <label>
                    <input type="radio" name="active" value="1">
                    Yes
                </label>

                <label>
                    <input type="radio" name="active" value="0">
                    No
                </label>
            </div>

            <div>
                <p>País</p>

                <select name="country" id="country">
                    <option value="1">Venezuela</option>
                    <option value="2">Colombia</option>
                    <option value="3">Chile</option>
                </select>
            </div>

            <br>
            <button type="submit">Enviar</button>
        </form>    
    </body>
</html>
