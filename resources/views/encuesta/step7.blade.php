<div data-step="7" x-show="step === 7" class="px-7">
    <div class="mb-12">
        <h2 class="text-2xl align-middle font-semibold text-vino dark:text-gray-100 text-center mt-6 break-normal">
            SERVICIOS SANITARIOS</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
        {{-- card 1 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-4 md:col-span-1">
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-toilet-icon lucide-toilet">
                        <path
                            d="M7 12h13a1 1 0 0 1 1 1 5 5 0 0 1-5 5h-.598a.5.5 0 0 0-.424.765l1.544 2.47a.5.5 0 0 1-.424.765H5.402a.5.5 0 0 1-.424-.765L7 18" />
                        <path d="M8 18a5 5 0 0 1-5-5V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="sanitarios" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Sanitarios
                </label>
                <select name="sanitarios" id="sanitarios" x-model="tipoSeleccionado"
                    class=" w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    <option value="" disabled selected hidden class="text-gray-400">Elegir
                    </option>
                    <option value="alumnas">Alumnas</option>
                    <option value="alumnos">Alumnos</option>
                    <option value="maestras">Maestras</option>
                    <option value="maestros">Maestros</option>
                    <option value="discapacidad_alumno">Alumnos con Discapacidad</option>
                    <option value="discapacidad_alumna">Alumnas con Discapacidad</option>
                </select>
            </div>
        </div>

        {{-- card 2 --}}
        <div x-show="tipoSeleccionado"
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center  transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 md:col-span-3">

            <template x-if="tipoSeleccionado">
                <div>
                    <h2 class="text-lg font-semibold text-vino mb-4 dark:text-white"
                        x-text="'Componentes para ' + etiquetas[tipoSeleccionado]"></h2>

                    <label class="text-sm">Selecciona el número de componentes en las columnas</label>

                    <table class="min-w-full text-sm text-center text-gray-700 dark:text-gray-300 mt-3">
                        <thead class="bg-gray-100 dark:bg-gray-800 text-xs uppercase">
                            <tr>
                                <th class="py-3 px-2 text-left"></th>
                                <th class="py-3 px-2">0</th>
                                <th class="py-3 px-2">1</th>
                                <th class="py-3 px-2">2</th>
                                <th class="py-3 px-2">3</th>
                                <th class="py-3 px-2">4</th>
                                <th class="py-3 px-2">5</th>
                                <th class="py-3 px-2">6</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <template x-for="(componente, idx) in componentesVisibles" :key="idx">
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                    <td class="py-2 px-2 text-left" x-text="componente"></td>
                                    <template x-for="n in rango" :key="n">
                                        <td>
                                            <input type="radio" :name="tipoSeleccionado + '_' + componente"
                                                :value="n" class="accent-vino"
                                                x-model="respuestas[tipoSeleccionado][componente]">
                                        </td>
                                    </template>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </template>
        </div>
        {{-- card 3 --}}

        <div x-show="tipoSeleccionado"
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center  
           transition-transform transform hover:-translate-y-2 hover:shadow-lg 
           duration-300 border border-transparent dark:border-gray-600 md:col-span-3">

            <template x-if="tipoSeleccionado">
                <div>
                    <label class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Estado Físico
                    </label>
                    <label class="block mb-2">
                        (Seleccionar el estado físico de los componentes)
                    </label>

                    <table class="min-w-full text-sm text-center text-gray-700 dark:text-gray-300">
                        <thead class="bg-gray-100 dark:bg-gray-800 text-xs uppercase">
                            <tr>
                                <th class="py-3 px-2 text-left"></th>
                                <th class="py-3 px-2">Bueno</th>
                                <th class="py-3 px-2">Regular</th>
                                <th class="py-3 px-2">Malo</th>
                                <th class="py-3 px-2">No Tiene</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                            <!-- Recorremos dinámicamente los campos de estado_fisico -->
                            {{-- <template x-for="(valor, key) in estado_fisico[tipoSeleccionado]" :key="key"> --}}
                            <template x-for="key in estadoFisicoKeysVisibles" :key="key">
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                    <td class="py-2 px-2 text-left capitalize" x-text="key.replaceAll('_', ' ')"></td>

                                    <td>
                                        <input type="radio" :name="tipoSeleccionado + '_' + key" value="bueno"
                                            class="accent-vino" x-model="estado_fisico[tipoSeleccionado][key]">
                                    </td>

                                    <td>
                                        <input type="radio" :name="tipoSeleccionado + '_' + key" value="regular"
                                            class="accent-vino" x-model="estado_fisico[tipoSeleccionado][key]">
                                    </td>

                                    <td>
                                        <input type="radio" :name="tipoSeleccionado + '_' + key" value="malo"
                                            class="accent-vino" x-model="estado_fisico[tipoSeleccionado][key]">
                                    </td>

                                    <td>
                                        <input type="radio" :name="tipoSeleccionado + '_' + key" value="notiene"
                                            class="accent-vino" x-model="estado_fisico[tipoSeleccionado][key]">
                                    </td>
                                </tr>
                            </template>

                        </tbody>
                    </table>
                </div>
            </template>
        </div>

        {{-- card 4 --}}
        <div x-show="['alumnos','maestros','discapacidad_alumno'].includes(tipoSeleccionado)"
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-4">

            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-toilet-icon lucide-toilet">
                        <path
                            d="M7 12h13a1 1 0 0 1 1 1 5 5 0 0 1-5 5h-.598a.5.5 0 0 0-.424.765l1.544 2.47a.5.5 0 0 1-.424.765H5.402a.5.5 0 0 1-.424-.765L7 18" />
                        <path d="M8 18a5 5 0 0 1-5-5V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8" />
                    </svg>
                </div>
            </div>

            <div class="mt-4">
                <label for="descarga" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Tipo de Descarga de los Mingitorios
                </label>
                <label for="mingitorios">(Seleccionar el tipo de descarga en los mingitorios)</label>
                <select name="sanitarios" id="sanitarios" x-model="tipo_descarga[tipoSeleccionado]"
                    class=" w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    <option value="" disabled selected hidden class="text-gray-400">Elegir</option>
                    <option value="Humeda">Húmeda</option>
                    <option value="Seca">Seca</option>
                </select>
            </div>
        </div>
    </div>
</div>
