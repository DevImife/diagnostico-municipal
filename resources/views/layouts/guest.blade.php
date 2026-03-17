<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">


    <title>{{ config('app.name', 'Escuelas') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="relative font-sans antialiased text-gray-800 dark:text-white min-h-screen flex flex-col">

    {{-- Imagen alineada a la derecha arriba --}}
    <div
        class="absolute top-4 right-4 sm:right-4 sm:top-4 sm:left-auto left-1/2 transform -translate-x-1/2 sm:transform-none z-10 w-74 sm:w-72 mb-5 mt-5 lg:ml-28 lg:mr-20">
        <!-- Imagen para modo claro -->
        <img src="{{ asset('images/original.png') }}" alt="Logo Claro" class="block dark:hidden w-full h-auto">

        <!-- Imagen para modo oscuro -->
        <img src="{{ asset('images/blanco.png') }}" alt="Logo Oscuro" class="hidden dark:block w-full h-auto">
    </div>

    <!-- SVG Claro -->
    <svg class="absolute inset-0 w-full h-full z-0 dark:hidden" viewBox="0 0 900 600" preserveAspectRatio="none"
        xmlns="http://www.w3.org/2000/svg">
        <defs>
            <linearGradient id="gradClaro" x1="20%" y1="20%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#56212f" />
                <stop offset="100%" stop-color="#a83a4f" />
            </linearGradient>
        </defs>
        <rect x="0" y="0" width="900" height="600" fill="url(#fondoGrad)" />
        {{-- figuras deentro del svg --}}
        {{-- <circle cx="120" cy="80" r="25" fill="#a83a4f" opacity="0.1" />
        <circle cx="400" cy="310" r="60" fill="#a83a4f" opacity="0.1" />
        <rect x="700" y="350" width="90" height="90" fill="#a83a4f" opacity="0.07" transform="rotate(50 720 320)" />
        <rect x="300" y="400" width="40" height="40" fill="#a83a4f" opacity="0.07" transform="rotate(50 720 320)" />
        <circle cx="450" cy="510" r="30" fill="#a83a4f" opacity="0.1" /> --}}

        {{-- fin de figuras svg --}}
        <defs>
            <linearGradient id="fondoGrad" x1="0%" y1="0%" x2="100%" y2="2%">
                <stop offset="0%" stop-color="#ffffff" />
                <stop offset="100%" stop-color="#fff5f8" />
            </linearGradient>
        </defs>
        <g transform="translate(900, 0)">
            <path
                d="M0 459.7C-46.7 390.2 -93.5 320.6 -168 291C-242.5 261.4 -344.9 271.7 -398.1 229.9C-451.4 188 -455.5 94 -459.7 0L0 0Z"
                fill="url(#gradClaro)"></path>
        </g>
        <g transform="translate(0, 600)">
            <path
                d="M0 -459.7C94.6 -455.9 189.2 -452 229.9 -398.1C270.5 -344.2 257.3 -240.2 286.7 -165.5C316 -90.8 387.8 -45.4 459.7 0L0 0Z"
                fill="url(#gradClaro)"></path>
        </g>
    </svg>

    <!-- SVG Oscuro -->
    <svg class="absolute inset-0 w-full h-full z-0 hidden dark:block" viewBox="0 0 900 600" preserveAspectRatio="none"
        xmlns="http://www.w3.org/2000/svg">
        <defs>
            <linearGradient id="gradOscuro" x1="20%" y1="20%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#000000" />
                <stop offset="100%" stop-color="#56212f" />
            </linearGradient>
        </defs>
        <rect x="0" y="0" width="900" height="600" fill="url(#fondoGradOscuro)"></rect>
        {{-- figuras deentro del svg --}}
        <circle cx="120" cy="80" r="25" fill="#000000" opacity="0.1" />
        <circle cx="400" cy="310" r="60" fill="#000000" opacity="0.1" />
        <rect x="700" y="350" width="90" height="90" fill="#56212f" opacity="0.07"
            transform="rotate(50 720 320)" />
        <rect x="300" y="400" width="40" height="40" fill="#000000" opacity="0.07"
            transform="rotate(50 720 320)" />
        <circle cx="450" cy="510" r="30" fill="#56212f" opacity="0.1" />
        {{-- fin de figuras svg --}}
        <defs>
            <linearGradient id="fondoGradOscuro" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#56212f" />
                <stop offset="100%" stop-color="#000000" />
            </linearGradient>
        </defs>
        <g transform="translate(900, 0)">
            <path
                d="M0 459.7C-46.7 390.2 -93.5 320.6 -168 291C-242.5 261.4 -344.9 271.7 -398.1 229.9C-451.4 188 -455.5 94 -459.7 0L0 0Z"
                fill="url(#gradOscuro)"></path>
        </g>
        <g transform="translate(0, 600)">
            <path
                d="M0 -459.7C94.6 -455.9 189.2 -452 229.9 -398.1C270.5 -344.2 257.3 -240.2 286.7 -165.5C316 -90.8 387.8 -45.4 459.7 0L0 0Z"
                fill="url(#gradOscuro)"></path>
        </g>
    </svg>



    <!-- Contenedor principal del login -->
    <div class="relative z-20 flex items-center justify grow px-4 sm:px-6 lg:px-10 mt-10">

        <div
            class="bg-white dark:bg-vino shadow-2xl rounded-xl w-full max-w-md lg:w-[420px] px-6 py-8 transition-all backdrop-blur-md mx-auto lg:ml-28 lg:mr-20">

            {{-- <div class="flex justify-center mb-6 mt-4">
                <x-application-logo class="w-16 h-16 text-indigo-600 dark:text-indigo-400" />
            </div> --}}

            <h2 class="text-center text-2xl font-bold text-red-950 dark:text-gray-200 mb-5">
                Bienvenido de nuevo
            </h2>

            <p class="text-center text-sm text-gray-600 dark:text-gray-400 mb-6">
                Ingresa tus credenciales para continuar
            </p>

            <!-- Aquí va tu contenido original respetado -->
            <div class="mt-4">
                {{ $slot }}
            </div>

            {{-- <div class="mt-6 text-center text-sm text-gray-500 dark:text-gray-400 mb-6">
                ¿No tienes cuenta?
                <a href="{{ route('register') }}"
                    class="text-red-900 hover:text-red-500 dark:text-white dark:hover:text-red-300 font-semibold">
                    Regístrate
                </a>
            </div> --}}
        </div>
    </div>
    <footer class="relative z-30 w-full py-4 px-4 sm:px-6 lg:px-8 text-vino dark:text-gray-300 ">
        <div class="max-w-7xl mx-auto flex justify-center sm:justify-end">
            <p class="text-sm">
                &copy; {{ date('Y') }} IMIFE - Unidad de Tecnologías de la Información.
            </p>

        </div>
    </footer>

</body>

</html>
