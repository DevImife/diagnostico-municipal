<!-- Paso 1 -->
<div data-step="1" x-show="step === 1" class="px-6">
    <div class="mb-12">
        <h2 class="text-2xl align-middle font-semibold text-vinoClaro dark:text-gray-100 text-center mt-6 break-normal">
            DATOS de la C.C.T.</h2>
    </div>
    <!-- Cards aquí -->
    <div class="mt-4 flex flex-col md:flex-row items-start md:space-x-4 space-y-4 md:space-y-0">
        {{-- card 1 --}}
        <div class="w-full md:w-1/2 flex justify-center">
            <div
                class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 w-3/4">
                <!-- Icono -->
                <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                    <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-book-key">
                            <path d="m19 3 1 1" />
                            <path d="m20 2-4.5 4.5" />
                            <path d="M20 7.898V21a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20" />
                            <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2h7.844" />
                            <circle cx="14" cy="8" r="2" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="cct_encuesta" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        C.C.T.
                    </label>
                    <input type="text" id="cct_encuesta" name="cct_encuesta" placeholder="Ej. 15DPB0034O"
                        maxlength="10" x-model="cct" {{-- @change="if (cct.trim().length === 10) mostrarDatos(cct)" --}}
                        @change="if (cct.trim().length === 10) mostrarDatos(cct);else tieneDatos = false"
                        oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10);"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 
                           focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent 
                           transition dark:bg-gray-950 dark:border-gray-600 
                           dark:placeholder-gray-400 dark:text-white" />
                </div>
            </div>
        </div>

        {{-- card 2 --}}
        <div class="w-full md:w-1/2 flex justify-center">
            <div
                class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 w-full mt-4 md:mt-0">
                <!-- Icono -->
                <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                    <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-school">
                            <path d="M14 22v-4a2 2 0 1 0-4 0v4" />
                            <path
                                d="m18 10 3.447 1.724a1 1 0 0 1 .553.894V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-7.382a1 1 0 0 1 .553-.894L6 10" />
                            <path d="M18 5v17" />
                            <path d="m4 6 7.106-3.553a2 2 0 0 1 1.788 0L20 6" />
                            <path d="M6 5v17" />
                            <circle cx="12" cy="9" r="2" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="nombre_plantel_encuesta"
                        class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Nombre del Plantel
                    </label>
                    <input type="text" id="nombre_plantel_encuesta" name="nombre_plantel_encuesta" readonly
                        placeholder="Ej. Instituto"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 
                           focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent 
                           transition dark:bg-gray-950 dark:border-gray-600 
                           dark:placeholder-gray-400 dark:text-white" />
                </div>
            </div>
        </div>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start mt-12" x-show="tieneDatos && !editando" x-transition>

        {{-- <div class="mb-12 p-2">
            <h2
                class="text-2xl align-middle font-semibold text-vinoClaro dark:text-gray-100 text-center mt-6 break-normal">
                DATOS DEL PLANTEL</h2>
        </div> --}}
        {{-- nuevos datos --}}
        {{-- card 1 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 p-2">
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
                <label for="municipio_encuesta" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Municipio
                </label>
                <input type="text" id="municipio_encuesta" name="municipio_encuesta" placeholder="Ej. Instituto"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 
                           focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent 
                           transition dark:bg-gray-950 dark:border-gray-600 
                           dark:placeholder-gray-400 dark:text-white" />
            </div>
        </div>
        {{-- card 2 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 p-2">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="lucide lucide-ruler-dimension-line-icon lucide-ruler-dimension-line">
                        <path d="M12 15v-3.014" />
                        <path d="M16 15v-3.014" />
                        <path d="M20 6H4" />
                        <path d="M20 8V4" />
                        <path d="M4 8V4" />
                        <path d="M8 15v-3.014" />
                        <rect x="3" y="12" width="18" height="7" rx="1" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="latitud_encuesta" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Latitud
                </label>
                <input type="number" id="latitud_encuesta" name="latitud_encuesta" placeholder="Ej. 23.634501"
                    step="0.000001" min="-90" max="90" x-model="datosEditar.latitudEdicion"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
            </div>
        </div>
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 p-2">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-ruler-icon lucide-ruler">
                        <path
                            d="M21.3 15.3a2.4 2.4 0 0 1 0 3.4l-2.6 2.6a2.4 2.4 0 0 1-3.4 0L2.7 8.7a2.41 2.41 0 0 1 0-3.4l2.6-2.6a2.41 2.41 0 0 1 3.4 0Z" />
                        <path d="m14.5 12.5 2-2" />
                        <path d="m11.5 9.5 2-2" />
                        <path d="m8.5 6.5 2-2" />
                        <path d="m17.5 15.5 2-2" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="longitud_encuesta" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Longitud
                </label>
                <input type="number" id="longitud_encuesta" name="longitud_encuesta" placeholder="Ej. -102.552788"
                    step="0.000001" min="-180" max="180" x-model="datosEditar.longitudEdicion"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
            </div>
        </div>
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-map-pin-house-icon lucide-map-pin-house">
                        <path
                            d="M15 22a1 1 0 0 1-1-1v-4a1 1 0 0 1 .445-.832l3-2a1 1 0 0 1 1.11 0l3 2A1 1 0 0 1 22 17v4a1 1 0 0 1-1 1z" />
                        <path d="M18 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 .601.2" />
                        <path d="M18 22v-3" />
                        <circle cx="10" cy="10" r="3" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="domicilio_encuesta" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Domicilio
                </label>
                <input type="text" id="domicilio_encuesta" name="domicilio_encuesta" placeholder="Domicilio"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
            </div>
        </div>
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-6">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-phone-outgoing-icon lucide-phone-outgoing">
                        <path d="m16 8 6-6" />
                        <path d="M22 8V2h-6" />
                        <path
                            d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="telefono_encuesta" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Teléfono
                </label>
                <input type="number" id="telefono_encuesta" name="telefono_encuesta" placeholder="Teléfono"
                    oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10);"
                    x-model="datosEditar.telefonoEdicion"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
            </div>
        </div>
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-6">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-milestone-icon lucide-milestone">
                        <path d="M12 13v8" />
                        <path d="M12 3v3" />
                        <path
                            d="M4 6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h13a2 2 0 0 0 1.152-.365l3.424-2.317a1 1 0 0 0 0-1.635l-3.424-2.318A2 2 0 0 0 17 6z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="codigo_postal_encuesta" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Código Postal
                </label>
                <input type="number" id="codigo_postal_encuesta" name="codigo_postal_encuesta"
                    placeholder="Código Postal"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
            </div>
        </div>
        <div
            class="relative bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-6">

            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-file-image-icon lucide-file-image">
                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                        <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                        <circle cx="10" cy="12" r="2" />
                        <path d="m20 17-1.296-1.296a2.41 2.41 0 0 0-3.408 0L9 22" />
                    </svg>
                </div>
            </div>

            {{-- <div class="mt-4">
                <label for="fachada_encuesta" class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Fachada del Plantel
                </label>

                <!-- Estilo personalizado del input file -->
                <label for="fachada_encuesta"
                    class="cursor-pointer inline-flex items-center justify-center w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-900 dark:border-gray-600 dark:text-white text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-paperclip">
                        <path d="M13.234 20.252 21 12.3" />
                        <path
                            d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486" />
                    </svg>
                    Seleccionar archivo
                </label>

                <!-- Input real oculto -->
                <input type="file" id="fachada_encuesta" name="fachada_encuesta" accept="image/*" class="hidden"
                    @change="
                                if ($event.target.files.length > 0) {
                                    const file = $event.target.files[0];
                                    fachadaEncuesta = URL.createObjectURL(file);
                                    datosEditar.fachadaEdicion = file.name; // guarda el nombre
                                }
                            " />

                <!-- Nombre del archivo -->
                <p x-text="datosEditar.fachadaEdicion" class="mt-2 text-sm text-gray-500 dark:text-gray-300 truncate">
                </p>

                <!-- Vista previa -->
                <template x-if="fachadaEncuesta" id="contenedor_input">
                    <img :src="fachadaEncuesta" alt="Vista previa"
                        class="mt-2 w-48 h-48 object-cover rounded-lg border border-gray-300 dark:border-gray-600" />
                </template>
            </div> --}}

            <div class="mt-4">
                <!-- Mostrar input si NO hay fachada guardada -->
                <template x-if="!fachadaGuardada">
                    <div id="contenedor_input">
                        <label for="fachada_encuesta"
                            class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                            Fachada del Plantel
                        </label>

                        <label for="fachada_encuesta"
                            class="cursor-pointer inline-flex items-center justify-center w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-900 dark:border-gray-600 dark:text-white text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-paperclip mr-2">
                                <path d="M13.234 20.252 21 12.3" />
                                <path
                                    d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486" />
                            </svg>
                            Seleccionar archivo
                        </label>

                        <input type="file" id="fachada_encuesta" name="fachada_encuesta" accept="image/*"
                            class="hidden"
                            @change="
                                    if ($event.target.files.length > 0) {
                                      const file = $event.target.files[0];
                                      fachadaEncuesta = URL.createObjectURL(file);
                                    }
                                  " />

                        <template x-if="fachadaEncuesta">
                            <img :src="fachadaEncuesta" alt="Vista previa"
                                class="mt-2 w-48 h-48 object-cover rounded-lg border border-gray-300 dark:border-gray-600" />
                        </template>
                    </div>
                </template>

                <!-- Mostrar fachada guardada -->
                <template x-if="fachadaGuardada">
                    <div class="relative">
                        <label class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                            Fachada actual
                        </label>
                        <img :src="fachadaGuardada" alt="Fachada del Plantel"
                            class="w-64 h-64 object-cover rounded-lg shadow-md border border-gray-300 dark:border-gray-600">
                        <button type="button" @click="cambiarFachada"
                            class="absolute top-2 right-2 bg-gray-800 text-white text-sm px-2 py-1 rounded-lg hover:bg-gray-700 mt-12">
                            Cambiar
                        </button>
                    </div>
                </template>
            </div>





        </div>
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-6">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-hand-coins-icon lucide-hand-coins">
                        <path d="M11 15h2a2 2 0 1 0 0-4h-3c-.6 0-1.1.2-1.4.6L3 17" />
                        <path
                            d="m7 21 1.6-1.4c.3-.4.8-.6 1.4-.6h4c1.1 0 2.1-.4 2.8-1.2l4.6-4.4a2 2 0 0 0-2.75-2.91l-4.2 3.9" />
                        <path d="m2 16 6 6" />
                        <circle cx="16" cy="9" r="2.9" />
                        <circle cx="6" cy="5" r="3" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="edad_inmueble" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Edad Aproximada Del Plantel
                </label>
                <input type="number" id="edad_inmueble" name="edad_inmueble"
                    oninput="if(this.value.length > 5) this.value = this.value.slice(0, 5);"
                    x-model="datosEditar.EdadEdicion"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
            </div>
        </div>
        {{-- card 3 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-4">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-brick-wall-icon lucide-brick-wall">
                        <rect width="18" height="18" x="3" y="3" rx="2" />
                        <path d="M12 9v6" />
                        <path d="M16 15v6" />
                        <path d="M16 3v6" />
                        <path d="M3 15h18" />
                        <path d="M3 9h18" />
                        <path d="M8 15v6" />
                        <path d="M8 3v6" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="ambito" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Ámbito
                </label>
                <input type="text" id="ambito" name="ambito"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />

            </div>
        </div>
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-4">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-square-kanban-icon lucide-square-kanban">
                        <rect width="18" height="18" x="3" y="3" rx="2" />
                        <path d="M8 7v7" />
                        <path d="M12 7v4" />
                        <path d="M16 7v9" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="catalogo" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    ¿El Plantel Esta Catalogado Por El I.N.A.H. O I.N.B.A.?
                </label>
                <select id="catalogo" name="catalogo"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-vino focus:border-vino block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vino dark:focus:border-vino"
                    x-model="datosEditar.catalogadoEdicion">

                    <option value="" disabled selected class="text-sm text-gray-500">
                        Seleccione una opción</option>
                    <option value="Si">Si
                    <option value="No">No
                    <option value="Sin Dato">Sin Dato
                </select>
            </div>
        </div>
    </div>
</div>
