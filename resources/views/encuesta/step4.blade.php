<!-- Paso 4 -->
<div data-step="4" x-show="step === 4" class="px-6">
    <div class="mb-12">
        <h2 class="text-2xl align-middle font-semibold text-vino dark:text-gray-100 text-center mt-6 break-normal">
            EMPLAZAMIENTO Y ENTORNO, POSIBLES AMENAZAS</h2>
    </div>
    <!-- Cards aquí -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
        <div class="overflow-x-auto rounded-xl border border-gray-300 dark:border-gray-700 ">
            {{-- matriz --}}
            <table class="min-w-full text-sm text-center text-gray-700 dark:text-gray-300">
                <thead class="bg-gray-100 dark:bg-gray-800 text-xs uppercase">
                    <tr>
                        <th class="py-3 px-2 text-left">Amenaza</th>
                        <template x-for="d in distancias" :key="d">
                            <th class="py-3 px-2" x-text="d === '0' ? 'Sin Amenaza' : d + ' Mts.'"></th>
                        </template>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    <template x-for="(a, i) in amenazas" :key="i">
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <!-- Nombre de la amenaza -->
                            <td class="py-2 px-2 text-left" x-text="a"></td>
                            <!-- Radios dinámicos -->
                            <template x-for="d in distancias" :key="d">
                                <td>
                                    <input type="radio" :name="a" :value="d"
                                        x-model="seleccion[a]" class="accent-vino" />
                                </td>
                            </template>
                        </tr>
                    </template>
                </tbody>
            </table>

            <p class="text-sm italic text-gray-500 dark:text-gray-400 mt-2 px-2">
                (Seleccionar la Distancia Aproximada)
            </p>

            {{-- <div class="mt-4">
                <pre x-text="JSON.stringify(seleccion, null, 2)"></pre>
            </div> --}}
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
            {{-- card 1 --}}
            <div
                class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
                <!-- Icono centrado arriba -->
                <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                    <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                        <!-- Ícono Lucide o Heroicons -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-info-icon lucide-info">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M12 16v-4" />
                            <path d="M12 8h.01" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="otrosElementos" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Otros
                    </label>
                    <input type="text" id="otrosElementos" name="otrosElementos"
                        x-model="otrasAmenazas.otrosElementos"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                </div>
            </div>
            {{-- card 2 --}}
            <div
                class="relative bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-4">

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
                <div class="mt-4">
                    <label for="entornoyamenazas"
                        class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Entorno y Posibles Amenazas
                    </label>
                    <p>Puedes seleccionar hasta 5 archivos</p>

                    <!-- Botón personalizado -->
                    <label for="entornoyamenazas"
                        class="cursor-pointer inline-flex items-center justify-center w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-900 dark:border-gray-600 dark:text-white text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-paperclip">
                            <path d="M13.234 20.252 21 12.3" />
                            <path
                                d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486" />
                        </svg>
                        Seleccionar archivos
                    </label>

                    <!-- Input real oculto -->
                    <input type="file" id="entornoyamenazas" name="entornoyamenazas" accept="image/*" multiple
                        class="hidden"
                        @change="
                                const files = Array.from($event.target.files);

                                if (files.length > 5) {
                                    notyf.error('Solo puedes subir máximo 5 imágenes');
                                    $event.target.value = '';
                                    return;
                                }

                                preview = [];
                                otrasAmenazas.imagenAmenaza = [];

                                files.forEach(file => {
                                    preview.push(URL.createObjectURL(file));
                                    otrasAmenazas.imagenAmenaza.push(file);
                                });
                            " />

                    <!-- Nombre del archivo -->
                    <p x-text="nombreArchivo" class="mt-2 text-sm text-gray-500 dark:text-gray-300 truncate">
                    </p>

                    {{-- <p x-text="nombreArchivo" class="mt-2 text-sm text-gray-500 dark:text-gray-300">
                        <span x-text="otrasAmenazas.imagenAmenaza.length"></span> / 5 archivos seleccionados
                    </p> --}}

                    <!-- Vista previa -->

                    <div class="mt-4 grid grid-cols-2 md:grid-cols-3 gap-4" x-show="preview.length > 0">
                        <template x-for="(img, index) in preview" :key="index">
                            <div class="relative group">
                                <img :src="img"
                                    class="w-full h-32 object-cover rounded-lg border border-gray-300 dark:border-gray-600" />

                                <!-- Botón eliminar -->
                                <button type="button"
                                    @click="
                                    preview.splice(index, 1);
                                    otrasAmenazas.imagenAmenaza.splice(index, 1);
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

            {{-- texto del predio --}}
            <div class="col-span-full text-sm  text-gray-500 dark:text-gray-400 mt-2 px-2">
                <h2
                    class="text-2xl align-middle font-semibold text-vino dark:text-gray-100 text-center mt-6 break-normal">
                    DATOS GENERALES DEL PREDIO </h2>
            </div>

            <div
                class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
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
                    <label for="superficieTerreno" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Superficie Total del Terreno M2
                    </label>
                    <input type="number" id="superficieTerreno" name="superficieTerreno"
                        x-model="predio.superficieTerreno"
                        oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10);"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                </div>
            </div>
            <div
                class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
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
                    <label for="superficieDesplante" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Superficie de Desplante de Edificios M2
                    </label>
                    <input type="number" id="superficieDesplante" name="superficieDesplante"
                        x-model="predio.superficieDesplante"
                        oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10);"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                </div>
            </div>
            <div
                class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
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
                    <label for="superficieConstruida"
                        class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Superficie Construida de Edificios M2
                    </label>
                    <input type="number" id="superficieConstruida" name="superficieConstruida"
                        x-model="predio.superficieConstruida"
                        oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10);"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                </div>
            </div>
            <div
                class="relative bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-4">
                <!-- Icono centrado arriba -->
                <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                    <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
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
                    <label for="medidasColindancia"
                        class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Indique las medidas y colindancias
                    </label>
                    <textarea id="medidasColindancia" name="medidasColindancia" x-model="predio.medidasColindancia" rows="3"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></textarea>
                    <!-- Estilo personalizado del input file -->
                </div>
            </div>
        </div>
    </div>

</div>
