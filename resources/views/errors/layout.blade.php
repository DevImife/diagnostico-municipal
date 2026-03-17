<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Error')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body
    class="flex items-center justify-center min-h-screen bg-white dark:bg-gradient-to-br from-gray-900 via-gray-950 to-gray-900 text-white">
    <div class="text-center p-10 rounded-2xl  backdrop-blur-md ">

        <h1 class="text-7xl font-extrabold text-vinoClaro dark:text-doradoFuerte drop-shadow-md">@yield('expression')</h1>

        {{-- Imagen opcional --}}
        @hasSection('image')
            <div class="flex justify-center">
                {{-- Imagen para modo claro --}}
                <img src="@yield('image')" alt="Error image (light)"
                    class="block dark:hidden w-100 h-64 object-contain">

                {{-- Imagen para modo oscuro --}}
                <img src="@yield('image_dark', asset('storage/errors/403_dark.svg'))" alt="Error image (dark)"
                    class="hidden dark:block w-100 h-64 object-contain">
            </div>
        @endif

        {{-- Código de error --}}

        {{-- Mensaje --}}
        <div class="max-w-md mx-auto px-4">
            <p class="text-2xl mb-6 font-bold text-gris dark:text-cafeclaro leading-relaxed">@yield('message')</p>
        </div>


        {{-- Botón de regreso --}}
        <a href="{{ route('dashboard') }}"
            class="inline-block bg-gris hover:bg-gris/80  text-white dark:bg-doradoFuerte dark:hover:bg-doradoFuerte/80 font-semibold px-6 py-3 rounded-full shadow-md transition-all">
            Volver al inicio
        </a>
    </div>
</body>

</html>
