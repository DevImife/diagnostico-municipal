<div data-step="10" x-show="step === 10" class="px-10">
    <div class="mb-12">
        <h2 class="text-2xl align-middle font-semibold text-vino dark:text-gray-100 text-center mt-6 break-normal">
            NECESIDADES DE MEJORAMIENTO</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start dark:text-white">
        {{-- card 1 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center  transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 md:col-span-2">
            {{-- matriz --}}

            <label class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                Necesidades
            </label>
            <label class="mb-4 block text-sm text-gray-600 dark:text-gray-400">
                (Seleccionar el tipo de necesidades por espacio)
            </label>

            <!-- Tabla responsiva -->
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-center text-gray-700 dark:text-gray-300">
                    <thead class="bg-gray-100 dark:bg-gray-800 text-xs uppercase">
                        <tr>
                            <th class="py-3 px-2 text-left">Espacio</th>
                            <th class="py-3 px-2">Construcción</th>
                            <th class="py-3 px-2">Rehabilitación</th>
                            <th class="py-3 px-2">Demolición</th>
                            <th class="py-3 px-2">Sustitución</th>
                            <th class="py-3 px-2">Equipamiento</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        <template x-for="(valor, espacio) in necesidades" :key="espacio">
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                <td class="py-2 px-2 text-left capitalize" x-text="espacio.replace('_',' ')"></td>
                                <td>
                                    <input type="checkbox" value="construccion" x-model="necesidades[espacio]"
                                        class="accent-vino">
                                </td>
                                <td>
                                    <input type="checkbox" value="rehabilitacion" x-model="necesidades[espacio]"
                                        class="accent-vino">
                                </td>
                                <td>
                                    <input type="checkbox" value="demolicion" x-model="necesidades[espacio]"
                                        class="accent-vino">
                                </td>
                                <td>
                                    <input type="checkbox" value="sustitucion" x-model="necesidades[espacio]"
                                        class="accent-vino">
                                </td>
                                <td>
                                    <input type="checkbox" value="equipamiento" x-model="necesidades[espacio]"
                                        class="accent-vino">
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>

            </div>
        </div>
        {{-- card 2 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center  transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 md:col-span-2">
            {{-- matriz --}}
            <label for="elementos_estructurales" class="block text-lg font-semibold text-gray-900 dark:text-white mb-4"
                item-center justify-center>
                Elementos Estructurales</label>
            <label for="elementos_estructurales">(Seleccionar el tipo de trabajos requeridos por espacio)</label>
            <div class="overflow-x-auto">
                <table
                    class="min-w-full text-sm text-center text-gray-700 dark:text-gray-300 table-auto md:table-fixed">
                    <thead class="bg-gray-100 dark:bg-gray-800 text-xs uppercase">
                        <tr>
                            <th class="py-3 px-2 text-left"></th>
                            <th class="py-3 px-2">Aulas</th>
                            <th class="py-3 px-2">Laboratorio</th>
                            <th class="py-3 px-2">Talleres</th>
                            <th class="py-3 px-2">Cómputo</th>
                            <th class="py-3 px-2">Biblioteca</th>
                            <th class="py-3 px-2">Aula de Usos Multiples</th>
                            <th class="py-3 px-2">Comedor</th>
                            <th class="py-3 px-2">Dirección</th>
                            <th class="py-3 px-2">Sanitarios</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        <!-- Pintura -->
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Pintura</td>
                            <td><input type="checkbox" value="Aulas" x-model="elementosEstructurales.pintura"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Laboratorio" x-model="elementosEstructurales.pintura"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Talleres" x-model="elementosEstructurales.pintura"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Cómputo" x-model="elementosEstructurales.pintura"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Biblioteca" x-model="elementosEstructurales.pintura"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Aula de usos múltiples"
                                    x-model="elementosEstructurales.pintura" class="accent-vino"></td>
                            <td><input type="checkbox" value="Comedor" x-model="elementosEstructurales.pintura"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Dirección" x-model="elementosEstructurales.pintura"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Sanitarios" x-model="elementosEstructurales.pintura"
                                    class="accent-vino"></td>
                        </tr>

                        <!-- Pisos Interiores -->
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Pisos Interiores</td>
                            <td><input type="checkbox" value="Aulas"
                                    x-model="elementosEstructurales.pisos_interiores" class="accent-vino"></td>
                            <td><input type="checkbox" value="Laboratorio"
                                    x-model="elementosEstructurales.pisos_interiores" class="accent-vino"></td>
                            <td><input type="checkbox" value="Talleres"
                                    x-model="elementosEstructurales.pisos_interiores" class="accent-vino"></td>
                            <td><input type="checkbox" value="Cómputo"
                                    x-model="elementosEstructurales.pisos_interiores" class="accent-vino"></td>
                            <td><input type="checkbox" value="Biblioteca"
                                    x-model="elementosEstructurales.pisos_interiores" class="accent-vino"></td>
                            <td><input type="checkbox" value="Aula de usos múltiples"
                                    x-model="elementosEstructurales.pisos_interiores" class="accent-vino"></td>
                            <td><input type="checkbox" value="Comedor"
                                    x-model="elementosEstructurales.pisos_interiores" class="accent-vino"></td>
                            <td><input type="checkbox" value="Dirección"
                                    x-model="elementosEstructurales.pisos_interiores" class="accent-vino"></td>
                            <td><input type="checkbox" value="Sanitarios"
                                    x-model="elementosEstructurales.pisos_interiores" class="accent-vino"></td>
                        </tr>
                        {{-- Herreria y Canceleria --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Herreria y Canceleria</td>
                            <td><input type="checkbox" value="Aulas" x-model="elementosEstructurales.herreria"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Laboratorio" x-model="elementosEstructurales.herreria"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Talleres" x-model="elementosEstructurales.herreria"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Cómputo" x-model="elementosEstructurales.herreria"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Biblioteca" x-model="elementosEstructurales.herreria"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Aula de usos múltiples"
                                    x-model="elementosEstructurales.herreria" class="accent-vino"></td>
                            <td><input type="checkbox" value="Comedor" x-model="elementosEstructurales.herreria"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Dirección" x-model="elementosEstructurales.herreria"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Sanitarios" x-model="elementosEstructurales.herreria"
                                    class="accent-vino"></td>
                        </tr>
                        {{-- Albañileria --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Albañileria</td>
                            <td><input type="checkbox" value="Aulas" x-model="elementosEstructurales.albañileria"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Laboratorio"
                                    x-model="elementosEstructurales.albañileria" class="accent-vino"></td>
                            <td><input type="checkbox" value="Talleres" x-model="elementosEstructurales.albañileria"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Cómputo" x-model="elementosEstructurales.albañileria"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Biblioteca"
                                    x-model="elementosEstructurales.albañileria" class="accent-vino"></td>
                            <td><input type="checkbox" value="Aula de usos múltiples"
                                    x-model="elementosEstructurales.albañileria" class="accent-vino"></td>
                            <td><input type="checkbox" value="Comedor" x-model="elementosEstructurales.albañileria"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Dirección" x-model="elementosEstructurales.albañileria"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Sanitarios"
                                    x-model="elementosEstructurales.albañileria" class="accent-vino"></td>
                        </tr>
                        {{-- Aplanados --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Aplanados</td>
                            <td><input type="checkbox" value="Aulas" x-model="elementosEstructurales.aplanados"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Laboratorio" x-model="elementosEstructurales.aplanados"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Talleres" x-model="elementosEstructurales.aplanados"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Cómputo" x-model="elementosEstructurales.aplanados"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Biblioteca" x-model="elementosEstructurales.aplanados"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Aula de usos múltiples"
                                    x-model="elementosEstructurales.aplanados" class="accent-vino"></td>
                            <td><input type="checkbox" value="Comedor" x-model="elementosEstructurales.aplanados"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Dirección" x-model="elementosEstructurales.aplanados"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Sanitarios" x-model="elementosEstructurales.aplanados"
                                    class="accent-vino"></td>
                        </tr>
                        {{-- Muebles Sanitarios --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Muebles Sanitarios</td>
                            <td><input type="checkbox" value="Aulas"
                                    x-model="elementosEstructurales.muebles_sanitarios" class="accent-vino"></td>
                            <td><input type="checkbox" value="Laboratorio"
                                    x-model="elementosEstructurales.muebles_sanitarios" class="accent-vino"></td>
                            <td><input type="checkbox" value="Talleres"
                                    x-model="elementosEstructurales.muebles_sanitarios" class="accent-vino"></td>
                            <td><input type="checkbox" value="Cómputo"
                                    x-model="elementosEstructurales.muebles_sanitarios" class="accent-vino"></td>
                            <td><input type="checkbox" value="Biblioteca"
                                    x-model="elementosEstructurales.muebles_sanitarios" class="accent-vino"></td>
                            <td><input type="checkbox" value="Aula de usos múltiples"
                                    x-model="elementosEstructurales.muebles_sanitarios" class="accent-vino"></td>
                            <td><input type="checkbox" value="Comedor"
                                    x-model="elementosEstructurales.muebles_sanitarios" class="accent-vino"></td>
                            <td><input type="checkbox" value="Dirección"
                                    x-model="elementosEstructurales.muebles_sanitarios" class="accent-vino"></td>
                            <td><input type="checkbox" value="Sanitarios"
                                    x-model="elementosEstructurales.muebles_sanitarios" class="accent-vino"></td>
                        </tr>
                        {{-- Instalación Eléctrica --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Instalación Eléctrica</td>
                            <td><input type="checkbox" value="Aulas" x-model="elementosEstructurales.inst_electrica"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Laboratorio"
                                    x-model="elementosEstructurales.inst_electrica" class="accent-vino"></td>
                            <td><input type="checkbox" value="Talleres"
                                    x-model="elementosEstructurales.inst_electrica" class="accent-vino"></td>
                            <td><input type="checkbox" value="Cómputo"
                                    x-model="elementosEstructurales.inst_electrica" class="accent-vino"></td>
                            <td><input type="checkbox" value="Biblioteca"
                                    x-model="elementosEstructurales.inst_electrica" class="accent-vino"></td>
                            <td><input type="checkbox" value="Aula de usos múltiples"
                                    x-model="elementosEstructurales.inst_electrica" class="accent-vino"></td>
                            <td><input type="checkbox" value="Comedor"
                                    x-model="elementosEstructurales.inst_electrica" class="accent-vino"></td>
                            <td><input type="checkbox" value="Dirección"
                                    x-model="elementosEstructurales.inst_electrica" class="accent-vino"></td>
                            <td><input type="checkbox" value="Sanitarios"
                                    x-model="elementosEstructurales.inst_electrica" class="accent-vino"></td>
                        </tr>
                        {{-- Inst. Sanitaria --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Inst. Sanitaria</td>
                            <td><input type="checkbox" value="Aulas" x-model="elementosEstructurales.inst_sanitaria"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Laboratorio"
                                    x-model="elementosEstructurales.inst_sanitaria" class="accent-vino"></td>
                            <td><input type="checkbox" value="Talleres"
                                    x-model="elementosEstructurales.inst_sanitaria" class="accent-vino"></td>
                            <td><input type="checkbox" value="Cómputo"
                                    x-model="elementosEstructurales.inst_sanitaria" class="accent-vino"></td>
                            <td><input type="checkbox" value="Biblioteca"
                                    x-model="elementosEstructurales.inst_sanitaria" class="accent-vino"></td>
                            <td><input type="checkbox" value="Aula de usos múltiples"
                                    x-model="elementosEstructurales.inst_sanitaria" class="accent-vino"></td>
                            <td><input type="checkbox" value="Comedor"
                                    x-model="elementosEstructurales.inst_sanitaria" class="accent-vino"></td>
                            <td><input type="checkbox" value="Dirección"
                                    x-model="elementosEstructurales.inst_sanitaria" class="accent-vino"></td>
                            <td><input type="checkbox" value="Sanitarios"
                                    x-model="elementosEstructurales.inst_sanitaria" class="accent-vino"></td>
                        </tr>
                        {{-- Inst. Hidraulica --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Inst. Hidraulica</td>
                            <td><input type="checkbox" value="Aulas"
                                    x-model="elementosEstructurales.inst_hidraulica" class="accent-vino"></td>
                            <td><input type="checkbox" value="Laboratorio"
                                    x-model="elementosEstructurales.inst_hidraulica" class="accent-vino"></td>
                            <td><input type="checkbox" value="Talleres"
                                    x-model="elementosEstructurales.inst_hidraulica" class="accent-vino"></td>
                            <td><input type="checkbox" value="Cómputo"
                                    x-model="elementosEstructurales.inst_hidraulica" class="accent-vino"></td>
                            <td><input type="checkbox" value="Biblioteca"
                                    x-model="elementosEstructurales.inst_hidraulica" class="accent-vino"></td>
                            <td><input type="checkbox" value="Aula de usos múltiples"
                                    x-model="elementosEstructurales.inst_hidraulica" class="accent-vino"></td>
                            <td><input type="checkbox" value="Comedor"
                                    x-model="elementosEstructurales.inst_hidraulica" class="accent-vino"></td>
                            <td><input type="checkbox" value="Dirección"
                                    x-model="elementosEstructurales.inst_hidraulica" class="accent-vino"></td>
                            <td><input type="checkbox" value="Sanitarios"
                                    x-model="elementosEstructurales.inst_hidraulica" class="accent-vino"></td>
                        </tr>
                        {{-- Inst. Gas --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Inst. Gas</td>
                            <td><input type="checkbox" value="Aulas" x-model="elementosEstructurales.inst_gas"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Laboratorio" x-model="elementosEstructurales.inst_gas"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Talleres" x-model="elementosEstructurales.inst_gas"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Cómputo" x-model="elementosEstructurales.inst_gas"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Biblioteca" x-model="elementosEstructurales.inst_gas"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Aula de usos múltiples"
                                    x-model="elementosEstructurales.inst_gas" class="accent-vino"></td>
                            <td><input type="checkbox" value="Comedor" x-model="elementosEstructurales.inst_gas"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Dirección" x-model="elementosEstructurales.inst_gas"
                                    class="accent-vino"></td>
                            <td><input type="checkbox" value="Sanitarios" x-model="elementosEstructurales.inst_gas"
                                    class="accent-vino"></td>
                        </tr>
                        {{-- Impermeabilización --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Impermeabilización</td>
                            <td><input type="checkbox" value="Aulas"
                                    x-model="elementosEstructurales.impermeabilizacion" class="accent-vino"></td>
                            <td><input type="checkbox" value="Laboratorio"
                                    x-model="elementosEstructurales.impermeabilizacion" class="accent-vino"></td>
                            <td><input type="checkbox" value="Talleres"
                                    x-model="elementosEstructurales.impermeabilizacion" class="accent-vino"></td>
                            <td><input type="checkbox" value="Cómputo"
                                    x-model="elementosEstructurales.impermeabilizacion" class="accent-vino"></td>
                            <td><input type="checkbox" value="Biblioteca"
                                    x-model="elementosEstructurales.impermeabilizacion" class="accent-vino"></td>
                            <td><input type="checkbox" value="Aula de usos múltiples"
                                    x-model="elementosEstructurales.impermeabilizacion" class="accent-vino"></td>
                            <td><input type="checkbox" value="Comedor"
                                    x-model="elementosEstructurales.impermeabilizacion" class="accent-vino"></td>
                            <td><input type="checkbox" value="Dirección"
                                    x-model="elementosEstructurales.impermeabilizacion" class="accent-vino"></td>
                            <td><input type="checkbox" value="Sanitarios"
                                    x-model="elementosEstructurales.impermeabilizacion" class="accent-vino"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        {{-- card 3 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="lucide lucide-between-vertical-start-icon lucide-between-vertical-start">
                        <rect width="7" height="13" x="3" y="8" rx="1" />
                        <path d="m15 2-3 3-3-3" />
                        <rect width="7" height="13" x="14" y="8" rx="1" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="necesidad" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Descripción de Necesidades de Espacios</label>
                <br>
                <label for="necesidad" class="text-sm">(Anotar una Descripción detallada de las necesidades del
                    plantel;
                    Ejemplos: Construcción de 2 Aulas,
                    Demolición de la Dirección, Rehabilitación de Sanitarios, etc.)</label>
                <textarea id="necesidad" name="necesidad" x-model="descripcion.d_espacios" rows="3"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></textarea>
                {{-- <input type="text" id="necesidad" name="necesidad" x-model="descripcion.d_espacios"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" /> --}}
            </div>
        </div>
        {{-- card 4 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-user-pen-icon lucide-user-pen">
                        <path d="M11.5 15H7a4 4 0 0 0-4 4v2" />
                        <path
                            d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                        <circle cx="10" cy="7" r="4" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="descripcion_estructuras" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Descripción de Necesidades de Elementos Estructurales</label>
                <br>
                <label for="descripcion_estructuras" class="text-sm">(Anotar una Descripción detallada de las
                    necesidades de elementos
                    estructurales;
                    Ejemplos: Pintura en 2 Aulas, Impermeabilización de la Biblioteca, Instalación Eléctrica del Taller
                    de Cómputo, etc.)</label>
                <textarea id="descripcion_estructuras" name="descripcion_estructuras" x-model="descripcion.d_elementosEstructurales"
                    rows="3"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></textarea>

                {{-- <input type="text" id="descripcion_estructuras" name="descripcion_estructuras"
                    x-model="descripcion.d_elementosEstructurales"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" /> --}}
            </div>
        </div>
        {{-- card 5 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center  transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 md:col-span-2">
            {{-- matriz --}}
            <label for="servicios" class="block text-lg font-semibold text-gray-900 dark:text-white mb-4" item-center
                justify-center>
                Elementos de Servicios Básicos</label>
            <label for="necesidades" class="text-sm">(Seleccionar el tipo de necesidades por elemento
                exterior)</label>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-center text-gray-700 dark:text-gray-300">
                    <thead class="bg-gray-100 dark:bg-gray-800 text-xs uppercase">
                        <tr>
                            <th class="py-3 px-2 text-left"></th>
                            <th class="py-3 px-2">Construcción</th>
                            <th class="py-3 px-2">Rehabilitación</th>
                            <th class="py-3 px-2">Sustitución</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        <!-- aulas -->
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Red Eléctrica</td>
                            <td><input type="checkbox" name="red_electrica" value="construccion" class="accent-vino"
                                    x-model="elementosExteriores.red_electica" /></td>
                            <td><input type="checkbox" name="red_electrica" value="rehabilitacion"
                                    class="accent-vino" x-model="elementosExteriores.red_electica" /></td>
                            <td><input type="checkbox" name="red_electrica" value="sustitucion" class="accent-vino"
                                    x-model="elementosExteriores.red_electica" /></td>
                        </tr>
                        <!-- laboratorio -->
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Red Hidráulica</td>
                            <td><input type="checkbox" name="red_hidraulica" value="construccion"
                                    class="accent-vino" x-model="elementosExteriores.red_hidraulica" /></td>
                            <td><input type="checkbox" name="red_hidraulica"
                                    value="rehabilitacion"class="accent-vino"
                                    x-model="elementosExteriores.red_hidraulica" /></td>
                            <td><input type="checkbox" name="red_hidraulica" value="sustitucion"class="accent-vino"
                                    x-model="elementosExteriores.red_hidraulica" /></td>
                        </tr>
                        {{-- talleres --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Red Sanitaria</td>
                            <td><input type="checkbox" name="red_sanitaria" value="construccion" class="accent-vino"
                                    x-model="elementosExteriores.red_sanitaria" /></td>
                            <td><input type="checkbox" name="red_sanitaria" value="rehabilitacion"
                                    class="accent-vino" x-model="elementosExteriores.red_sanitaria" /></td>
                            <td><input type="checkbox" name="red_sanitaria" value="sustitucion" class="accent-vino"
                                    x-model="elementosExteriores.red_sanitaria" /></td>
                        </tr>
                        {{-- computo --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Cisterna</td>
                            <td><input type="checkbox" name="cisterna" value="construccion" class="accent-vino"
                                    x-model="elementosExteriores.cisterna" /></td>
                            <td><input type="checkbox" name="cisterna" value="rehabilitacion" class="accent-vino"
                                    x-model="elementosExteriores.cisterna" /></td>
                            <td><input type="checkbox" name="cisterna" value="sustitucion" class="accent-vino"
                                    x-model="elementosExteriores.cisterna" /></td>
                        </tr>
                        {{-- biblioteca --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Tinacos</td>
                            <td><input type="checkbox" name="tinacos" value="construccion" class="accent-vino"
                                    x-model="elementosExteriores.tinacos" /></td>
                            <td><input type="checkbox" name="tinacos" value="rehabilitacion" class="accent-vino"
                                    x-model="elementosExteriores.tinacos" /></td>
                            <td><input type="checkbox" name="tinacos" value="sustitucion" class="accent-vino"
                                    x-model="elementosExteriores.tinacos" /></td>
                        </tr>
                        {{-- aula de usos multiples --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Fosa Séptica</td>
                            <td><input type="checkbox" name="fosa_septica" value="construccion" class="accent-vino"
                                    x-model="elementosExteriores.fosa_septica" /></td>
                            <td><input type="checkbox" name="fosa_septica" value="rehabilitacion"
                                    class="accent-vino" x-model="elementosExteriores.fosa_septica" /></td>
                            <td><input type="checkbox" name="fosa_septica" value="sustitucion" class="accent-vino"
                                    x-model="elementosExteriores.fosa_septica" /></td>
                        </tr>
                        {{-- comedor --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Biodigestor</td>
                            <td><input type="checkbox" name="biodigestor" value="construccion" class="accent-vino"
                                    x-model="elementosExteriores.biodigestor" /></td>
                            <td><input type="checkbox" name="biodigestor" value="rehabilitacion" class="accent-vino"
                                    x-model="elementosExteriores.biodigestor" /></td>
                            <td><input type="checkbox" name="biodigestor" value="sustitucion" class="accent-vino"
                                    x-model="elementosExteriores.biodigestor" /></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        {{-- card 6 --}}

        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center  transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 md:col-span-2">
            {{-- matriz --}}
            <label for="servicios" class="block text-lg font-semibold text-gray-900 dark:text-white mb-4" item-center
                justify-center>
                Accesibilidad</label>
            <label for="necesidades">(Seleccionar el tipo de necesidades por accesibilidad)</label>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-center text-gray-700 dark:text-gray-300">
                    <thead class="bg-gray-100 dark:bg-gray-800 text-xs uppercase">
                        <tr>
                            <th class="py-3 px-2 text-left"></th>
                            <th class="py-3 px-2">Construción</th>
                            <th class="py-3 px-2">Rehabilitación</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        <!-- aulas -->
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Firmes exteriores</td>
                            <td><input type="checkbox" name="Firmes_exteriores" value="construccion"
                                    class="accent-vino" x-model="accesibilidadMejora.firmes_exteriores" /></td>
                            <td><input type="checkbox" name="Firmes_exteriores" value="rehabilitacion"
                                    class="accent-vino" x-model="accesibilidadMejora.firmes_exteriores" /></td>
                        </tr>
                        <!-- laboratorio -->
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Andadores</td>
                            <td><input type="checkbox" name="andadores" value="construccion" class="accent-vino"
                                    x-model="accesibilidadMejora.andadores" />
                            </td>
                            <td><input type="checkbox" name="andadores" value="rehabilitacion" class="accent-vino"
                                    x-model="accesibilidadMejora.andadores" />
                            </td>
                        </tr>
                        {{-- talleres --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Rampas</td>
                            <td><input type="checkbox" name="rampas" value="construccion" class="accent-vino"
                                    x-model="accesibilidadMejora.rampas" />
                            </td>
                            <td><input type="checkbox" name="rampas" value="rehabilitacion" class="accent-vino"
                                    x-model="accesibilidadMejora.rampas" />
                            </td>
                        </tr>
                        {{-- computo --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Pasamanos</td>
                            <td><input type="checkbox" name="pasamanos" value="construccion" class="accent-vino"
                                    x-model="accesibilidadMejora.pasamanos" />
                            </td>
                            <td><input type="checkbox" name="pasamanos" value="rehabilitacion" class="accent-vino"
                                    x-model="accesibilidadMejora.pasamanos" />
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Otros</td>
                            <td><input type="checkbox" name="otros" value="construccion" class="accent-vino"
                                    x-model="accesibilidadMejora.otros" />
                            </td>
                            <td><input type="checkbox" name="otros" value="rehabilitacion" class="accent-vino"
                                    x-model="accesibilidadMejora.otros" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        {{-- card 7 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-accessibility-icon lucide-accessibility">
                        <circle cx="16" cy="4" r="1" />
                        <path d="m18 19 1-7-6 1" />
                        <path d="m5 8 3-3 5.5 3-2.36 3.5" />
                        <path d="M4.24 14.5a5 5 0 0 0 6.88 6" />
                        <path d="M13.76 17.5a5 5 0 0 0-6.88-6" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="descripcion_accesibilidad"
                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Descripción de Necesidades de Accesibilidad</label>
                <br>
                <label for="descripcion_accesibilidad">(Anotar una Descripción detallada de las necesidades de
                    accesibilidad;
                    Ejemplos: Rehabilitación de los Andadores, Construcción de Rampas, etc.)</label>
                <textarea id="descripcion_accesibilidad" name="descripcion_accesibilidad" x-model="descripcion.d_accesibilidad"
                    rows="3"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></textarea>
                {{-- <input type="text" id="descripcion_accesibilidad" name="descripcion_accesibilidad"
                    x-model="descripcion.d_accesibilidad"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" /> --}}
            </div>
        </div>
        {{-- card 8 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-user-pen-icon lucide-user-pen">
                        <path d="M11.5 15H7a4 4 0 0 0-4 4v2" />
                        <path
                            d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                        <circle cx="10" cy="7" r="4" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="descripcion_exteriores" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Descripción de Necesidades de Elementos Exteriores</label>
                <br>
                <label for="descripcion_exteriores">(Anotar una Descripción detallada de las necesidades de elementos
                    exteriores;
                    Ejemplos: Rehabilitación de la Red Eléctrica, Construcción de Cisterna, Construcción de Fosa
                    Séptica, etc.)</label>
                <textarea id="descripcion_exteriores" name="descripcion_exteriores" x-model="descripcion.d_elementosExteriores"
                    rows="3"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></textarea>
                {{-- <input type="text" id="descripcion_exteriores" name="descripcion_exteriores"
                    x-model="descripcion.d_elementosExteriores"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" /> --}}
            </div>
        </div>
        {{-- card 9 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center  transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 md:col-span-2">
            {{-- matriz --}}
            <label for="servicios" class="block text-lg font-semibold text-gray-900 dark:text-white mb-4" item-center
                justify-center>
                Espacios de Usos Múltiples</label>
            <label for="necesidades">(Seleccionar el tipo de necesidades por espacio de usos múltiples)</label>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-center text-gray-700 dark:text-gray-300">
                    <thead class="bg-gray-100 dark:bg-gray-800 text-xs uppercase">
                        <tr>
                            <th class="py-3 px-2 text-left"></th>
                            <th class="py-3 px-2">Construción</th>
                            <th class="py-3 px-2">Rehabilitación</th>
                            <th class="py-3 px-2">Sustitución</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        <!-- Área deportiva -->
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Área Deportiva</td>
                            <td><input type="checkbox" value="construccion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.area_deportiva" /></td>
                            <td><input type="checkbox" value="rehabilitacion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.area_deportiva" /></td>
                            <td><input type="checkbox" value="sustitucion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.area_deportiva" /></td>
                        </tr>
                        <!-- plaza Cívica -->
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Plaza Cívica</td>
                            <td><input type="checkbox" value="construccion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.plaza_civica" />
                            </td>
                            <td><input type="checkbox" value="rehabilitacion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.plaza_civica" />
                            </td>
                            <td><input type="checkbox" value="sustitucion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.plaza_civica" />
                            </td>
                        </tr>
                        <!-- Techumbre -->
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Techumbre</td>
                            <td><input type="checkbox" value="construccion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.techumbre" />
                            </td>
                            <td><input type="checkbox" value="rehabilitacion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.techumbre" />
                            </td>
                            <td><input type="checkbox" value="sustitucion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.techumbre" />
                            </td>
                        </tr>
                        {{-- asta bandera --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Asta Bandera</td>
                            <td><input type="checkbox" value="construccion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.asta_bandera" />
                            </td>
                            <td><input type="checkbox" value="rehabilitacion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.asta_bandera" />
                            </td>
                            <td><input type="checkbox" value="sustitucion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.asta_bandera" />
                            </td>
                        </tr>
                        {{-- cubierta --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Cubierta</td>
                            <td><input type="checkbox" value="construccion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.cubierta" />
                            </td>
                            <td><input type="checkbox" value="rehabilitacion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.cubierta" />
                            </td>
                            <td><input type="checkbox" value="sustitucion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.cubierta" />
                            </td>
                        </tr>
                        <!-- Muro de Acometida -->
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Muro de Acometida</td>
                            <td><input type="checkbox" value="construccion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.muro_acometida" />
                            </td>
                            <td>
                                <input type="checkbox" value="rehabilitacion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.muro_acometida" />
                            </td>
                            <td>
                                <input type="checkbox" value="sustitucion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.muro_acometida" />
                            </td>
                        </tr>
                        <!-- Alumbrado Exterior -->
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Alumbrado Exterior</td>
                            <td><input type="checkbox" value="construccion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.alumbradoExterior" /></td>
                            <td><input type="checkbox" value="rehabilitacion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.alumbradoExterior" /></td>
                            <td><input type="checkbox" value="sustitucion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.alumbradoExterior" /></td>
                        </tr>
                        {{-- Estacionamiento --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Estacionamiento</td>
                            <td><input type="checkbox" value="construccion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.estacionamiento" />
                            </td>
                            <td><input type="checkbox" value="rehabilitacion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.estacionamiento" /></td>
                            <td><input type="checkbox" value="sustitucion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.estacionamiento" /></td>
                        </tr>
                        {{-- Áreas Verdes --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Áreas Verdes</td>
                            <td><input type="checkbox" value="construccion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.areasVerdes" />
                            </td>
                            <td><input type="checkbox" value="rehabilitacion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.areasVerdes" />
                            </td>
                            <td><input type="checkbox" value="sustitucion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.areasVerdes" />
                            </td>
                        </tr>
                        {{-- Área de Juegos Infantiles --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Área de Juegos Infantiles</td>
                            <td><input type="checkbox" value="construccion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.areaJuegosInfantiles" />
                            </td>
                            <td><input type="checkbox" value="rehabilitacion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.areaJuegosInfantiles" />
                            </td>
                            <td><input type="checkbox" value="sustitucion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.areaJuegosInfantiles" />
                            </td>
                        </tr>
                        <!-- Bebederos -->
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Bebederos</td>
                            <td><input type="checkbox" value="construccion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.bebederos" />
                            </td>
                            <td><input type="checkbox" value="rehabilitacion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.bebederos" />
                            </td>
                            <td><input type="checkbox" value="sustitucion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.bebederos" />
                            </td>
                        </tr>
                        <!-- Cerco/Barda/Reja Perimetral -->
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Cerco/Barda/Reja Perimetral</td>
                            <td><input type="checkbox" value="construccion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.cercoBarda" />
                            </td>
                            <td><input type="checkbox" value="rehabilitacion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.cercoBarda" />
                            </td>
                            <td><input type="checkbox" value="sustitucion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.cercoBarda" />
                            </td>
                        </tr>
                        {{-- Acceso Principal --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Acceso Principal</td>
                            <td><input type="checkbox" value="construccion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.accesoPrincipal" /></td>
                            <td><input type="checkbox" value="rehabilitacion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.accesoPrincipal" /></td>
                            <td><input type="checkbox" value="sustitucion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.accesoPrincipal" /></td>
                        </tr>
                        {{-- Otros --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Otros</td>
                            <td><input type="checkbox" value="construccion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.otros" />
                            </td>
                            <td><input type="checkbox" value="rehabilitacion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.otros" />
                            </td>
                            <td><input type="checkbox" value="sustitucion" class="accent-vino"
                                    x-model="espaciosMultiplesMejora.otros" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        {{-- card 10 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-user-pen-icon lucide-user-pen">
                        <path d="M11.5 15H7a4 4 0 0 0-4 4v2" />
                        <path
                            d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                        <circle cx="10" cy="7" r="4" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="descripcion_usos_multiples"
                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Descripción de Necesidades de Espacios de Usos Múltiples</label>
                <br>
                <label for="descripcion_usos_multiples">(Anotar una Descripción detallada de las necesidades de
                    espacios de usos múltiples;
                    Ejemplos: Rehabilitación de los Áreas verdes, Construcción de Estacionamiento, etc.)</label>
                <textarea id="descripcion_usos_multiples" name="descripcion_usos_multiples"
                    x-model="descripcion.d_espaciosUsosMultiples" rows="3"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></textarea>
                {{-- <input type="text" id="descripcion_usos_multiples" name="descripcion_usos_multiples"
                    x-model="descripcion.d_espaciosUsosMultiples"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" /> --}}
            </div>
        </div>
    </div>
</div>
