<x-app-layout>


    <div x-data="buscador()" @click.away="mostrarResultados = false">
        <div
            class="flex flex-col sm:flex-row sm:items-center sm:justify-between bg-white divide-solid h-[5rem] dark:bg-gray-950">
            <div class="relative w-full sm:w-1/3 text-left">
                <h2 class="font-bold text-xl text-gray-800 dark:text-dorado leading-tight text-center sm:text-center">
                    {{ __('Panel de Control') }}
                </h2>
            </div>
            <div class="relative w-full sm:w-2/3 mt-4 px-6">
                <span class="absolute inset-y-0 left-9 flex items-center text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-4.35-4.35M10 18a8 8 0 1 1 8-8 8.009 8.009 0 0 1-8 8z" />
                    </svg>
                </span>
                <input type="text" x-model.debounce.500ms="busqueda" placeholder="Buscar registro del plantel"
                    class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700
                      bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-200 placeholder-gray-400
                      focus:ring-2 focus:ring-vinoClaro focus:border-transparent transition"
                    x-model.debounce.500ms="busqueda" @focus="mostrarResultados = true; bloquearBusqueda = false;" />

                <!-- Dropdown resultados -->
                <div x-show="mostrarResultados && resultados.length > 0"
                    class="absolute z-10 bg-white dark:bg-gray-800 border rounded-lg shadow-md mt-1 w-full">
                    <template x-for="item in resultados" :key="item.id">
                        <div @click="seleccionarPlantel(item)"
                            class="px-4 py-2 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 text-sm">
                            <span x-text="item.nombre_completo" class="text-gray-800 dark:text-gray-200"></span>
                        </div>
                    </template>
                </div>
                <!-- 💾 ID oculto (para usar en formularios) -->
                <input type="hidden" x-model="plantel_id" name="plantel_id" />
            </div>

        </div>

        <div x-show="mostrarListado" x-transition class="mt-8 px-4 sm:px-6 lg:px-8">

            <!-- 🔷 Header Card -->
            <div
                class="bg-white dark:bg-gray-950 rounded-2xl shadow-md p-6 border border-gray-200 dark:border-gray-700 transition duration-300">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                    <!-- 🟣 IZQUIERDA: Filtro y botón -->
                    <div class="flex flex-col sm:flex-row sm:items-end gap-4 w-full lg:w-auto">

                        <form action="{{ route('encuestas.exportar.municipio') }}" method="GET"
                            class="flex gap-3 items-end">

                            <div class="flex flex-col w-full sm:w-64">
                                <label class="text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">
                                    Municipio
                                </label>

                                <select name="id_municipio"
                                    class="rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-vino focus:border-vino text-sm">

                                    <option value="">Seleccionar</option>

                                    @foreach ($municipios as $municipio)
                                        <option value="{{ $municipio->id }}">
                                            {{ $municipio->nombre_municipio }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="px-6 py-2 rounded-xl bg-vino text-white shadow-md">
                                Descargar Excel
                            </button>

                        </form>
                    </div>

                    <!-- 🟡 DERECHA: Total Escuelas -->
                    <div class="flex items-center justify-between lg:justify-end gap-4 w-full lg:w-auto">

                        <div class="text-right">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Escuelas Registradas
                            </p>
                            <h1 class="text-4xl font-bold text-vino dark:text-dorado">
                                {{ $planteles->total() }}
                            </h1>
                        </div>

                        <div
                            class="bg-vino text-white rounded-full p-3 w-12 h-12 flex items-center justify-center shadow-md">
                            <!-- Icono -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l6.16-3.422A12.083 12.083 0 0112 20.055a12.083 12.083 0 01-6.16-9.477L12 14z" />
                            </svg>
                        </div>

                    </div>

                </div>
                <div
                    class="mt-6 overflow-x-auto bg-white dark:bg-gray-900 shadow-md rounded-2xl border border-gray-200 dark:border-gray-700">

                    <table class="min-w-full text-sm text-left">
                        <thead class="bg-vino text-white uppercase text-xs text-center">
                            <tr>
                                <th class="px-6 py-3">Plantel</th>
                                <th class="px-6 py-3">CCT/Nivel/Turno</th>
                                <th class="px-6 py-3">Municipio</th>
                                <th class="px-6 py-3">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700 text-center dark:text-gray-200">
                            @foreach ($planteles as $survey)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                                    <td class="px-6 py-3 text-left">
                                        {{ $survey->plantel->nombre_plantel ?? 'N/A' }}
                                    </td>

                                    <td class="px-6 py-3">
                                        @foreach ($survey->plantel->ccts as $cct)
                                            <div class="mb-1">
                                                <span class="font-semibold">{{ $cct->clave_cct }}</span>
                                                <span class="text-xs text-gray-500">
                                                    ({{ $cct->nivel->nombre_nivel ?? '-' }} -
                                                    {{ $cct->turno->nombre_turno ?? '-' }})
                                                </span>
                                            </div>
                                        @endforeach
                                    </td>


                                    <td class="px-6 py-3">
                                        {{ $survey->plantel->codigo_postal->municipio->nombre_municipio ?? 'N/A' }}
                                    </td>

                                    <td class="px-6 py-3">
                                        {{-- <pre>{{ $survey->plantel_id }}</pre> --}}
                                        <button type="button" @click="cargarDatosPlantel({{ $survey->plantel_id }})"
                                            class="text-vino hover:underline text-sm font-medium">
                                            Ver más
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- 🔷 Paginación -->
                <div class="mt-6 flex justify-center">
                    {{ $planteles->links() }}
                </div>
            </div>

            <!-- 🔷 Tabla -->


        </div>



        <div class="py-6 px-4 sm:px-6 lg:px-8" x-show="datosPlantel && datosPlantel.plantel" x-cloak x-transition>

            <div class="max-w-7xl mx-auto space-y-3">
                <!-- Encabezado -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                    <!-- IZQUIERDA -->
                    <div class="text-center sm:text-left">
                        <h1 class="text-vinoClaro text-3xl sm:text-4xl lg:text-5xl font-bold mb-2"
                            x-text="datosPlantel.plantel?.nombre_plantel ?? 'Cargando...'">
                        </h1>

                        <p class="text-base text-gray-500 dark:text-gray-400">
                            Registro de encuesta:
                            <span x-text="formatearFecha(datosPlantel?.created_at)"></span>
                        </p>
                    </div>

                    <!-- DERECHA -->
                    <div class="flex justify-center sm:justify-end">
                        <button type="button" @click="resetVista()"
                            class="text-white bg-gradient-to-r from-red-900 via-vino to-vino 
                   hover:bg-gradient-to-br focus:ring-4 focus:outline-none 
                   focus:ring-red-300 dark:focus:ring-red-800 
                   font-medium text-sm px-6 py-2.5 rounded-xl shadow-md 
                   w-full sm:w-auto">
                            Regresar
                        </button>
                    </div>

                </div>


                <!-- Tarjetas estadísticas -->
                <div
                    class="bg-white dark:bg-gradient-to-br dark:from-gray-800 dark:to-negro overflow-hidden sm:rounded-xl">
                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 p-1 bg-gray-100 dark:bg-gray-800">

                        <!-- 🏫 CCTs Registradas -->
                        <div
                            class="bg-white dark:bg-gray-950 rounded-2xl shadow-md p-6 border border-transparent dark:border-gray-700 hover:shadow-lg hover:-translate-y-1 transition duration-300 flex flex-col sm:flex-row sm:items-center justify-between">
                            <div class="flex items-center space-x-4 mb-4 sm:mb-0">
                                <div
                                    class="bg-vino text-white rounded-full p-3 flex items-center justify-center w-12 h-12 shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path d="M4 4h16v4H4z" />
                                        <path d="M4 8h16v12H4z" />
                                    </svg>
                                </div>
                                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">CCT’s Registradas</h2>
                            </div>
                            <h1 class="text-5xl font-bold text-vino dark:text-dorado text-center sm:text-right"
                                x-text="datosPlantel?.matricula?.length"></h1>
                        </div>

                        <!-- 📄 Datos del Alumnos -->
                        <div
                            class="bg-white dark:bg-gray-950 rounded-2xl shadow-md p-6 border border-transparent dark:border-gray-700 hover:shadow-lg hover:-translate-y-1 transition duration-300 flex flex-col sm:flex-row sm:items-center justify-between">
                            <div class="flex items-center space-x-4 mb-4 sm:mb-0">
                                <div
                                    class="bg-cafe text-white rounded-full p-3 flex items-center justify-center w-12 h-12 shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-smile-icon lucide-smile">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="M8 14s1.5 2 4 2 4-2 4-2" />
                                        <line x1="9" x2="9.01" y1="9" y2="9" />
                                        <line x1="15" x2="15.01" y1="9" y2="9" />
                                    </svg>
                                </div>
                                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Total de Alumnos</h2>
                            </div>

                            <h1 class="text-5xl font-bold text-cafe dark:text-dorado text-center sm:text-right"
                                x-text="totalAlumnos"></h1>


                        </div>

                        <!-- 👩‍🏫 Personal registrado -->
                        <div
                            class="bg-white dark:bg-gray-950 rounded-2xl shadow-md p-6 border border-transparent dark:border-gray-700 hover:shadow-lg hover:-translate-y-1 transition duration-300 flex flex-col sm:flex-row sm:items-center justify-between">
                            <div class="flex items-center space-x-4 mb-4 sm:mb-0">
                                <div
                                    class="bg-vinoClaro text-white rounded-full p-3 flex items-center justify-center w-12 h-12 shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path
                                            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-3.31 0-6 1.79-6 4v2h12v-2c0-2.21-2.69-4-6-4z" />
                                    </svg>
                                </div>
                                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Personal registrado
                                </h2>
                            </div>
                            <h1 class="text-5xl font-bold text-vinoClaro dark:text-dorado text-center sm:text-right"
                                x-text="totalPersonal">
                            </h1>
                        </div>

                        <!-- 📊 Encuestas completadas -->
                        <div @click="descargarDocumentoPropiedad()"
                            class="bg-white dark:bg-gray-950 rounded-2xl shadow-md p-6 border border-transparent dark:border-gray-700 hover:shadow-lg hover:-translate-y-1 transition duration-300 flex flex-col sm:flex-row sm:items-center justify-between">
                            <div class="flex items-center space-x-4 mb-4 sm:mb-0">
                                <div
                                    class="bg-caramelo text-white rounded-full p-3 flex items-center justify-center w-12 h-12 shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-file-text-icon lucide-file-text">
                                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                                        <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                                        <path d="M10 9H8" />
                                        <path d="M16 13H8" />
                                        <path d="M16 17H8" />
                                    </svg>
                                </div>
                                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Documento de Propiedad
                                </h2>
                            </div>
                            <h1 class="text-5xl font-bold text-caramelo dark:text-dorado text-center sm:text-right">1
                            </h1>
                        </div>
                    </div>

                    <!-- 🌍 Mapa -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 p-2 bg-gray-100 dark:bg-gray-800 items-start">
                        <!-- Columna Izquierda: Mapa -->
                        <div
                            class="bg-white dark:bg-gray-900 rounded-2xl shadow-lg p-4 border border-gray-200 dark:border-gray-700">
                            <h2 class="text-xl font-semibold text-vino dark:text-white mb-4 text-center">
                                Mapa de Referencia - Plantel
                            </h2>
                            <div id="map"
                                class="rounded-xl shadow-md w-full h-[300px] sm:h-[400px] md:h-[450px]"
                                style="z-index: 1 !important;">
                            </div>
                        </div>

                        <!-- Columna Derecha: Datos del Plantel -->
                        <div
                            class="bg-white dark:bg-gray-900 rounded-2xl shadow-lg p-4 border border-gray-200 dark:border-gray-700">
                            <!-- Datos del plantel -->
                            <h2 class="text-xl font-semibold text-vino dark:text-white mb-4 text-center">
                                Datos del Plantel
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Primera tarjeta -->
                                <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-3">
                                    <div
                                        class="flex justify-between border-b border-gray-200 dark:border-gray-700 pb-1">
                                        <span class="font-semibold text-vinoClaro">Municipio:</span>
                                        <span class="dark:text-white"
                                            x-text="datosPlantel.plantel?.codigo_postal?.municipio?.nombre_municipio ?? '—'"></span>
                                    </div>
                                    <div
                                        class="flex justify-between border-b border-gray-200 dark:border-gray-700 pb-1">
                                        <span class="font-semibold text-vinoClaro">Domicilio:</span>
                                        <span class="text-xs dark:text-white"
                                            x-text="datosPlantel.plantel?.codigo_postal?.localidad ?? '—'"></span>
                                    </div>
                                    <div
                                        class="flex justify-between border-b border-gray-200 dark:border-gray-700 pb-1">
                                        <span class="font-semibold text-vinoClaro">Código Postal:</span>
                                        <span class="dark:text-white"
                                            x-text="datosPlantel.plantel?.codigo_postal?.codigo_postal ?? '—'"></span>
                                    </div>
                                </div>

                                <!-- Segunda tarjeta -->
                                <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-3">
                                    <div
                                        class="flex justify-between border-b border-gray-200 dark:border-gray-700 pb-1">
                                        <span class="font-semibold text-vinoClaro">Teléfono:</span>
                                        <span class="dark:text-white"
                                            x-text="datosPlantel.plantel?.telefono ?? '—'"></span>
                                    </div>
                                    <div
                                        class="flex justify-between border-b border-gray-200 dark:border-gray-700 pb-1">
                                        <span class="font-semibold text-vinoClaro">Edad:</span>
                                        <span class="dark:text-white"
                                            x-text="datosPlantel.plantel?.edad_plantel ?? '—'"></span>
                                    </div>
                                    <div class="flex justify-end pt-2">
                                        <button
                                            @click="mostrarCarrusel(datosPlantel.fotografias, datosPlantel.plantel?.plantel_id)"
                                            class="px-4 py-1.5 text-sm font-semibold text-white bg-vinoClaro rounded-lg shadow hover:bg-vinoOscuro transition-colors duration-300">
                                            Ver Fotografía
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Resumen de matrícula -->
                            <h2 class="text-xl font-semibold text-vino dark:text-white mt-2 text-center">
                                Resumen de Matrícula
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-0"
                                x-show="Array.isArray(datosPlantel.matricula) && datosPlantel.matricula.length > 0">

                                <template x-for="(m, index) in datosPlantel.matricula" :key="m.cct_id">
                                    <div class="max-w-full mx-auto p-3">
                                        <div
                                            class="bg-white dark:bg-gray-800 border border-gray-200 rounded-2xl hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                                            <div class="flex flex-col sm:flex-row items-start gap-2 p-2">

                                                <!-- Ícono -->
                                                <div
                                                    class="flex-shrink-0 bg-vinoClaro/10 p-3 rounded-xl text-vinoClaro mx-auto sm:mx-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path
                                                            d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z" />
                                                        <path d="M22 10v6" />
                                                        <path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5" />
                                                    </svg>
                                                </div>

                                                <!-- Datos -->
                                                <div class="flex-1 text-center sm:text-left">
                                                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100"
                                                        x-text="'CCT: ' + (m.cct?.clave_cct ?? 'N/A')"></h3>

                                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                                        <span class="font-medium">Director:</span>
                                                        <span
                                                            x-text="(m.nombre_director ?? '') + ' ' + (m.apellidos_director ?? '')"></span>
                                                    </p>
                                                    <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">
                                                        <span class="font-medium">Nivel:</span>
                                                        <span
                                                            x-text="m.cct?.nivel?.nombre_nivel ?? 'Sin nivel'"></span>
                                                    </p>
                                                    <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">
                                                        <span class="font-medium">Turno:</span>
                                                        <span
                                                            x-text="m.cct?.turno?.nombre_turno ?? 'Sin turno'"></span>
                                                    </p>


                                                </div>
                                            </div>
                                            <div class="gap-2 p-2">
                                                <div
                                                    class="mt-2 border-t border-gray-100 dark:border-gray-700 pt-3 grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                                                    <p class="text-gray-700 dark:text-gray-300">
                                                        👦 <span class="font-semibold text-vinoClaro">Alumnos:</span>
                                                        <span x-text="m.alumnos ?? 0"></span>
                                                    </p>
                                                    <p class="text-gray-700 dark:text-gray-300">
                                                        👧 <span class="font-semibold text-vinoClaro">Alumnas:</span>
                                                        <span x-text="m.alumnas ?? 0"></span>
                                                    </p>
                                                    <p class="col-span-2 text-gray-700 dark:text-gray-300">
                                                        ♿ <span class="font-semibold text-vinoClaro">Con
                                                            Discapacidad:</span>
                                                        <span x-text="m.personas_discapacidad ?? 0"></span>
                                                    </p>
                                                </div>

                                                <div class="mt-2 flex justify-center sm:justify-end">
                                                    {{-- <button
                                                        @click="window.dispatchEvent(new CustomEvent('open-modal', { detail: 'detalle-plantel' })); selectedMatricula = m"
                                                        class="px-4 py-1.5 text-sm font-semibold text-white bg-vinoClaro rounded-lg shadow hover:bg-vinoOscuro transition-colors duration-300">
                                                        Ver detalles
                                                    </button> --}}
                                                    <button
                                                        @click="selectedMatricula = m; window.dispatchEvent(new CustomEvent('open-modal', { detail: 'detalle-plantel' }))"
                                                        class="px-4 py-1.5 text-sm font-semibold text-white bg-vinoClaro rounded-lg shadow hover:bg-vinoOscuro transition-colors duration-300">
                                                        Ver detalles
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>

                        </div>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 p-2 bg-gray-100 dark:bg-gray-800 items-start"
                        x-show="datosPlantel?.edifTipoEstructura">

                        <template x-for="(edificio, clave) in datosPlantel.edifTipoEstructura" :key="clave">
                            <div
                                class="bg-white dark:bg-gray-900 rounded-2xl shadow-lg p-6 border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all duration-300">

                                <!-- Encabezado -->
                                <div class="flex items-center justify-between mb-4">
                                    <h2 class="text-xl font-bold text-vino dark:text-dorado">
                                        Edificio <span x-text="clave"></span>
                                    </h2>
                                    <span
                                        class="px-3 py-1 text-xs rounded-full font-semibold bg-vino/10 text-vino dark:bg-dorado/10 dark:text-dorado">
                                        <span x-text="edificio.estructura"></span>
                                    </span>
                                </div>

                                <!-- Datos principales -->
                                <div class="grid grid-cols-2 gap-2 text-sm text-gray-700 dark:text-gray-300 mb-4">
                                    <p><strong>Edad:</strong> <span x-text="edificio.edad + ' años'"></span>
                                    </p>
                                    <p><strong>Niveles:</strong> <span x-text="edificio.niveles"></span></p>
                                    <p><strong>Muros:</strong> <span x-text="edificio.muros"></span></p>
                                    <p><strong>Pisos:</strong> <span x-text="edificio.pisos"></span></p>
                                    <p><strong>Azotea:</strong> <span x-text="edificio.azotea"></span></p>
                                    <p><strong>Ejes:</strong> <span x-text="edificio.ejes"></span></p>
                                    <p><strong>Total espacios:</strong> <span x-text="edificio.total_espacios"></span>
                                    </p>
                                </div>

                                <!-- Daños estructurales -->
                                <div class="mb-4">
                                    <h3 class="font-semibold text-gray-800 dark:text-white mb-2">Daños
                                        estructurales</h3>
                                    <template x-if="edificio.danio_estructural?.length">
                                        <div class="flex flex-wrap gap-2">
                                            <template x-for="d in edificio.danio_estructural">
                                                <span
                                                    class="px-2 py-1 text-xs rounded-md bg-red-100 text-red-700 dark:bg-red-800/40 dark:text-red-300"
                                                    x-text="d"></span>
                                            </template>
                                        </div>
                                    </template>
                                    <template x-if="!edificio.danio_estructural?.length">
                                        <p class="text-sm text-gray-500">Sin daños reportados.</p>
                                    </template>
                                </div>

                                <!-- Imágenes -->
                                <div class="mt-4 border-t border-gray-200 dark:border-gray-700 pt-4">
                                    <h3 class="font-semibold text-gray-800 dark:text-white mb-2">Galería</h3>
                                    <div class="flex gap-2 overflow-x-auto">
                                        <template x-for="img in edificio.imagenes" :key="img">
                                            <img :src="`/storage/planteles/${datosPlantel.plantel_id}/edificios/${img}`"
                                                class="h-24 w-24 object-cover rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm hover:scale-105 transition-transform duration-200"
                                                alt="Foto del edificio" />
                                        </template>
                                    </div>
                                </div>

                                <!-- Condiciones del edificio -->
                                <div class="mt-6 border-t border-gray-200 dark:border-gray-700 pt-4">
                                    <h3 class="font-semibold text-gray-800 dark:text-white mb-2">Condiciones
                                    </h3>
                                    <template x-if="datosPlantel.edifCondiciones?.[clave]">
                                        <div class="grid grid-cols-2 gap-2 text-sm">
                                            <template x-for="(valor, item) in datosPlantel.edifCondiciones[clave]">
                                                <p>
                                                    <span class="font-medium text-gray-600 dark:text-gray-400"
                                                        x-text="item + ':'"></span>
                                                    <span class="ml-1"
                                                        :class="{
                                                            'text-green-600 dark:text-green-400': valor === 'BUENO',
                                                            'text-yellow-500 dark:text-yellow-400': valor === 'REGULAR',
                                                            'text-red-600 dark:text-red-400': valor === 'MALO',
                                                            'text-gray-500': valor === 'NO APLICA'
                                                        }"
                                                        x-text="valor"></span>
                                                </p>
                                            </template>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </template>
                    </div>


                    <!-- 🧻 Servicios Sanitarios -->
                    <div class="grid grid-cols-1 lg:grid-cols-1 gap-6 p-2 bg-gray-100 dark:bg-gray-800 items-start"
                        x-show="datosPlantel?.servSanitarioCantidad" x-cloak x-transition>

                        <div
                            class="bg-white dark:bg-gray-900 rounded-2xl shadow-lg p-6 border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all duration-300">

                            <h2
                                class="text-2xl font-bold text-center text-vinoOscuro dark:text-vinoClaro mb-6 flex items-center justify-center gap-2">
                                🧻 Servicios Sanitarios del Plantel
                            </h2>

                            <!-- 🔹 Leyenda de colores -->
                            <div class="flex justify-center gap-4 text-sm mb-4">
                                <span class="flex items-center gap-1">
                                    <span class="w-3 h-3 bg-green-500 rounded-full"></span> Bueno
                                </span>
                                <span class="flex items-center gap-1">
                                    <span class="w-3 h-3 bg-yellow-500 rounded-full"></span> Regular
                                </span>
                                <span class="flex items-center gap-1">
                                    <span class="w-3 h-3 bg-red-500 rounded-full"></span> Malo
                                </span>
                            </div>
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 p-2">
                                <template x-for="(datos, grupo) in datosPlantel.servSanitarioCantidad"
                                    :key="grupo">
                                    <div
                                        class="bg-white dark:bg-gray-900 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 p-4">
                                        <h3 class="text-lg font-semibold text-vinoOscuro dark:text-vinoClaro capitalize mb-3"
                                            x-text="grupo"></h3>

                                        <div
                                            class="overflow-x-auto rounded-lg shadow-md border border-gray-200 dark:border-gray-700">
                                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                <thead class="bg-vinoClaro dark:bg-vinoOscuro text-white">
                                                    <tr>
                                                        <th
                                                            class="px-3 py-2 text-left text-sm font-semibold uppercase tracking-wider">
                                                            Tipo</th>
                                                        <th
                                                            class="px-3 py-2 text-left text-sm font-semibold uppercase tracking-wider">
                                                            Cantidad</th>
                                                        <th
                                                            class="px-3 py-2 text-left text-sm font-semibold uppercase tracking-wider">
                                                            Estado</th>
                                                    </tr>
                                                </thead>

                                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                                    <template x-for="(valor, tipo) in datos" :key="tipo">
                                                        <tr
                                                            class="border-t border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800/60 transition-colors duration-200">

                                                            <!-- Tipo -->
                                                            <td class="px-3 py-2 font-medium text-gray-800 dark:text-gray-200"
                                                                x-text="tipo"></td>

                                                            <!-- Cantidad -->
                                                            <td class="px-3 py-2 text-gray-700 dark:text-gray-300"
                                                                x-text="valor"></td>

                                                            <!-- Estado -->
                                                            <td class="px-3 py-2">
                                                                <template
                                                                    x-if="datosPlantel.servSanitarioEstado[grupo] && datosPlantel.servSanitarioEstado[grupo][tipo.toLowerCase()]">
                                                                    <span
                                                                        class="px-3 py-1 rounded-full text-xs font-semibold whitespace-nowrap"
                                                                        :class="{
                                                                            'bg-green-100 text-green-700 dark:bg-green-800 dark:text-green-300': datosPlantel
                                                                                .servSanitarioEstado[grupo][tipo
                                                                                    .toLowerCase()
                                                                                ] === 'bueno',
                                                                            'bg-yellow-100 text-yellow-700 dark:bg-yellow-800 dark:text-yellow-300': datosPlantel
                                                                                .servSanitarioEstado[grupo][tipo
                                                                                    .toLowerCase()
                                                                                ] === 'regular',
                                                                            'bg-red-100 text-red-700 dark:bg-red-800 dark:text-red-300': datosPlantel
                                                                                .servSanitarioEstado[grupo][tipo
                                                                                    .toLowerCase()
                                                                                ] === 'malo'
                                                                        }"
                                                                        x-text="datosPlantel.servSanitarioEstado[grupo][tipo.toLowerCase()]">
                                                                    </span>
                                                                </template>

                                                                <template
                                                                    x-if="!datosPlantel.servSanitarioEstado[grupo] || !datosPlantel.servSanitarioEstado[grupo][tipo.toLowerCase()]">
                                                                    <span class="text-gray-400 italic">N/D</span>
                                                                </template>
                                                            </td>
                                                        </tr>
                                                    </template>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </template>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-end items-center space-x-3 mt-6">
                <!-- Usuario -->
                <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                    Registrado por: <span class="font-semibold text-vinoClaro"
                        x-text="datosPlantel.usuario?.name ?? '—'"></span>
                </p>

                <!-- Botón Exportar a Excel -->
                {{-- <button
                    class="px-4 py-1.5 text-sm font-semibold text-white bg-green-600 rounded-lg shadow hover:bg-green-700 transition-colors duration-300"
                    @click="exportarExcel()">
                    <i class="bi bi-file-earmark-excel mr-1"></i> Exportar Excel
                </button> --}}

                <button @click="window.location.href='/exportar-encuesta/' + datosPlantel.id"
                    class="px-4 py-1.5 text-sm font-semibold text-white bg-green-600 rounded-lg shadow hover:bg-green-700 transition-colors duration-300">
                    Exportar a Excel
                </button>

                <!-- Botón Borrar -->
                {{-- <button
                    class="px-4 py-1.5 text-sm font-semibold text-white bg-red-600 rounded-lg shadow hover:bg-red-700 transition-colors duration-300"
                    @click="borrarPlantel(datosPlantel.id)">
                    <i class="bi bi-trash3 mr-1"></i> Borrar
                </button> --}}
                @php
                    $rolesPermitidos = [1, 2]; // Super Admin y Admin
                @endphp

                @if (in_array(auth()->user()->id_rol, $rolesPermitidos))
                    <button
                        class="px-4 py-1.5 text-sm font-semibold text-white bg-red-600 rounded-lg shadow hover:bg-red-700 transition-colors duration-300"
                        @click="borrarPlantel(datosPlantel.id)">
                        <i class="bi bi-trash3 mr-1"></i> Borrar
                    </button>
                @endif
            </div>
        </div>


        <x-modal name="detalle-plantel" :show="false" class="z-[9999] relative">
            <div class="p-6" x-show="selectedMatricula" x-cloak>
                <!-- Título -->
                <div class="flex items-center justify-between mb-4 border-b border-gray-300 dark:border-gray-700 pb-2">
                    <h2 class="text-2xl font-semibold text-vinoOscuro dark:text-vinoClaro">
                        📘 Detalles del CCT
                    </h2>
                    <button
                        @click="window.dispatchEvent(new CustomEvent('close-modal', { detail: 'detalle-plantel' })); selectedMatricula = null"
                        class="text-gray-500 hover:text-red-600 transition" title="Cerrar">
                        ✕
                    </button>
                </div>

                <!-- Contenido -->
                <div
                    class="bg-gray-50 dark:bg-gray-900 rounded-lg shadow-inner p-5 grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-3">

                    <div>
                        <p class="text-gray-500 text-xs uppercase">CCT</p>
                        <p class="font-semibold text-gray-800 dark:text-gray-100"
                            x-text="selectedMatricula?.cct?.clave_cct ?? '—'"></p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-xs uppercase">Teléfono Director</p>
                        <p class="font-semibold text-gray-800 dark:text-gray-100"
                            x-text="selectedMatricula?.telefono_director ?? '—'"></p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-xs uppercase">Turno</p>
                        <p class="font-semibold text-gray-800 dark:text-gray-100"
                            x-text="selectedMatricula?.cct?.turno?.nombre_turno ?? '—'"></p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-xs uppercase">Director</p>
                        <p class="font-semibold text-gray-800 dark:text-gray-100"
                            x-text="selectedMatricula?.nombre_director + ' ' + (selectedMatricula?.apellidos_director ?? '')">
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-xs uppercase">Nivel</p>
                        <p class="font-semibold text-gray-800 dark:text-gray-100"
                            x-text="selectedMatricula?.cct?.nivel?.nombre_nivel ?? '—'"></p>
                    </div>


                    <div>
                        <p class="text-gray-500 text-xs uppercase">Correo</p>
                        <p class="font-semibold text-gray-800 dark:text-gray-100 truncate"
                            x-text="selectedMatricula?.correo_director ?? '—'"></p>
                    </div>

                    <div class="sm:col-span-2">
                        <p class="text-gray-500 text-xs uppercase">Dirección</p>
                        <p class="font-semibold text-gray-800 dark:text-gray-100"
                            x-text="selectedMatricula?.direccion_director ?? '—'"></p>
                    </div>

                    <!-- Línea divisoria -->
                    <div class="sm:col-span-2 border-t border-gray-300 dark:border-gray-700 my-2"></div>

                    <!-- Sección de Alumnos -->
                    <div>
                        <p class="text-gray-500 text-xs uppercase">Alumnos</p>
                        <p class="font-semibold text-gray-800 dark:text-gray-100"
                            x-text="selectedMatricula?.alumnos ?? 0"></p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs uppercase">Alumnas</p>
                        <p class="font-semibold text-gray-800 dark:text-gray-100"
                            x-text="selectedMatricula?.alumnas ?? 0"></p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs uppercase">Con discapacidad</p>
                        <p class="font-semibold text-gray-800 dark:text-gray-100"
                            x-text="selectedMatricula?.personas_discapacidad ?? 0"></p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs uppercase">Total alumnos</p>
                        <p class="font-semibold text-gray-800 dark:text-gray-100"
                            x-text="selectedMatricula?.total_matricula ?? 0"></p>
                    </div>

                    <!-- Sección de Personal -->
                    <div>
                        <p class="text-gray-500 text-xs uppercase">Administrativos</p>
                        <p class="font-semibold text-gray-800 dark:text-gray-100"
                            x-text="selectedMatricula?.administrativos ?? 0"></p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs uppercase">Directores</p>
                        <p class="font-semibold text-gray-800 dark:text-gray-100"
                            x-text="selectedMatricula?.directores ?? 0"></p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs uppercase">Docentes</p>
                        <p class="font-semibold text-gray-800 dark:text-gray-100"
                            x-text="selectedMatricula?.docentes ?? 0"></p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs uppercase">Conserjes</p>
                        <p class="font-semibold text-gray-800 dark:text-gray-100"
                            x-text="selectedMatricula?.conserjes ?? 0"></p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-xs uppercase">Total personal</p>
                        <p class="font-semibold text-gray-800 dark:text-gray-100"
                            x-text="selectedMatricula?.total_personal ?? 0"></p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-xs uppercase">Total grupos</p>
                        <p class="font-semibold text-gray-800 dark:text-gray-100"
                            x-text="selectedMatricula?.total_grupos ?? 0"></p>
                    </div>
                </div>

                <!-- Botón cerrar -->
                <div class="mt-6 text-right">
                    <button
                        @click="window.dispatchEvent(new CustomEvent('close-modal', { detail: 'detalle-plantel' })); selectedMatricula = null"
                        class="px-5 py-2 bg-vinoClaro text-white rounded-lg font-semibold shadow hover:bg-vinoOscuro transition-all duration-300">
                        Cerrar
                    </button>
                </div>
            </div>
        </x-modal>


        {{-- modal fotografias carrusel --}}

        <x-modal name="fotografias_plantel" :show="false" class="z-[9999] relative">
            <div class="relative bg-white dark:bg-gray-900 p-6 rounded-lg shadow-xl">
                <div class="flex items-center justify-between mb-4 border-b border-gray-300 dark:border-gray-700 pb-2">
                    <h2 class="text-2xl font-semibold text-vinoOscuro dark:text-vinoClaro">
                        Fotografías
                    </h2>
                    <button
                        @click="window.dispatchEvent(new CustomEvent('close-modal', { detail: 'fotografias_plantel' })); selectedMatricula = null"
                        class="text-gray-500 hover:text-red-600 transition" title="Cerrar">
                        ✕
                    </button>
                </div>
                <template x-if="fotos.length">
                    <div class="relative flex flex-col items-center">
                        <img :src="`/storage/planteles/${datosPlantel.plantel_id}/fotografias/${fotos[index]}`"
                            class="max-h-[70vh] rounded-lg object-contain" alt="Fotografía del plantel">
                        <div class="absolute inset-y-0 left-0 flex items-center">
                            <button @click="index = (index === 0) ? fotos.length - 1 : index - 1"
                                class="p-2 bg-gray-700/60 text-white rounded-full hover:bg-gray-900">‹</button>
                        </div>
                        <div class="absolute inset-y-0 right-0 flex items-center">
                            <button @click="index = (index + 1) % fotos.length"
                                class="p-2 bg-gray-700/60 text-white rounded-full hover:bg-gray-900">›</button>
                        </div>
                        <div class="mt-4 text-gray-700 dark:text-gray-300 text-sm">
                            <span x-text="index + 1"></span> / <span x-text="fotos.length"></span>
                        </div>
                    </div>
                </template>

                <template x-if="!fotos.length">
                    <p class="text-center text-gray-500 dark:text-gray-400">No hay fotografías disponibles</p>
                </template>
            </div>
        </x-modal>



    </div>


    @push('scripts')
        <script>
            const darkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
            console.log(darkMode);
            const fondo = darkMode ? "#525151" : "#ffffff"; // gris oscuro o blanco
            const texto = darkMode ? "#f9fafb" : "#111827"; // texto claro u oscuro
            const botonConfirmar = darkMode ? "#977E5B" : "#56212f";
            const botonCancelar = darkMode ? "#660000" : "#c3b08f";

            function buscador() {
                return {
                    busqueda: '',
                    resultados: [],
                    mostrarListado: true,
                    mostrarResultados: false,
                    plantel_id: null,
                    datosPlantel: {},
                    bloquearBusqueda: false,
                    selectedMatricula: null,
                    idPlantel: null,
                    fotos: [],
                    async buscar() {
                        if (this.bloquearBusqueda) return;
                        if (this.busqueda.length < 2) {
                            this.resultados = [];
                            return;
                        }

                        try {
                            const res = await fetch(`/survey/search?q=${encodeURIComponent(this.busqueda)}`, {
                                method: 'GET',
                                credentials: 'same-origin', // 🔥 Esto es clave para rutas protegidas
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest', // buena práctica
                                    'Accept': 'application/json',
                                },
                            });

                            if (!res.ok) throw new Error(`HTTP ${res.status}`);

                            this.resultados = await res.json();
                            console.log(this.resultados);
                            this.mostrarResultados = true;

                        } catch (e) {
                            console.error('Error al buscar:', e);
                        }
                    },
                    seleccionarPlantel(item) {
                        this.bloquearBusqueda = true;
                        this.busqueda = item.nombre_completo;
                        this.plantel_id = item.id;
                        this.mostrarResultados = false;
                        this.resultados = [];
                        this.cargarDatosPlantel(item.id);
                    },
                    async cargarDatosPlantel(id) {

                        this.plantel_id = id;
                        this.mostrarListado = false;


                        try {
                            const res = await fetch(`/plantel/${this.plantel_id}`, {
                                credentials: 'same-origin',
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'Accept': 'application/json',
                                },
                            });

                            if (res.status === 404) {
                                this.datosPlantel = {};
                                this.mostrarListado = true;

                                Swal.fire({
                                    icon: 'error',
                                    title: 'No encontrado',
                                    text: 'No existen datos del plantel seleccionado.'
                                });

                                return; // IMPORTANTE: no seguir
                            }

                            // ❌ Si el servidor no encuentra el plantel (status 404, 204, 500, etc)
                            if (!res.ok) {
                                this.datosPlantel = null;
                                Swal.fire({
                                    icon: 'error',
                                    title: 'No se encontraron datos',
                                    text: 'El plantel seleccionado no tiene registros.',
                                });
                                return;
                            }

                            const data = await res.json();

                            // ❌ Si viene vacío o null
                            if (!data || Object.keys(data).length === 0) {
                                this.datosPlantel = null;
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Plantel sin información',
                                    text: 'Este plantel aún no tiene datos registrados.',
                                });
                                return;
                            }

                            // ✔ Guardar datos si todo salió bien
                            this.datosPlantel = data;

                            // console.log(JSON.parse(JSON.stringify(this.datosPlantel)));
                            // console.log(this.datosPlantel.documentoPropiedad);

                            // 🔹 Intentar parsear campos
                            this.parseField("matricula", true, []);
                            this.parseField("amenazas", true, {});
                            this.parseField("bienes", true, {});
                            this.parseField("edifTipoEstructura", false, {});
                            this.parseField("edifCondiciones", true, {});
                            this.parseField("edifEspaciosCantidad", true, {});
                            this.parseField("servSanitarioCantidad", true, {});
                            this.parseField("servSanitarioEstado", true, {});
                            // this.parseField("documentoPropiedad", false, {});
                            this.parseDocumentoPropiedad();

                            let fotos = JSON.parse(this.datosPlantel.fotografias ?? "[]");

                            // 💡 Mostrar mapa
                            this.$nextTick(() => this.mostrarMapa());

                        } catch (e) {
                            console.error('Error cargando datos del plantel:', e);

                            Swal.fire({
                                icon: 'error',
                                title: 'Error al cargar datos',
                                text: 'Ocurrió un problema al obtener la información del plantel.',
                            });
                        }
                    },
                    mostrarMapa() {
                        const {
                            latitud,
                            longitud,
                            nombre_plantel
                        } = this.datosPlantel.plantel ?? {};

                        console.log(latitud);
                        console.log(longitud);
                        console.log(nombre_plantel);
                        const mapContainer = document.getElementById('map');
                        if (!mapContainer || !latitud || !longitud) return;

                        // Si ya hay un mapa, elimínalo antes de crear otro
                        if (mapContainer._leaflet_id) {
                            mapContainer._leaflet_id = null;
                            mapContainer.innerHTML = "";
                        }

                        // Crear el mapa con las coordenadas del plantel
                        const map = L.map(mapContainer).setView([parseFloat(latitud), parseFloat(longitud)], 17);

                        // Detectar modo oscuro en Tailwind
                        const darkMode = document.documentElement.classList.contains('dark');

                        // Elegir capa según el modo
                        const tileLayerUrl = darkMode ?
                            'https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png' // 🌙 Modo oscuro elegante
                            :
                            'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'; // ☀️ Modo claro por defecto


                        L.tileLayer(tileLayerUrl, {
                            maxZoom: 18,
                            attribution: '&copy; OpenStreetMap contributors'
                        }).addTo(map);

                        L.marker([parseFloat(latitud), parseFloat(longitud)])
                            .addTo(map)
                            .bindPopup(`<b>${nombre_plantel}</b><br>Lat: ${latitud}, Lng: ${longitud}`)
                            .openPopup();

                        // Corregir tamaño del mapa
                        setTimeout(() => map.invalidateSize(), 300);
                    },

                    // Watcher manual (por debounce)
                    init() {
                        this.$watch('busqueda', () =>
                            // if (this.bloquearBusqueda) this.bloquearBusqueda = false;
                            this.buscar());
                    },
                    formatearFecha(fechaISO) {
                        if (!fechaISO) return '—';
                        const fecha = new Date(fechaISO);
                        const opciones = {
                            day: 'numeric',
                            month: 'long',
                            year: 'numeric'
                        };
                        // Formatea en español (ej: "28 de octubre de 2025")
                        return fecha.toLocaleDateString('es-ES', opciones);
                    },
                    get totalAlumnos() {
                        if (!Array.isArray(this.datosPlantel.matricula)) return 0;

                        return this.datosPlantel.matricula.reduce((total, item) => {
                            const alumnas = parseInt(item.alumnas || 0);
                            const alumnos = parseInt(item.alumnos || 0);
                            const discapacidad = parseInt(item.personas_discapacidad || 0);
                            return total + alumnas + alumnos + discapacidad;
                        }, 0);
                    },
                    get totalPersonal() {

                        if (!Array.isArray(this.datosPlantel.matricula)) return 0;

                        return this.datosPlantel.matricula.reduce((total, item) => {
                            const totalPersonal = parseInt(item.total_personal || 0);
                            return total + totalPersonal;
                        }, 0);
                    },
                    parseDocumentoPropiedad() {
                        try {
                            let value = this.datosPlantel.documentoPropiedad;
                            // console.log("valor parse" +
                            //     value);

                            if (!value) {
                                this.datosPlantel.documentoPropiedad = {};
                                return;
                            }

                            // 🔥 Primer parse
                            value = JSON.parse(value);


                            // 🔥 Si aún es string, segundo parse
                            if (typeof value === "string") {
                                value = JSON.parse(value);
                            }

                            this.datosPlantel.documentoPropiedad = value;
                            // console.log("ya parseado" + this.datosPlantel.documentoPropiedad);

                        } catch (e) {
                            console.warn("⚠️ No se pudo parsear documento_propiedad:", e);
                            this.datosPlantel.documentoPropiedad = {};
                        }
                    },
                    parseField(fieldName, doubleParse = false, fallback = {}) {
                        try {
                            let value = this.datosPlantel[fieldName];

                            // 🔥 Si es null o undefined
                            if (!value) {
                                this.datosPlantel[fieldName] = fallback;
                                return;
                            }

                            // 🔥 Si YA es objeto, no lo toques
                            if (typeof value === "object") {
                                this.datosPlantel[fieldName] = value;
                                return;
                            }

                            // 🔥 Si es string, parsear
                            if (typeof value === "string") {

                                // Si viene con comillas escapadas "\"{...}\""
                                if (doubleParse) {
                                    value = JSON.parse(value); // primer parse
                                    if (typeof value === "string") {
                                        value = JSON.parse(value); // segundo parse solo si aún es string
                                    }
                                } else {
                                    value = JSON.parse(value);
                                }
                            }

                            this.datosPlantel[fieldName] = value;

                        } catch (e) {
                            console.warn(`⚠️ No se pudo parsear ${fieldName}:`, e);
                            this.datosPlantel[fieldName] = fallback;
                        }
                    },
                    mostrarCarrusel(payload, plantelId = null) {
                        let fotos = [];

                        try {
                            // Si viene un array ya
                            if (Array.isArray(payload)) {
                                fotos = payload;
                            } else if (typeof payload === 'string') {
                                // parseo seguro: intenta 1 vez, si devuelve string -> parsea otra vez
                                fotos = JSON.parse(payload);
                                if (typeof fotos === 'string') {
                                    fotos = JSON.parse(fotos);
                                }
                                // si aún no es array, falla al catch
                                if (!Array.isArray(fotos)) fotos = [];
                            } else {
                                fotos = [];
                            }
                        } catch (e) {
                            console.warn('Error parseando fotos:', e);
                            fotos = [];
                        }

                        this.fotos = fotos;
                        this.index = 0;
                        this.idPlantel = plantelId;
                        // abre el modal
                        this.$dispatch ? this.$dispatch('open-modal', 'fotografias_plantel') : window.dispatchEvent(
                            new CustomEvent('open-modal', {
                                detail: 'fotografias_plantel'
                            }));
                    },
                    anterior() {
                        this.index = (this.index === 0) ? this.fotos.length - 1 : this.index - 1
                    },
                    siguiente() {
                        this.index = (this.index + 1) % this.fotos.length
                    },
                    exportarExcel() {
                        // Lógica para exportar a Excel
                        // console.log("Exportando a Excel...");
                    },
                    borrarPlantel(id) {


                        Swal.fire({
                            title: '¿Seguro que deseas eliminar el registro?',
                            text: "¡Es importante para poder avanzar!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: botonConfirmar,
                            cancelButtonColor: botonCancelar,
                            confirmButtonText: 'Sí',
                            cancelButtonText: 'Cancelar',
                            background: fondo,
                            color: texto,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // console.log(`Dato eliminado ${id}`);
                                //se crea la ruta
                                fetch(`plantel/${id}`, {
                                        method: 'DELETE',
                                        headers: {
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                                .content,
                                            'Accept': 'application/json'
                                        }
                                    })
                                    .then(res => res.json())
                                    .then(data => {
                                        console.log(data);
                                        Swal.fire({
                                            title: 'Eliminado',
                                            text: 'El plantel y sus archivos han sido eliminados',
                                            icon: 'success'
                                        }).then(() => {
                                            // 🔄 OPCIÓN 1: refrescar página completa
                                            location.reload();

                                            // 🔄 OPCIÓN 2: refrescar tu lista sin recargar página
                                            // this.obtenerPlanteles();
                                        });

                                    })
                                    .catch(err => {
                                        console.error(err);
                                        Swal.fire("Error", "No se pudo eliminar", "error");
                                    });
                            }
                        });
                    },
                    resetVista() {
                        this.mostrarListado = true;
                        this.datosPlantel = false;
                        this.busqueda = ''; // 🔥 limpia el input
                        this.mostrarResultados = false; // opcional
                    },
                    descargarDocumentoPropiedad() {

                        // const archivo = this.datosPlantel?.documentoPropiedad?.archivoPropiedad;
                        // const archivo = this.datosPlantel.documentoPropiedad.archivoPropiedad;
                        // console.log(archivo);

                        const archivoCompleto = this.datosPlantel?.documentoPropiedad?.archivoPropiedad;

                        const nombreArchivo = archivoCompleto ?
                            archivoCompleto.split('/').pop() :
                            null;

                        // console.log(nombreArchivo);

                        Swal.fire({
                            title: 'Abrir documento',
                            text: '¿Deseas abrir el documento de propiedad?',
                            icon: 'info',
                            showCancelButton: true,
                            confirmButtonColor: botonConfirmar,
                            cancelButtonColor: botonCancelar,
                            confirmButtonText: 'Sí, abrir',
                            cancelButtonText: 'Cancelar',
                            background: fondo,
                            color: texto,
                        }).then((result) => {

                            if (!result.isConfirmed) return;

                            if (!archivoCompleto) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Sin archivo',
                                    text: 'No se encontró el archivo de propiedad.',
                                    background: fondo,
                                    color: texto,
                                });
                                return;
                            }
                            const url = `/storage/planteles/${this.plantel_id}/documentos_propiedad/${nombreArchivo}`;

                            window.open(url, '_blank'); // 🔥 abrir en nueva pestaña
                        });
                    },

                }
            }
        </script>
    @endpush
</x-app-layout>
