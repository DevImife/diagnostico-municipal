<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-dorado leading-tight">
            {{ __('Gráficas') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gradient-to-br dark:from-gray-800  dark:to-negro overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 p-6 bg-gray-100 dark:bg-gray-800">
                    <!-- Tarjeta -->
                    <div
                        class="bg-white dark:bg-gray-950 rounded-2xl shadow-md p-6 border border-transparent dark:border-gray-600">

                        <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">Escuelas Registradas</h2>
                        <p class="text-gray-500 dark:text-dorado text-sm mb-4">Resumen Visual</p>

                        {{-- Contenedor de la gráfica directamente --}}
                        <div id="graficaPrincipal"
                            class="w-full h-96 dark:bg-gray-800 bg-white p-4 rounded-lg shadow-md"></div>
                    </div>


                    <!-- Copia y cambia para más tarjetas -->
                    <div
                        class="bg-white dark:bg-gray-950 rounded-2xl shadow-md p-6 border border-transparent dark:border-gray-600">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">Usuarios Activos</h2>
                        <p class="text-gray-500 dark:text-dorado text-sm mb-4">Últimos 30 días</p>

                        {{-- segunda grafica --}}
                        <div id="graficaPie"
                            class="w-full h-96 dark:bg-gray-800 bg-white p-4 rounded-lg shadow-md my-6"></div>
                    </div>

                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-6 p-6 bg-gray-100 dark:bg-gray-800">
                    <div
                        class="bg-white dark:bg-gray-950 rounded-2xl shadow-md p-6 border border-transparent dark:border-gray-600">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">Escuelas Registradas</h2>
                        <p class="text-gray-500 dark:text-dorado text-sm mb-4">Por municipio</p>
                        {{-- tercer grafica --}}
                        <div id="graficaMunicipios"
                            class="w-full h-96 dark:bg-gray-800 bg-white p-4 rounded-lg shadow-md my-6"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // document.addEventListener('DOMContentLoaded', renderCharts);

            // 🔹 Detecta navegación Livewire
            document.addEventListener('livewire:navigated', () => {
                chartsRendered = false;
                setTimeout(() => {
                    if (document.querySelector("#graficaPrincipal")) {
                        renderCharts();
                    }
                }, 300);
            });

            let chartsRendered = false;

            function renderCharts() {

                if (chartsRendered) return;
                chartsRendered = true;

                const isDarkMode = document.documentElement.classList.contains('dark');

                const colorsLight = ['#56212f', '#977e5b', '#B94665', '#c3b08f', '#34141C'];
                const colorsDark = ['#4ADE80', '#F87171', '#60A5FA', '#FBBF24', '#A78BFA'];
                const baseColors = isDarkMode ? colorsDark : colorsLight;

                // 🔹 Destruye instancias previas
                if (window.chart) window.chart.destroy();
                if (window.pieChart) window.pieChart.destroy();
                if (window.municipiosChart) window.municipiosChart.destroy();

                // grafica de barras
                fetch('/dashboard/grafica-encuestas')
                    .then(response => response.json())
                    .then(data => {

                        window.chart = new ApexCharts(document.querySelector("#graficaPrincipal"), {
                            chart: {
                                type: 'bar',
                                height: 350,
                                toolbar: {
                                    show: false
                                },
                                animations: {
                                    enabled: true,
                                    easing: 'easeinout',
                                    speed: 800
                                }
                            },
                            series: [{
                                name: 'Encuestas',
                                data: data.values // 🔥 valores reales desde la BD
                            }],
                            xaxis: {
                                categories: data.labels, // 🔥 meses reales
                                labels: {
                                    style: {
                                        colors: isDarkMode ? '#fff' : '#333'
                                    }
                                }
                            },
                            yaxis: {
                                labels: {
                                    style: {
                                        colors: isDarkMode ? '#fff' : '#333'
                                    }
                                }
                            },
                            colors: baseColors.slice(0, 3),
                            theme: {
                                mode: isDarkMode ? 'dark' : 'light'
                            }
                        });

                        window.chart.render();
                    });
                // window.chart.render();

                // --- PIE CHART ---
                fetch('/dashboard/usuarios-activos')
                    .then(response => response.json())
                    .then(data => {
                        window.pieChart = new ApexCharts(document.querySelector("#graficaPie"), {
                            chart: {
                                type: 'pie',
                                height: 350
                            },
                            labels: data.labels, // ← nombres de usuarios
                            series: data.values, // ← encuestas realizadas
                            colors: baseColors,
                            legend: {
                                labels: {
                                    colors: isDarkMode ? '#fff' : '#333'
                                }
                            },
                            theme: {
                                mode: isDarkMode ? 'dark' : 'light'
                            }
                        });

                        window.pieChart.render();
                    });

                // --- bar ---
                fetch('/dashboard/cantidad')
                    .then(res => res.json())
                    .then(data => {
                        if (window.municipiosChart) window.municipiosChart.destroy();

                        window.municipiosChart = new ApexCharts(document.querySelector("#graficaMunicipios"), {
                            chart: {
                                type: 'area',
                                height: 350
                            },
                            colors: baseColors,
                            series: [{
                                name: 'Planteles',
                                data: data.values
                            }],
                            xaxis: {
                                categories: data.labels
                            }
                        });

                        window.municipiosChart.render();
                    });
            }
        </script>
    @endpush

</x-app-layout>
