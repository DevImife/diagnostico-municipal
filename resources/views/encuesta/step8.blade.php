<div data-step="8" x-show="step === 8" class="px-8">
    <div class="mb-12">
        <h2 class="text-2xl align-middle font-semibold text-vino dark:text-gray-100 text-center mt-6 break-normal">
            INFRAESTRUCTURA FÍSICA</h2>
    </div>

    <div class="relative w-full overflow-hidden dark:text-white">
        <template x-for="(edificio, index) in edificios" :key="edificio">
            <div x-show="currentIndex === index" class="grid grid-cols-1 lg:grid-cols-5 gap-6">

                <!-- Columna 1: Tabla (3/5 en grande) -->
                <div class="lg:col-span-3 transition-transform duration-500">
                    <div
                        class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center border dark:border-gray-600">
                        <label class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                            EDIFICIO <span x-text="edificio"></span>
                        </label>

                        <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
                            <table class="min-w-full text-sm text-center text-gray-700 dark:text-gray-300">
                                <thead class="bg-gray-100 dark:bg-gray-800 text-xs uppercase">
                                    <tr>
                                        <td class="py-2 px-2 text-left">Espacio</td>
                                        <template x-for="nEspacios in numero_espacios" :key="nEspacios">
                                            <th class="py-3 px-2 whitespace-nowrap" x-text="nEspacios"></th>
                                        </template>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <template x-for="esp in nombre_espacio" :key="esp">
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                            <td class="py-2 px-2 text-left font-medium" x-text="esp"></td>
                                            <template x-for="oe in numero_espacios" :key="esp + '_' + oe">
                                                <td class="px-2 py-2">
                                                    <input type="radio" :name="esp + '_' + edificio"
                                                        :value="oe" class="accent-vino w-4 h-4"
                                                        x-model="respuesta_espacios[edificio][esp]">
                                                </td>
                                            </template>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Columna 2: Inputs/cards (2/5 en grande) -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Input 1 -->
                    <div
                        class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
                        <!-- Icono centrado arriba -->
                        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                            <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                                <!-- Ícono Lucide o Heroicons -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-house-icon lucide-house">
                                    <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                                    <path
                                        d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="espacios" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                Si cualquier espacio es mayor de 7, especificar el número exacto:
                            </label>
                            <input type="text" id="espacios" name="espacios" x-model="datosExtra[edificio].espacios"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                        </div>
                    </div>


                    <!-- Input 2 -->
                    <div
                        class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
                        <!-- Icono centrado arriba -->
                        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                            <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                                <!-- Ícono Lucide o Heroicons -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-house-icon lucide-house">
                                    <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                                    <path
                                        d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="otroespacios" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                En caso de contar con otros Espacios, especificar cuales son:
                            </label>
                            <input type="text" id="otroespacios" name="otroespacios"
                                x-model="datosExtra[edificio].otros"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                        </div>
                    </div>


                    <!-- Input 3 -->
                    <div
                        class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
                        <!-- Icono centrado arriba -->
                        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                            <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                                <!-- Ícono Lucide o Heroicons -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-house-icon lucide-house">
                                    <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                                    <path
                                        d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="totalespacios"
                                class="block text-lg font-semibold text-gray-900 dark:text-white ">
                                Total de Espacios
                            </label>
                            <label for="totalespacios" class="text-sm">(Colocar la Suma de todos los espacios que
                                conforman el edificio)</label>
                            <input type="number" id="totalespacios" name="totalespacios"
                                x-model="datosExtra[edificio].total_espacios"
                                oninput="if(this.value.length > 2) this.value = this.value.slice(0, 2);"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
            {{-- card 6 --}}
            <div
                class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
                <!-- Icono centrado arriba -->
                <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                    <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                        <!-- Ícono Lucide o Heroicons -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-house-icon lucide-house">
                            <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                            <path
                                d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="edadedificio" class="block text-lg font-semibold text-gray-900 dark:text-white ">
                        Edad del Edificio
                    </label>
                    <label for="edadedificio" class="text-sm">(Anotar el número de años desde que se construyó el
                        edificio)</label>

                    <input type="number" id="edadedificio" name="edadedificio" placeholder="Ej. 25"
                        x-model="datosExtra[edificio].edad"
                        oninput="if(this.value.length > 5) this.value = this.value.slice(0, 5);"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
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
                            stroke-linejoin="round" class="lucide lucide-house-icon lucide-house">
                            <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                            <path
                                d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">

                    <label for="tipoestructura" class="block text-lg font-semibold text-gray-900 dark:text-white">
                        Tipo de Estructura
                    </label>
                    <label for="tipoestructura" class="text-sm">(Seleccionar el tipo de estructura del
                        edificio)</label>

                    <select name="tipoestructura" id="tipoestructura" x-model="datosExtra[edificio].estructura"
                        class=" w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value="" disabled selected hidden class="text-gray-400">Elegir
                        </option>
                        <option value="regional">Regional</option>
                        <option value="tradicional">Tradicional</option>
                        <option value="u1c">U-1C</option>
                        <option value="u2c">U-2C</option>
                        <option value="tipo">Tipo C.A.P.F.C.E</option>
                        <option value="atipico">Atípico</option>
                    </select>
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
                            stroke-linejoin="round" class="lucide lucide-house-icon lucide-house">
                            <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                            <path
                                d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">

                    <label for="entrejeejes" class="block text-lg font-semibold text-gray-900 dark:text-white">
                        Número de Entre Ejes
                    </label>
                    <label for="entrejeejes" class="text-sm">(Un entre eje se considera aproximadamente cada 3.24 mts
                        de ancho x 8 mts de largo)</label>

                    <select name="entrejeejes" id="entrejeejes" x-model="datosExtra[edificio].ejes"
                        class=" w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value="" disabled selected hidden class="text-gray-400">Elegir
                        </option>
                        <option value="uno">1 Entreje eje</option>
                        <option value="dos">2 Entreje ejes</option>
                        <option value="tres">3 Entreje ejes</option>
                        <option value="cuatro">4 Entreje ejes</option>
                        <option value="cinco">5 Entreje ejes</option>
                        <option value="seis">6 Entreje ejes</option>
                        <option value="masdeseis">Más de 6 Entreje ejes</option>
                    </select>
                </div>
            </div>
            {{-- card 9 --}}
            <div
                class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
                <!-- Icono centrado arriba -->
                <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                    <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                        <!-- Ícono Lucide o Heroicons -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-house-icon lucide-house">
                            <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                            <path
                                d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="numerodeniveles" class="block text-lg font-semibold text-gray-900 dark:text-white">
                        Número de Niveles
                    </label>
                    <label for="numerodeniveles" class="text-sm">(Un entre eje se considera aproximadamente cada 3.24
                        mts de ancho x 8 mts de largo)</label>
                    <select name="numerodeniveles" id="numerodeniveles" x-model="datosExtra[edificio].niveles"
                        class=" w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value="" disabled selected hidden class="text-gray-400">Elegir
                        </option>
                        <option value="niveluno">1 Nivel</option>
                        <option value="niveldos">2 Nivel</option>
                        <option value="niveltres">3 Nivel</option>>
                    </select>
                </div>
            </div>
            {{-- card 10 --}}
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
                {{-- <div class="mt-4">
                    <label class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Fotografías del Edificio <span x-text="edificio"></span>
                    </label>

                    <!-- Botón estilizado -->
                    <label :for="'fotoedificio_' + edificio"
                        class="cursor-pointer inline-flex items-center justify-center w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-900 dark:border-gray-600 dark:text-white text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-paperclip mr-2">
                            <path d="M13.234 20.252 21 12.3" />
                            <path
                                d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486" />
                        </svg>
                        Seleccionar hasta 5 archivos
                    </label>

                    <!-- Input real oculto -->
                    <input type="file" :id="'fotoedificio_' + edificio" accept="image/*" multiple class="hidden"
                        @change="
                      if ($event.target.files.length > 0) {
                          let files = Array.from($event.target.files).slice(0, 5); // max 5
                          datosExtra[edificio].imagenes = files.map(file => ({
                              file,
                              preview: URL.createObjectURL(file)
                          }));
                      }
                      " />

                    <!-- Lista de archivos -->
                    <template x-for="(img, i) in datosExtra[edificio].imagenes" :key="i">
                        <div class="mt-2 flex items-center space-x-2">
                            <p class="text-sm text-gray-500 dark:text-gray-300 truncate w-40" x-text="img.file.name">
                            </p>
                            <img :src="img.preview"
                                class="w-16 h-16 object-cover rounded border border-gray-300 dark:border-gray-600" />
                        </div>
                    </template>
                </div> --}}
                <div class="mt-6">
                    <label class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Fotografías del Edificio <span x-text="edificio"></span>
                    </label>

                    <!-- Botón Upload -->
                    <label :for="'fotoedificio_' + edificio"
                        class="cursor-pointer flex items-center justify-center w-full px-4 py-3 rounded-xl border-2 border-dashed border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 transition group">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 mr-2 text-gray-500 group-hover:text-gray-700 dark:group-hover:text-white transition"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5" />
                        </svg>

                        <span class="text-gray-600 dark:text-gray-300 font-medium">
                            Seleccionar hasta 5 imágenes
                        </span>
                    </label>

                    <!-- Input oculto -->
                    <input type="file" :id="'fotoedificio_' + edificio" accept="image/*" multiple class="hidden"
                        @change="
                          let actuales = datosExtra[edificio].imagenes || [];
                          let nuevos = Array.from($event.target.files);

                          let total = [...actuales, ...nuevos].slice(0,5);

                          datosExtra[edificio].imagenes = total.map(file => {
                              if(file.file) return file; // ya existente
                              return {
                                  file,
                                  preview: URL.createObjectURL(file)
                              }
                          });
                      " />

                    <!-- Galería -->
                    <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">

                        <template x-for="(img, i) in datosExtra[edificio].imagenes" :key="i">
                            <div
                                class="relative group rounded-xl overflow-hidden shadow-md border border-gray-200 dark:border-gray-700">

                                <!-- Imagen -->
                                <img :src="img.preview"
                                    class="w-full h-32 object-cover transition duration-300 group-hover:scale-110 group-hover:brightness-75" />

                                <!-- Overlay -->
                                <div
                                    class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">

                                    <!-- Botón eliminar -->
                                    <button type="button" @click="datosExtra[edificio].imagenes.splice(i,1)"
                                        class="bg-red-600 hover:bg-red-700 text-white rounded-full w-8 h-8 flex items-center justify-center shadow-lg transition transform hover:scale-110">
                                        ✕
                                    </button>

                                </div>

                            </div>
                        </template>

                    </div>
                </div>

            </div>


            {{-- card 11 --}}
            <div
                class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-4">
                <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                    <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                        <!-- Ícono Lucide o Heroicons -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-house-icon lucide-house">
                            <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                            <path
                                d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="azotea" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Material de Azotea
                    </label>
                    <select name="azotea" id="azotea" x-model="datosExtra[edificio].azotea"
                        class=" w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value="" disabled selected hidden class="text-gray-400">Elegir
                        </option>
                        <option value="concreto">Concreto</option>
                        <option value="laminagalvanizada">Lámina Galvanizada</option>
                        <option value="laminadeasbesto">Lámina de Asbesto</option>
                        <option value="laminadecarton">Lámina de Carton</option>
                        <option value="madera">Madera</option>
                        <option value="teja">teja</option>
                        <option value="otro">Otros</option>
                    </select>
                </div>
            </div>
            {{-- card 12 --}}
            <div
                class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-4">
                <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                    <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                        <!-- Ícono Lucide o Heroicons -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-house-icon lucide-house">
                            <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                            <path
                                d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="pisos" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Material de Pisos
                    </label>
                    <select name="pisos" id="pisos" x-model="datosExtra[edificio].pisos"
                        class=" w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value="" disabled selected hidden class="text-gray-400">Elegir
                        </option>
                        <option value="piso_concreto">Concreto</option>
                        <option value="piso_loseta">Loseta</option>
                        <option value="piso_tierra">Tierra</option>
                        <option value="piso_madera">Madera</option>
                        <option value="piso_otros">Otros</option>
                    </select>
                </div>
            </div>
            {{-- card 13 --}}
            <div
                class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-4">
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
                    <label for="muros" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Material de Muros
                    </label>
                    <select name="muros" id="muros" x-model="datosExtra[edificio].muros"
                        class=" w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value="" disabled selected hidden class="text-gray-400">Elegir
                        </option>
                        <option value="muros_concreto">Concreto</option>
                        <option value="muros_tabique">Tabique</option>
                        <option value="muros_block">Block</option>
                        <option value="muros_madera">Madera</option>
                        <option value="muros_otros">Otros</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
            <div class="lg:col-span-3 transition-transform duration-500 mt-6">
                <!-- Recorres los edificios -->
                <template x-for="(edificio, i) in edificios" :key="edificio">
                    <div x-show="currentIndex === i" class="lg:col-span-3 transition-transform duration-500 mt-6">
                        <!-- Tabla condiciones -->
                        <div
                            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center border dark:border-gray-600">
                            <div>
                                <h3 class="font-semibold mb-2">
                                    Condiciones Físicas (Edificio <span x-text="edificio"></span>)
                                </h3>
                                <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
                                    <table class="min-w-full text-sm text-center text-gray-700 dark:text-gray-300">
                                        <thead>
                                            <tr class="bg-gray-200 dark:bg-gray-700">
                                                <th class="p-2 text-left">Condición</th>
                                                <template x-for="cond in condicion_fisica" :key="cond">
                                                    <th class="p-2" x-text="cond"></th>
                                                </template>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-for="cond in nombre_condicion" :key="cond">
                                                <tr>
                                                    <td class="border p-2 text-left" x-text="cond"></td>
                                                    <template x-for="opcion in condicion_fisica"
                                                        :key="opcion">
                                                        <td class="border p-2">
                                                            <input type="radio" :name="`${edificio}_${cond}`"
                                                                :value="opcion"
                                                                x-model="respuesta_condiciones[edificio][cond]">
                                                        </td>
                                                    </template>
                                                </tr>
                                            </template>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            <!-- Columna 2: Inputs/cards (2/5 en grande) -->
            <div class="lg:col-span-2 space-y-8">
                <div class="lg:col-span-2 space-y-8">
                    <div
                        class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-6">

                        <!-- Título -->
                        <label for="estructural"
                            class="block text-lg font-semibold text-gray-900 dark:text-white mb-4 text-center">
                            Daño Estructural
                        </label>

                        <!-- Versión tabla para pantallas grandes -->
                        <div class="hidden md:block overflow-x-auto">
                            <table class="min-w-full text-sm text-center text-gray-700 dark:text-gray-300">
                                <thead class="bg-gray-100 dark:bg-gray-800 text-xs uppercase">
                                    <tr>
                                        <th class="py-3 px-2 text-left"></th>
                                        <th class="py-3 px-2">Trabes</th>
                                        <th class="py-3 px-2">Columnas</th>
                                        <th class="py-3 px-2">Muros</th>
                                        <th class="py-3 px-2">Losa</th>
                                        <th class="py-3 px-2">Castillos</th>
                                        <th class="py-3 px-2">Pisos</th>
                                        <th class="py-3 px-2">Herreria y/o Canceleria</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                        <td class="py-2 px-2 text-left font-medium">Elementos</td>
                                        <td><input type="checkbox" name="Estructural" value="trabes"
                                                class="accent-vino"
                                                x-model="datosExtra[edificio].danio_estructural" /></td>
                                        <td><input type="checkbox" name="Estructural" value="columnas"
                                                class="accent-vino"
                                                x-model="datosExtra[edificio].danio_estructural" /></td>
                                        <td><input type="checkbox" name="Estructural" value="muros"
                                                class="accent-vino"
                                                x-model="datosExtra[edificio].danio_estructural" /></td>
                                        <td><input type="checkbox" name="Estructural" value="losa"
                                                class="accent-vino"
                                                x-model="datosExtra[edificio].danio_estructural" /></td>
                                        <td><input type="checkbox" name="Estructural" value="castillos"
                                                class="accent-vino"
                                                x-model="datosExtra[edificio].danio_estructural" /></td>
                                        <td><input type="checkbox" name="Estructural" value="pisos"
                                                class="accent-vino"
                                                x-model="datosExtra[edificio].danio_estructural" /></td>
                                        <td><input type="checkbox" name="Estructural" value="herreria"
                                                class="accent-vino"
                                                x-model="datosExtra[edificio].danio_estructural" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Versión móvil (lista apilada) -->
                        <div class="md:hidden space-y-3">
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-300 text-left">Elementos</p>
                            <div class="grid grid-cols-2 gap-3 text-left">
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="Estructural" value="trabes" class="accent-vino">
                                    <span>Trabes</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="Estructural" value="columnas" class="accent-vino">
                                    <span>Columnas</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="Estructural" value="muros" class="accent-vino">
                                    <span>Muros</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="Estructural" value="losa" class="accent-vino">
                                    <span>Losa</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="Estructural" value="castillos" class="accent-vino">
                                    <span>Castillos</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="Estructural" value="pisos" class="accent-vino">
                                    <span>Pisos</span>
                                </label>
                                <label class="flex items-center space-x-2 col-span-2">
                                    <input type="checkbox" name="Estructural" value="herreria" class="accent-vino">
                                    <span>Herrería y/o Cancelería</span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- card 16 --}}
                <div
                    class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-10">
                    <!-- Icono centrado arriba -->
                    <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                        <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                            <!-- Ícono Lucide o Heroicons -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-camera-icon lucide-camera">
                                <path
                                    d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z" />
                                <circle cx="12" cy="13" r="3" />
                            </svg>
                        </div>
                    </div>
                    {{-- <div class="mt-4">
                        <label class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                            Fotografías del Edificio <span x-text="edificio"></span>
                        </label>

                        <!-- Botón estilizado -->
                        <label :for="'fotos_edificioDanio' + edificio"
                            class="cursor-pointer inline-flex items-center justify-center w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-900 dark:border-gray-600 dark:text-white text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-paperclip mr-2">
                                <path d="M13.234 20.252 21 12.3" />
                                <path
                                    d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486" />
                            </svg>
                            Seleccionar hasta 5 archivos
                        </label>

                        <!-- Input real oculto -->
                        <input type="file" :id="'fotos_edificioDanio' + edificio" accept="image/*" multiple
                            class="hidden"
                            @change="
                            if ($event.target.files.length > 0) {
                                let files = Array.from($event.target.files).slice(0, 5); // max 5
                                datosExtra[edificio].imagen_danio = files.map(file => ({
                                    file,
                                    preview: URL.createObjectURL(file)
                                }));
                            }
                            " 
                            />

                        <!-- Lista de archivos -->
                        <template x-for="(img, i) in datosExtra[edificio].imagen_danio" :key="i">
                            <div class="mt-2 flex items-center space-x-2">
                                <p class="text-sm text-gray-500 dark:text-gray-300 truncate w-40"
                                    x-text="img.file.name">
                                </p>
                                <img :src="img.preview"
                                    class="w-16 h-16 object-cover rounded border border-gray-300 dark:border-gray-600" />
                            </div>
                        </template>
                    </div> --}}
                    <div class="mt-6">
                        <label class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                            Fotografías del Edificio <span x-text="edificio"></span>
                        </label>

                        <!-- Botón Upload -->
                        <label :for="'fotos_edificioDanio' + edificio"
                            class="cursor-pointer flex items-center justify-center w-full px-4 py-3 rounded-xl border-2 border-dashed border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 transition group">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6 mr-2 text-gray-500 group-hover:text-gray-700 dark:group-hover:text-white transition"
                                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5" />
                            </svg>

                            <span class="text-gray-600 dark:text-gray-300 font-medium">
                                Seleccionar hasta 5 imágenes
                            </span>
                        </label>

                        <!-- Input oculto -->
                        <input type="file" :id="'fotos_edificioDanio' + edificio" accept="image/*" multiple
                            class="hidden"
                            @change="
                                let actuales = datosExtra[edificio].imagen_danio || [];
                                let nuevos = Array.from($event.target.files);

                                let total = [...actuales, ...nuevos].slice(0,5);

                                datosExtra[edificio].imagen_danio = total.map(file => {
                                    if(file.file) return file; // ya existente
                                    return {
                                        file,
                                        preview: URL.createObjectURL(file)
                                    }
                                });
                            " />

                        <!-- Galería -->
                        <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">

                            <template x-for="(img, i) in datosExtra[edificio].imagen_danio" :key="i">
                                <div
                                    class="relative group rounded-xl overflow-hidden shadow-md border border-gray-200 dark:border-gray-700">

                                    <!-- Imagen -->
                                    <img :src="img.preview"
                                        class="w-full h-32 object-cover transition duration-300 group-hover:scale-110 group-hover:brightness-75" />

                                    <!-- Overlay -->
                                    <div
                                        class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">

                                        <!-- Botón eliminar -->
                                        <button type="button" @click="datosExtra[edificio].imagen_danio.splice(i,1)"
                                            class="bg-red-600 hover:bg-red-700 text-white rounded-full w-8 h-8 flex items-center justify-center shadow-lg transition transform hover:scale-110">

                                            ✕
                                        </button>

                                    </div>

                                </div>
                            </template>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Puntos de navegación -->
    <div class="flex justify-center mt-4 space-x-2">
        <template x-for="(edificio, index) in edificios" :key="edificio">
            <button type="button" class="w-3 h-3 rounded-full"
                :class="currentIndex === index ? 'bg-vino' : 'bg-gray-400'" @click="currentIndex = index">
            </button>
        </template>
    </div>

</div>
