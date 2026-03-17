<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-dorado leading-tight">
            {{ __('Encuesta') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-950 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-8" x-data="formularioEncuesta()" x-ref="encuesta">
                    <div class="max-w-4xl mx-auto px-6 mb-12">
                        <!-- 🔹 Versión completa (visible en pantallas medianas o mayores) -->
                        <div class="hidden sm:flex flex-wrap justify-between items-start gap-y-4 gap-x-2">
                            <template x-for="n in 13" :key="n">
                                <div class="flex-1 min-w-[60px] sm:min-w-[80px] md:min-w-[100px]">
                                    <div :class="step >= n ? 'bg-vino dark:bg-vino' : 'bg-gray-300 dark:bg-gray-600'"
                                        class="h-2 rounded-full transition-all duration-300"></div>
                                    <div class="text-center mt-2 text-xs sm:text-sm dark:text-white truncate"
                                        x-text="'Paso ' + n"></div>
                                </div>
                            </template>
                        </div>

                        <!-- 🔹 Versión compacta (solo barra, visible en móvil) -->
                        <div class="sm:hidden">
                            <div class="relative w-full h-2 bg-gray-300 dark:bg-gray-600 rounded-full overflow-hidden">
                                <div class="absolute top-0 left-0 h-2 bg-vino dark:bg-vino transition-all duration-500"
                                    :style="`width: ${(step / 13) * 100}%`"></div>
                            </div>
                            <div class="text-center mt-2 text-xs text-gray-700 dark:text-gray-300">
                                Paso <span x-text="step"></span> de 13
                            </div>
                        </div>
                    </div>

                    <form method="POST" novalidate @submit.prevent="enviarEncuesta" x-ref="encuestaForm"
                        autocomplete="off">

                        @csrf
                        {{-- paso 1 --}}
                        @include('encuesta.step1')

                        {{-- paso 2  --}}
                        @include('encuesta.step2')

                        {{-- paso 3 --}}

                        @include('encuesta.step3')

                        {{-- paso 4 --}}

                        @include('encuesta.step4')

                        {{-- paso 5 --}}

                        @include('encuesta.step5')
                        {{-- paso 6 --}}

                        @include('encuesta.step6')
                        {{-- paso 7 --}}

                        @include('encuesta.step7')
                        {{-- paso 8 --}}

                        @include('encuesta.step8')
                        {{-- paso 9 --}}

                        @include('encuesta.step9')
                        {{-- paso 10 --}}

                        @include('encuesta.step10')

                        {{-- paso 11 --}}

                        @include('encuesta.step11')

                        {{-- paso 12 --}}

                        @include('encuesta.step12')

                        {{-- paso 13 --}}

                        @include('encuesta.step13')

                        <!-- Paso final: Confirmación o resumen -->
                        <div x-show="step === 13">
                            <!-- Mostrar resumen o enviar -->
                            {{-- <button type="submit" class="bg-vino text-white px-4 py-2 rounded hover:bg-vino/90 transition">Enviar</button> --}}
                        </div>

                        <!-- Navegación -->
                        <div class="mt-8 flex justify-between max-w-4xl mx-auto px-6">
                            <button type="button" @click="retroceder()" x-show="step > 1"
                                class="bg-cafe text-white px-4 py-2 rounded hover:bg-cafe/90 transition">Anterior</button>

                            <template x-if="step < 13">
                                {{-- <button type="button" @click="avanzar()" class="bg-vino dark:bg-white dark:text-black text-white px-4 py-2 rounded hover:bg-vino/90 transition">Siguiente</button> --}}
                                <button type="button" @click="avanzar()" :disabled="subiendo"
                                    class="bg-vino dark:bg-white dark:text-black text-white px-4 py-2 rounded
                                    hover:bg-vino/90 transition
                                    disabled:opacity-50 disabled:cursor-not-allowed">
                                    <span x-show="!subiendo">Siguiente</span>
                                    <span x-show="subiendo">Subiendo archivos…</span>
                                </button>
                            </template>
                            <!-- Muestra "Enviar" si es el último paso -->
                            <template x-if="step === 13">
                                <button type="submit"
                                    class="bg-vino text-white px-4 py-2 rounded hover:bg-vino/90 transition">
                                    Enviar
                                </button>
                            </template>
                        </div>
                        <!-- Overlay de progreso (no modal real) -->
                        <div x-show="subiendo" x-transition.opacity
                            class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm">
                            <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-2xl p-6 w-full max-w-md mx-4 text-center"
                                x-transition.scale>
                                <!-- Título -->
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">
                                    Procesando archivos
                                </h3>

                                <!-- Mensaje dinámico -->
                                <p class="text-sm text-gray-600 dark:text-gray-300 mb-4" x-text="mensajeSubida">
                                </p>

                                <!-- Barra -->
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3 overflow-hidden">
                                    <div class="bg-vino h-3 transition-all duration-300"
                                        :style="`width: ${progresoSubida}%`">
                                    </div>
                                </div>

                                <!-- Porcentaje -->
                                <p class="text-xs mt-2 text-gray-500 dark:text-gray-400" x-text="`${progresoSubida}%`">
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            var surveyUrl = "{{ route('survey.store') }}";
        </script>
    @endpush

</x-app-layout>
