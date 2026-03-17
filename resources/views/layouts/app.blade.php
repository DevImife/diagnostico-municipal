<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Encuesta') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Notyf -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf/notyf.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- ApexCharts CDN -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- select2 --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}

    {{-- tom select --}}
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/css/tom-select.css" rel="stylesheet">
    {{-- maps --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="/js/encuesta.js"></script>
    <style>
        #map {
            height: 400px;
            width: 100%;
            border-radius: 12px;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-950">
        <livewire:layout.navigation />

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-950 shadow">
                <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    {{-- asdsa --}}

    {{-- script para select2 --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

    {{-- tom select --}}
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/js/tom-select.complete.min.js"></script>

    {{-- script para alertas --}}

    {{-- alertas en notyf --}}
    <script>
        window.notyf = new Notyf({
            duration: 3000,
            position: {
                x: 'right',
                y: 'top'
            },
            types: [{
                    type: 'error',
                    background: '#9f2241',
                    icon: false
                },
                {
                    type: 'success',
                    background: '#007a1f',
                    icon: false
                }
            ]
        });

        @if (session('success'))
            notyf.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            notyf.error("{{ session('error') }}");
        @endif
    </script>

    <script>
        function confirmDelete(tipo, id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#56212f',
                cancelButtonColor: '#c3b08f',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`form-delete-${tipo}-${id}`).submit();
                }
            });
        }
    </script>



    <!-- Luego los scripts de cada vista -->
    @stack('scripts')

    {{-- @yield('scripts') --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

</body>

<footer class="bg-gray-200 text-vino px-6 py-10 dark:bg-gray-950 dark:text-white">
    {{-- <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">

        <div>
            <h5 class="text-lg font-semibold mb-3">Empresa</h5>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:underline">Sobre nosotros</a></li>
                <li><a href="#" class="hover:underline">Blog</a></li>
                <li><a href="#" class="hover:underline">Contacto</a></li>
            </ul>
        </div>

        <div>
            <h5 class="text-lg font-semibold mb-3">Soporte</h5>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:underline">Preguntas frecuentes</a></li>
                <li><a href="#" class="hover:underline">Ayuda</a></li>
            </ul>
        </div>

        <div>
            <h5 class="text-lg font-semibold mb-3">Redes</h5>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:underline">Facebook</a></li>
                <li><a href="#" class="hover:underline">Twitter</a></li>
                <li><a href="#" class="hover:underline">Instagram</a></li>
            </ul>
        </div>

        <div>
            <h5 class="text-lg font-semibold mb-3">Contacto</h5>
            <p class="text-sm">info@miempresa.com</p>
            <p class="text-sm">+52 123 456 7890</p>
        </div>

    </div> --}}

    <div class=" text-center text-sm">
        &copy; 2025 IMIFE-Unidad de Tecnologías de la Información. Todos los derechos reservados.
    </div>
</footer>


</html>
