<!DOCTYPE html>
<html lang="es" x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }" :class="{ 'dark': darkMode }" x-init="$watch('darkMode', value => localStorage.setItem('theme', value ? 'dark' : 'light'))">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IMIFE - Plataforma de Gestión</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs" defer></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        vino: '#56212f',
                        dorado: '#c3b08f',
                        grisclaro: '#d6d1ca'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 text-gray-900 dark:bg-gray-950 dark:text-gray-100 font-sans transition-colors duration-500">

    <!-- Header -->
    <header
        class="w-full px-6 py-4 flex justify-between items-center border-b border-gray-200 dark:border-gray-800 backdrop-blur-md sticky top-0 z-50">
        <h1 class="text-2xl font-bold text-vino dark:text-dorado tracking-wide">IMIFE</h1>

        <nav class="hidden md:flex space-x-6 font-medium">
            <a href="/login" class="hover:text-vino dark:hover:text-dorado transition">Iniciar Sesión</a>
            {{-- <a href="#" class="hover:text-vino dark:hover:text-dorado transition">Servicios</a>
      <a href="#" class="hover:text-vino dark:hover:text-dorado transition">Contacto</a> --}}
        </nav>

        <!-- Botón modo claro/oscuro -->
        <button @click="darkMode = !darkMode"
            class="ml-4 p-2 rounded-lg border border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
            <template x-if="!darkMode">
                <i class="bi bi-moon text-vino"></i>
            </template>
            <template x-if="darkMode">
                <i class="bi bi-sun text-dorado"></i>
            </template>
        </button>
    </header>

    <!-- Hero -->
    <section
        class="px-6 py-24 text-center bg-gradient-to-b from-gray-100 to-gray-50 dark:from-gray-900 dark:to-gray-950 transition">
        <h2 class="text-5xl font-extrabold mb-4 text-vino dark:text-dorado drop-shadow-sm">Bienvenido a IMIFE</h2>
        <p class="max-w-2xl mx-auto text-gray-600 dark:text-gray-400 text-lg">
            Una plataforma moderna que impulsa la eficiencia administrativa y la gestión documental del Instituto
            Mexiquense de la Infraestructura Física Educativa.
        </p>
        <button
            class="mt-8 px-8 py-3 bg-vino text-white dark:bg-dorado dark:text-gray-900 font-semibold rounded-lg hover:scale-105 hover:shadow-xl transition-transform duration-300">
            Comenzar ahora
        </button>
    </section>

    <!-- Features -->
    <section class="px-6 py-20 max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">
        <div
            class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-8 text-center shadow hover:shadow-lg hover:-translate-y-1 transition">
            <div class="text-vino dark:text-dorado text-4xl mb-4">📁</div>
            <h3 class="text-xl font-semibold mb-2">Gestión Documental</h3>
            <p class="text-gray-600 dark:text-gray-400">Organiza y accede a toda tu documentación de manera segura y
                rápida.</p>
        </div>

        <div
            class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-8 text-center shadow hover:shadow-lg hover:-translate-y-1 transition">
            <div class="text-vino dark:text-dorado text-4xl mb-4">🧾</div>
            <h3 class="text-xl font-semibold mb-2">Trámites Eficientes</h3>
            <p class="text-gray-600 dark:text-gray-400">Optimiza tiempos administrativos con módulos inteligentes y
                fáciles de usar.</p>
        </div>

        <div
            class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-8 text-center shadow hover:shadow-lg hover:-translate-y-1 transition">
            <div class="text-vino dark:text-dorado text-4xl mb-4">🔒</div>
            <h3 class="text-xl font-semibold mb-2">Seguridad Avanzada</h3>
            <p class="text-gray-600 dark:text-gray-400">Tus datos se protegen con cifrado y protocolos de seguridad de
                última generación.</p>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-vino dark:bg-dorado py-20 text-center text-white dark:text-gray-900 transition">
        <h2 class="text-3xl font-bold mb-4">¿Listo para comenzar?</h2>
        <p class="mb-8 text-lg max-w-2xl mx-auto">Descubre cómo nuestra plataforma puede transformar la gestión
            administrativa de tu institución.</p>
        <button
            class="bg-white dark:bg-gray-900 text-vino dark:text-dorado font-semibold px-8 py-3 rounded-lg hover:scale-105 hover:shadow-lg transition">
            Contáctanos
        </button>
    </section>

    <!-- Footer -->
    <footer
        class="text-center py-8 text-sm text-gray-500 dark:text-gray-400 border-t border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-950">
        &copy; <span x-text="new Date().getFullYear()"></span> IMIFE - Unidad de Tecnologías de la Información. Todos
        los derechos reservados.
    </footer>

    <!-- Íconos Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</body>

</html>
