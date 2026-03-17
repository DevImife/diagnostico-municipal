<div data-step="6" x-show="step === 6" class="px-6">
    <div class="mb-6">
        <h2 class="text-2xl align-middle font-semibold text-vino dark:text-gray-100 text-center mt-6 break-normal">
            SERVICIOS DEL PLANTEL</h2>
    </div>
    <div class="mb-12">
        <h3 class="text-center text-lg font-semibold text-gray-900 dark:text-white">
            Clasificación de la Vialidad de Acceso
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
            <div
                class="relative bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600">
                <div>
                    <p class="font-semibold text-vino">Vialidad Primaria</p>
                    <ul class="list-disc list-inside ml-2 space-y-1">
                        <li>
                            <span class="font-medium">Zona Urbana:</span>
                            Avenidas rápidas, sin acceso directo a zonas habitacionales.
                        </li>
                        <li>
                            <span class="font-medium">Zona Rural:</span>
                            Autopistas y carreteras pavimentadas de 2 a 6 carriles,
                            con conexión interestatal o intermunicipal.
                        </li>
                    </ul>
                </div>
            </div>
            <div
                class="relative bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600">
                <div>
                    <p class="font-semibold text-vino">Vialidad Secundaria</p>
                    <ul class="list-disc list-inside ml-2 space-y-1">
                        <li>
                            <span class="font-medium">Zona Urbana:</span>
                            Calles con tránsito vehicular lento, que dan acceso
                            a colonias o zonas habitacionales.
                        </li>
                        <li>
                            <span class="font-medium">Zona Rural:</span>
                            Carreteras pavimentadas o revestidas de conexión municipal,
                            con velocidad aproximada entre 30 y 60 km/h.
                        </li>
                    </ul>
                </div>
            </div>
            <div
                class="relative bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600">
                <div>
                    <p class="font-semibold text-vino">Vialidad Terciaria</p>
                    <ul class="list-disc list-inside ml-2 space-y-1">
                        <li>
                            <span class="font-medium">Zona Urbana:</span>
                            Calles de baja velocidad dentro de colonias, con acceso
                            a estacionamientos colectivos, viviendas y comercio básico.
                        </li>
                        <li>
                            <span class="font-medium">Zona Rural:</span>
                            Caminos revestidos o de terracería para conexión municipal.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-start">
        {{-- card de apoyo --}}

        {{-- card 1 --}}
        <div
            class="relative  bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 ">
            <!-- Icono centrado arriba -->

            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-map-pin-plus-icon lucide-map-pin-plus">
                        <path
                            d="M19.914 11.105A7.298 7.298 0 0 0 20 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 1.202 0 32 32 0 0 0 .824-.738" />
                        <circle cx="12" cy="10" r="3" />
                        <path d="M16 18h6" />
                        <path d="M19 15v6" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="vialidadyacceso" class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Tipo de Vialidad de Acceso al Plantel
                </label>
                <div class="dark:text-white">
                    <input type="radio" id="accesoalplantel" name="accesoalplantel" value="Primaria"
                        class="accent-vino" x-model="servicios.tipo_vialidad">
                    <label class="py-2 px-2 text-left">Primaria</label>
                    <br>
                    <input type="radio" id="accesoalplantel" name="accesoalplantel" value="Secundaria"
                        class="accent-vino" x-model="servicios.tipo_vialidad" />
                    <label class="py-2 px-2 text-left">Secundaria</label>
                    <br>
                    <input type="radio" id="accesoalplantel" name="accesoalplantel" value="Terciaria"
                        class="accent-vino" x-model="servicios.tipo_vialidad" />
                    <label class="py-2 px-2 text-left">Terciaria</label>
                </div>
            </div>
        </div>
        {{-- card 2 --}}
        <div
            class="relative  bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600">
            <!-- Icono centrado arriba -->

            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-map-pin-plus-icon lucide-map-pin-plus">
                        <path
                            d="M19.914 11.105A7.298 7.298 0 0 0 20 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 1.202 0 32 32 0 0 0 .824-.738" />
                        <circle cx="12" cy="10" r="3" />
                        <path d="M16 18h6" />
                        <path d="M19 15v6" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="fotosdeacceso" class="block text-lg font-semibold text-gray-900 dark:text-white ">
                    Vialidad de Acceso al Plantel
                </label>
                <label for="fotosacceso" class="text-sm dark:text-white">Agregar Fotografías de la Vialidad en el Acceso
                    al Plantel</label>
                <p class="text-xs text-gray-500 dark:text-gray-400 mb-3">
                    Puedes subir hasta 5 imágenes
                </p>
                <div class="mt-4">
                    <!-- Estilo personalizado del input file -->
                    <label for="fotosacceso"
                        class="cursor-pointer inline-flex items-center justify-center w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-900 dark:border-gray-600 dark:text-white text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-paperclip">
                            <path d="M13.234 20.252 21 12.3" />
                            <path
                                d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486" />
                        </svg>
                        Seleccionar archivo
                    </label>

                    <input type="file" id="fotosacceso" name="fotosacceso" accept="image/*" class="hidden"
                        multiple
                        @change="

                                const files = Array.from($event.target.files);

                                if (files.length > 5) {
                                    notyf.error('Solo puedes subir máximo 5 imágenes');
                                    $event.target.value = '';
                                    return;
                                }
                                vialidadImagen= [];
                                servicios.archivo_vialidad =[];

                                files.forEach(file => {
                                    vialidadImagen.push(URL.createObjectURL(file));
                                    servicios.archivo_vialidad.push(file);
                                });
                            " />

                    <!-- Nombre del archivo -->
                    <p x-text="nombreImagenAcceso" class="mt-2 text-sm text-gray-500 dark:text-gray-300 truncate">
                    </p>

                    <!-- Vista previa -->
                    {{-- <template x-if="vialidadImagen">
                        <img :src="vialidadImagen" alt="Vista previa"
                            class="mt-2 w-48 h-48 object-cover rounded-lg border border-gray-300 dark:border-gray-600" />
                    </template> --}}

                    <div class="mt-4 grid grid-cols-2 md:grid-cols-3 gap-4" x-show="vialidadImagen.length > 0">
                        <template x-for="(img, index) in vialidadImagen" :key="index">
                            <div class="relative group">
                                <img :src="img"
                                    class="w-full h-32 object-cover rounded-lg border border-gray-300 dark:border-gray-600" />

                                <!-- Botón eliminar -->
                                <button type="button"
                                    @click="
                                    vialidadImagen.splice(index, 1);
                                    servicios.archivo_vialidad.splice(index, 1);
                                    "
                                    class="absolute top-2 right-2 bg-red-600 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition"
                                    title="Eliminar imagen">
                                    ✕
                                </button>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
        {{-- card 3 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center  transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 md:col-span-2">

            {{-- matriz --}}
            <label for="servicios"
                class="block text-lg font-semibold text-center text-gray-900 dark:text-white mb-4 md-2 item-center
                justify-center">
                Servicios Basicos del Plantel
            </label>
            <div class="overflow-x-auto w-full">
                <table class="min-w-full text-sm text-center text-gray-700 dark:text-gray-300">
                    <thead class="bg-gray-100 dark:bg-gray-800 text-xs uppercase">
                        <tr>
                            <th class="py-3 px-2 text-left"></th>
                            <th class="py-3 px-2">Si</th>
                            <th class="py-3 px-2">Bueno</th>
                            <th class="py-3 px-2">Regular</th>
                            <th class="py-3 px-2">Malo</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        <!-- agua -->
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Agua Potable</td>
                            <td><input type="radio" name="agua" value="si" class="accent-vino"
                                    x-model="servicios.agua_potable" /></td>
                            <td><input type="radio" name="agua" value="bueno" class="accent-vino"
                                    x-model="servicios.agua_potable" /></td>
                            <td><input type="radio" name="agua" value="regular" class="accent-vino"
                                    x-model="servicios.agua_potable" /></td>
                            <td><input type="radio" name="agua" value="malo" class="accent-vino"
                                    x-model="servicios.agua_potable" /></td>
                        </tr>
                        <!-- drenaje -->
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Drenaje Sanitario</td>
                            <td><input type="radio" name="drenaje" value="si" class="accent-vino"
                                    x-model="servicios.drenaje_sanitario" /></td>
                            <td><input type="radio" name="drenaje" value="bueno" class="accent-vino"
                                    x-model="servicios.drenaje_sanitario" /></td>
                            <td><input type="radio" name="drenaje" value="regular" class="accent-vino"
                                    x-model="servicios.drenaje_sanitario" /></td>
                            <td><input type="radio" name="drenaje" value="malo" class="accent-vino"
                                    x-model="servicios.drenaje_sanitario" /></td>
                        </tr>
                        {{-- energia --}}
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-2 px-2 text-left">Energía Eléctrica</td>
                            <td><input type="radio" name="energia" value="si" class="accent-vino"
                                    x-model="servicios.energia_electrica" /></td>
                            <td><input type="radio" name="energia" value="bueno" class="accent-vino"
                                    x-model="servicios.energia_electrica" /></td>
                            <td><input type="radio" name="energia" value="regular" class="accent-vino"
                                    x-model="servicios.energia_electrica" /></td>
                            <td><input type="radio" name="energia" value="malo" class="accent-vino"
                                    x-model="servicios.energia_electrica" /></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        {{-- card 4 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-6">
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-droplet-icon lucide-droplet">
                        <path
                            d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="reddeagua" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Red de Agua Potable
                </label>
                <select name="reddeagua" id="reddeagua"
                    class=" w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    x-model="servicios.red_agua_potable">
                    <option value="" disabled selected hidden class="text-gray-400">Elegir
                    </option>
                    <option value="redmunicipal">Red Municipal</option>
                    <option value="pozo">Pozo</option>
                    <option value="manantial">Manantial o Rio</option>
                    <option value="pipa">Pipa</option>
                    <option value="nocuenta">No Cuenta con Agua Potable</option>
                </select>
            </div>
        </div>
        {{-- card 5 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-6">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-map-pin-plus-icon lucide-map-pin-plus">
                        <path
                            d="M19.914 11.105A7.298 7.298 0 0 0 20 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 1.202 0 32 32 0 0 0 .824-.738" />
                        <circle cx="12" cy="10" r="3" />
                        <path d="M16 18h6" />
                        <path d="M19 15v6" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="fotosdeagua" class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Fotografía del Sistema de Agua Potable
                </label>
                <p class="text-xs text-gray-500 dark:text-gray-400 mb-3">
                    Puedes subir hasta 5 imágenes
                </p>
                <div class="mt-4">
                    <!-- Estilo personalizado del input file -->
                    <label for="fotosdeagua"
                        class="cursor-pointer inline-flex items-center justify-center w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-900 dark:border-gray-600 dark:text-white text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-paperclip">
                            <path d="M13.234 20.252 21 12.3" />
                            <path
                                d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486" />
                        </svg>
                        Seleccionar archivo
                    </label>
                    <!-- Input real oculto -->
                    <input type="file" id="fotosdeagua" name="fotosdeagua" accept="image/*" class="hidden"
                        multiple
                        @change="
                                const files = Array.from($event.target.files);

                                if (files.length > 5) {
                                    notyf.error('Solo puedes subir máximo 5 imágenes');
                                    $event.target.value = '';
                                    return;
                                }

                                sistemaAguaImagen = [];
                                servicios.fotografia_agua_potable = [];

                                files.forEach(file => {
                                    sistemaAguaImagen.push(URL.createObjectURL(file));
                                    servicios.fotografia_agua_potable.push(file);
                                });
                            " />

                    <!-- Nombre del archivo -->
                    <p x-text="nombreImagenAgua" class="mt-2 text-sm text-gray-500 dark:text-gray-300 truncate">
                    </p>

                    <!-- Vista previa -->
                    <div class="mt-4 grid grid-cols-2 md:grid-cols-3 gap-4" x-show="sistemaAguaImagen.length > 0">
                        <template x-for="(img, index) in sistemaAguaImagen" :key="index">
                            <div class="relative group">
                                <img :src="img"
                                    class="w-full h-32 object-cover rounded-lg border border-gray-300 dark:border-gray-600" />

                                <!-- Botón eliminar -->
                                <button type="button"
                                    @click="
                                    sistemaAguaImagen.splice(index, 1);
                                    servicios.fotografia_agua_potable.splice(index, 1);
                                    "
                                    class="absolute top-2 right-2 bg-red-600 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition"
                                    title="Eliminar imagen">
                                    ✕
                                </button>
                            </div>
                        </template>
                    </div>

                </div>
            </div>
        </div>
        {{-- card 6 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-6">
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-droplet-icon lucide-droplet">
                        <path
                            d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="tipo_drenaje" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Drenaje Sanitario
                </label>
                <select name="tipo_drenaje" id="tipo_drenaje"
                    class=" w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    x-model="servicios.tipo_drenaje">
                    <option value="" disabled selected hidden class="text-gray-400">Elegir
                    </option>
                    <option value="redmunicipal">Red Municipal</option>
                    <option value="letrinas">Letrinas</option>
                    <option value="rio">Río</option>
                    <option value="nocuenta">No cuenta con Drenaje Sanitario</option>
                </select>
            </div>
        </div>
        {{-- card 7 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-6">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-map-pin-plus-icon lucide-map-pin-plus">
                        <path
                            d="M19.914 11.105A7.298 7.298 0 0 0 20 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 1.202 0 32 32 0 0 0 .824-.738" />
                        <circle cx="12" cy="10" r="3" />
                        <path d="M16 18h6" />
                        <path d="M19 15v6" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="drenaje_imagen" class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Fotografía del Sistema de Drenaje
                </label>
                <p class="text-xs text-gray-500 dark:text-gray-400 mb-3">
                    Puedes subir hasta 5 imágenes
                </p>
                <div class="mt-4">
                    <!-- Estilo personalizado del input file -->
                    <label for="drenaje_imagen"
                        class="cursor-pointer inline-flex items-center justify-center w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-900 dark:border-gray-600 dark:text-white text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-paperclip">
                            <path d="M13.234 20.252 21 12.3" />
                            <path
                                d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486" />
                        </svg>
                        Seleccionar archivo
                    </label>
                    <!-- Input real oculto -->
                    <input type="file" id="drenaje_imagen" name="drenaje_imagen" accept="image/*" class="hidden"
                        multiple
                        @change="

                                const files = Array.from($event.target.files);

                                if (files.length > 5) {
                                    notyf.error('Solo puedes subir máximo 5 imágenes');
                                    $event.target.value = '';
                                    return;
                                }

                                sistemaDrenajeImagen = [];
                                servicios.fotografia_drenaje = [];

                                files.forEach(file => {
                                    sistemaDrenajeImagen.push(URL.createObjectURL(file));
                                    servicios.fotografia_drenaje.push(file);
                                });
                            " />

                    <!-- Nombre del archivo -->
                    <p x-text="nombreImagenDrenaje" class="mt-2 text-sm text-gray-500 dark:text-gray-300 truncate">
                    </p>
                    <!-- Vista previa -->
                    <div class="mt-4 grid grid-cols-2 md:grid-cols-3 gap-4" x-show="sistemaDrenajeImagen.length > 0">
                        <template x-for="(img, index) in sistemaDrenajeImagen" :key="index">
                            <div class="relative group">
                                <img :src="img"
                                    class="w-full h-32 object-cover rounded-lg border border-gray-300 dark:border-gray-600" />

                                <!-- Botón eliminar -->
                                <button type="button"
                                    @click="
                                    sistemaDrenajeImagen.splice(index, 1);
                                    servicios.fotografia_drenaje.splice(index, 1);
                                    "
                                    class="absolute top-2 right-2 bg-red-600 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition"
                                    title="Eliminar imagen">
                                    ✕
                                </button>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
        {{-- card 8 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-6">
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-zap-icon lucide-zap">
                        <path
                            d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="energiaeletrica" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Energía Eléctrica
                </label>
                <select name="energiaeletrica" id="energiaeletrica"
                    class=" w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    x-model="servicios.proveedor_energia">
                    <option value="" disabled selected hidden class="text-gray-400">Elegir
                    </option>
                    <option value="redmunicipal">C.F.E</option>
                    <option value="letrinas">Celdas Solares</option>
                    <option value="rio">Generador de Luz</option>
                    <option value="nocuenta">No Cuenta Con Energía Elétrica</option>
                </select>
            </div>
        </div>
        {{-- card 9 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-6">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-zap-icon lucide-zap">
                        <path
                            d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="foto_energia_electrica"
                    class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Fotografía del Sistema de Energía Eléctrica
                </label>
                <p class="text-xs text-gray-500 dark:text-gray-400 mb-3">
                    Puedes subir hasta 5 imágenes
                </p>
                <div class="mt-4">
                    <!-- Estilo personalizado del input file -->
                    <label for="foto_energia_electrica"
                        class="cursor-pointer inline-flex items-center justify-center w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-900 dark:border-gray-600 dark:text-white text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-paperclip">
                            <path d="M13.234 20.252 21 12.3" />
                            <path
                                d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486" />
                        </svg>
                        Seleccionar archivo
                    </label>
                    <!-- Input real oculto -->
                    <input type="file" id="foto_energia_electrica" name="foto_energia_electrica" accept="image/*"
                        multiple class="hidden"
                        @change="

                                const files = Array.from($event.target.files);

                                if (files.length > 5) {
                                    notyf.error('Solo puedes subir máximo 5 imágenes');
                                    $event.target.value = '';
                                    return;
                                }

                                sistemaEnergiaImagen = [];
                                servicios.fotografia_energia = [];

                                files.forEach(file => {
                                    sistemaEnergiaImagen.push(URL.createObjectURL(file));
                                    servicios.fotografia_energia.push(file);
                                });
                                
                            " />

                    <!-- Nombre del archivo -->
                    <p x-text="nombreImagenEnergia" class="mt-2 text-sm text-gray-500 dark:text-gray-300 truncate">
                    </p>

                    <!-- Vista previa -->
                    <div class="mt-4 grid grid-cols-2 md:grid-cols-3 gap-4" x-show="sistemaEnergiaImagen.length > 0">
                        <template x-for="(img, index) in sistemaEnergiaImagen" :key="index">
                            <div class="relative group">
                                <img :src="img"
                                    class="w-full h-32 object-cover rounded-lg border border-gray-300 dark:border-gray-600" />

                                <!-- Botón eliminar -->
                                <button type="button"
                                    @click="
                                  sistemaEnergiaImagen.splice(index, 1);
                                  servicios.fotografia_energia.splice(index, 1);
                                  "
                                    class="absolute top-2 right-2 bg-red-600 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition"
                                    title="Eliminar imagen">
                                    ✕
                                </button>
                            </div>
                        </template>
                    </div>

                </div>
            </div>
        </div>
        {{-- card 10 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center  transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 md:col-span-2">
            {{-- matriz --}}
            <label for="instalaciones" class="block text-lg font-semibold text-gray-900 dark:text-white mb-4"
                item="center" justify="center">
                Instalaciones Especiales</label>
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
                    <!-- Gas -->
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                        <td class="py-2 px-2 text-left">Gas</td>
                        <td><input type="radio" name="gas" value="bueno" class="accent-vino"
                                x-model="servicios.gas" /></td>
                        <td><input type="radio" name="gas" value="regular" class="accent-vino"
                                x-model="servicios.gas" /></td>
                        <td><input type="radio" name="gas" value="malo" class="accent-vino"
                                x-model="servicios.gas" /></td>
                        <td><input type="radio" name="gas" value="notiene" class="accent-vino"
                                x-model="servicios.gas" /></td>
                    </tr>
                    <!-- Aire Acondicionado -->
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                        <td class="py-2 px-2 text-left">Aire Acondicionado</td>
                        <td><input type="radio" name="aire_acondicionado" value="bueno" class="accent-vino"
                                x-model="servicios.aire_acondicionado" /></td>
                        <td><input type="radio" name="aire_acondicionado" value="regular" class="accent-vino"
                                x-model="servicios.aire_acondicionado" /></td>
                        <td><input type="radio" name="aire_acondicionado" value="malo" class="accent-vino"
                                x-model="servicios.aire_acondicionado" /></td>
                        <td><input type="radio" name="aire_acondicionado" value="notiene" class="accent-vino"
                                x-model="servicios.aire_acondicionado" /></td>
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- card 11 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-6">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-map-pin-plus-icon lucide-map-pin-plus">
                        <path
                            d="M19.914 11.105A7.298 7.298 0 0 0 20 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 1.202 0 32 32 0 0 0 .824-.738" />
                        <circle cx="12" cy="10" r="3" />
                        <path d="M16 18h6" />
                        <path d="M19 15v6" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="fotosinstalaciones"
                    class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Fotografía de las Instalaciones Especiales
                </label>
                <label for="fotosinstalaciones" class="dark:text-white">(Anexar Fotografía de la Instalación de Gas
                    y/o Aire Acondicionado)</label>
                <p class="text-xs text-gray-500 dark:text-gray-400 mb-3">
                    Puedes subir hasta 5 imágenes
                </p>
                <div class="mt-4">
                    <!-- Estilo personalizado del input file -->
                    <label for="fotosinstalaciones"
                        class="cursor-pointer inline-flex items-center justify-center w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-900 dark:border-gray-600 dark:text-white text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-paperclip">
                            <path d="M13.234 20.252 21 12.3" />
                            <path
                                d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486" />
                        </svg>
                        Seleccionar archivo
                    </label>
                    <!-- Input real oculto -->
                    <input type="file" id="fotosinstalaciones" name="fotosinstalaciones" accept="image/*"
                        multiple class="hidden"
                        @change="
                                const files = Array.from($event.target.files);

                                if (files.length > 5) {
                                    notyf.error('Solo puedes subir máximo 5 imágenes');
                                    $event.target.value = '';
                                    return;
                                }

                                sistemaEspecialImagen = [];
                                servicios.fotografia_especiales = [];

                                files.forEach(file => {
                                    sistemaEspecialImagen.push(URL.createObjectURL(file));
                                    servicios.fotografia_especiales.push(file);
                                });
                            " />

                    <!-- Nombre del archivo -->
                    <p x-text="nombreImagenEspeciales" class="mt-2 text-sm text-gray-500 dark:text-gray-300 truncate">
                    </p>

                    <!-- Vista previa -->
                    <div class="mt-4 grid grid-cols-2 md:grid-cols-3 gap-4" x-show="sistemaEspecialImagen.length > 0">
                        <template x-for="(img, index) in sistemaEspecialImagen" :key="index">
                            <div class="relative group">
                                <img :src="img"
                                    class="w-full h-32 object-cover rounded-lg border border-gray-300 dark:border-gray-600" />

                                <!-- Botón eliminar -->
                                <button type="button"
                                    @click="
                                    sistemaEspecialImagen.splice(index, 1);
                                    servicios.fotografia_especiales.splice(index, 1);
                                    "
                                    class="absolute top-2 right-2 bg-red-600 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition"
                                    title="Eliminar imagen">
                                    ✕
                                </button>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
        {{-- card 12 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center  transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 md:col-span-2">
            {{-- matriz --}}
            <label for="servicios" class="block text-lg font-semibold text-gray-900 dark:text-white mb-4"
                item="center" justify="center">
                Tecnologías De La Información Y Comunicación</label>
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
                    <!-- Telefonía -->
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                        <td class="py-2 px-2 text-left">Telefonía</td>
                        <td><input type="radio" name="telefonia" value="bueno" class="accent-vino"
                                x-model="servicios.telefonia" /></td>
                        <td><input type="radio" name="telefonia" value="regular" class="accent-vino"
                                x-model="servicios.telefonia" /></td>
                        <td><input type="radio" name="telefonia" value="malo" class="accent-vino"
                                x-model="servicios.telefonia" /></td>
                        <td><input type="radio" name="telefonia" value="notiene" class="accent-vino"
                                x-model="servicios.telefonia" /></td>
                    </tr>
                    <!-- Red de Voz y Datos -->
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                        <td class="py-2 px-2 text-left">Red de Voz y Datos</td>
                        <td><input type="radio" name="vozydatos" value="bueno" class="accent-vino"
                                x-model="servicios.red_voz_datos" /></td>
                        <td><input type="radio" name="vozydatos" value="regular" class="accent-vino"
                                x-model="servicios.red_voz_datos" /></td>
                        <td><input type="radio" name="vozydatos" value="malo" class="accent-vino"
                                x-model="servicios.red_voz_datos" /></td>
                        <td><input type="radio" name="vozydatos" value="notiene" class="accent-vino"
                                x-model="servicios.red_voz_datos" /></td>
                    </tr>
                    <!-- Internet -->
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                        <td class="py-2 px-2 text-left">Internet</td>
                        <td><input type="radio" name="internet" value="bueno" class="accent-vino"
                                x-model="servicios.internet" /></td>
                        <td><input type="radio" name="internet" value="regular" class="accent-vino"
                                x-model="servicios.internet" /></td>
                        <td><input type="radio" name="internet" value="malo" class="accent-vino"
                                x-model="servicios.internet" /></td>
                        <td><input type="radio" name="internet" value="notiene" class="accent-vino"
                                x-model="servicios.internet" /></td>
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- card 13 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-6">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-map-pin-plus-icon lucide-map-pin-plus">
                        <path
                            d="M19.914 11.105A7.298 7.298 0 0 0 20 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 1.202 0 32 32 0 0 0 .824-.738" />
                        <circle cx="12" cy="10" r="3" />
                        <path d="M16 18h6" />
                        <path d="M19 15v6" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="fotosdetecnologias"
                    class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Fotografía de las Tecnologías de la Información y Comunicación
                </label>
                <p class="text-xs text-gray-500 dark:text-gray-400 mb-3">
                    Puedes subir hasta 5 imágenes
                </p>
                <div class="mt-4">
                    <!-- Estilo personalizado del input file -->
                    <label for="fotosdetecnologias"
                        class="cursor-pointer inline-flex items-center justify-center w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-900 dark:border-gray-600 dark:text-white text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-paperclip">
                            <path d="M13.234 20.252 21 12.3" />
                            <path
                                d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486" />
                        </svg>
                        Seleccionar archivo
                    </label>
                    <!-- Input real oculto -->
                    <input type="file" id="fotosdetecnologias" name="fotosdetecnologias" accept="image/*"
                        multiple class="hidden"
                        @change="

                         const files = Array.from($event.target.files);

                                if (files.length > 5) {
                                    notyf.error('Solo puedes subir máximo 5 imágenes');
                                    $event.target.value = '';
                                    return;
                                }
                                sistemaTecnologiasImagen = [];
                                servicios.fotografia_tecnologias = [];

                                files.forEach(file => {
                                    sistemaTecnologiasImagen.push(URL.createObjectURL(file));
                                    servicios.fotografia_tecnologias.push(file);
                                });
                            " />

                    <!-- Nombre del archivo -->
                    <p x-text="nombreImagenTecno" class="mt-2 text-sm text-gray-500 dark:text-gray-300 truncate">
                    </p>

                    <!-- Vista previa -->
                    <div class="mt-4 grid grid-cols-2 md:grid-cols-3 gap-4"
                        x-show="sistemaTecnologiasImagen.length > 0">
                        <template x-for="(img, index) in sistemaTecnologiasImagen" :key="index">
                            <div class="relative group">
                                <img :src="img"
                                    class="w-full h-32 object-cover rounded-lg border border-gray-300 dark:border-gray-600" />

                                <!-- Botón eliminar -->
                                <button type="button"
                                    @click="
                                    sistemaTecnologiasImagen.splice(index, 1);
                                    servicios.fotografia_tecnologias.splice(index, 1);
                                    "
                                    class="absolute top-2 right-2 bg-red-600 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition"
                                    title="Eliminar imagen">
                                    ✕
                                </button>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
        {{-- card 14 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-6">
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
            <div class="mt-4 dark:text-white">
                <label for="otros" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    ACCESIBILIDAD
                </label>
                <br>
                <label for="anexarfotos">Rampas, Andadores, Pasamanos y Firmes exteriores en edificios</label>
                <div>
                    <input type="radio" id="accesibilidad_rampas" name="accesibilidad_rampas" value="completo"
                        class="accent-vino" x-model="servicios.accesibilidad" />
                    <label class="py-2 px-2 text-left">Completo</label>
                    <br>
                    <input type="radio" id="accesibilidad_rampas" name="accesibilidad_rampas" value="minimo"
                        class="accent-vino" x-model="servicios.accesibilidad" />
                    <label class="py-2 px-2 text-left">Minimo Requerido</label>
                    <br>
                    <input type="radio" id="accesibilidad_rampas" name="accesibilidad_rampas" value="nulo"
                        class="accent-vino" x-model="servicios.accesibilidad" />
                    <label class="py-2 px-2 text-left">Nulo</label>
                </div>
            </div>
        </div>
        {{-- card 17 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-6">
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
            <div class="mt-4 dark:text-white">
                <label for="otros" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Estado General de la Accesibilidad
                </label>
                <br>
                <div>
                    <input type="radio" id="estado_accesibilidad" name="estado_accesibilidad" value="bueno"
                        class="accent-vino" x-model="servicios.estado_general" />
                    <label class="py-2 px-2 text-left">Bueno</label>
                </div>
                <div>
                    <input type="radio" id="estado_accesibilidad" name="estado_accesibilidad" value="minimo"
                        class="accent-vino" x-model="servicios.estado_general" />
                    <label class="py-2 px-2 text-left">Regular</label>
                </div>
                <div>
                    <input type="radio" id="estado_accesibilidad" name="estado_accesibilidad" value="malo"
                        class="accent-vino" x-model="servicios.estado_general" />
                    <label class="py-2 px-2 text-left">Malo</label>
                </div>
            </div>
        </div>
        {{-- card 18 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-6">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-camera-icon lucide-camera">
                        <path
                            d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z" />
                        <circle cx="12" cy="13" r="3" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="imagen_accesibilidad"
                    class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Fotografías de la Accesibilidad a Personas con Discapacidad
                </label>
                <p class="text-xs text-gray-500 dark:text-gray-400 mb-3">
                    Puedes subir hasta 5 imágenes
                </p>
                <div class="mt-4">
                    <!-- Estilo personalizado del input file -->
                    <label for="imagen_accesibilidad"
                        class="cursor-pointer inline-flex items-center justify-center w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-900 dark:border-gray-600 dark:text-white text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-paperclip">
                            <path d="M13.234 20.252 21 12.3" />
                            <path
                                d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486" />
                        </svg>
                        Seleccionar archivo
                    </label>
                    <!-- Input real oculto -->
                    <input type="file" id="imagen_accesibilidad" name="imagen_accesibilidad" accept="image/*"
                        multiple class="hidden"
                        @change="

                                const files = Array.from($event.target.files);

                                if (files.length > 5) {
                                    notyf.error('Solo puedes subir máximo 5 imágenes');
                                    $event.target.value = '';
                                    return;
                                }

                                sistemaAccesibilidadImagen = [];
                                servicios.fotografias_accesibilidad = [];

                                files.forEach(file => {
                                    sistemaAccesibilidadImagen.push(URL.createObjectURL(file));
                                    servicios.fotografias_accesibilidad.push(file);
                                });
                            " />

                    <!-- Nombre del archivo -->
                    <p x-text="nombreImagenAccesibilidad"
                        class="mt-2 text-sm text-gray-500 dark:text-gray-300 truncate">
                    </p>

                    <!-- Vista previa -->
                    <div class="mt-4 grid grid-cols-2 md:grid-cols-3 gap-4"
                        x-show="sistemaAccesibilidadImagen.length > 0">
                        <template x-for="(img, index) in sistemaAccesibilidadImagen" :key="index">
                            <div class="relative group">
                                <img :src="img"
                                    class="w-full h-32 object-cover rounded-lg border border-gray-300 dark:border-gray-600" />

                                <!-- Botón eliminar -->
                                <button type="button"
                                    @click="
                                    sistemaAccesibilidadImagen.splice(index, 1);
                                    servicios.fotografias_accesibilidad.splice(index, 1);
                                    "
                                    class="absolute top-2 right-2 bg-red-600 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition"
                                    title="Eliminar imagen">
                                    ✕
                                </button>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
