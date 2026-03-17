<div data-step="13" x-show="step === 13" class="px-12">
    {{-- <div class="bg-white dark:bg-vino rounded-xl shadow-md p-6 text-center">
        <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">Finalizado</h2>
        <p class="text-gray-700 dark:text-gray-300">Gracias por completar los pasos.</p>
    </div> --}}
    <div class="mb-12">
        <h2 class="text-2xl align-middle font-semibold text-vino dark:text-gray-100 text-center mt-6 break-normal">
            REPORTE FOTOGRÁFICO
        </h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
        <!-- 🔹 Sección del input (1/4) -->
        <div
            class="col-span-1 bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-4">

            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-file-image">
                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                        <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                        <circle cx="10" cy="12" r="2" />
                        <path d="m20 17-1.296-1.296a2.41 2.41 0 0 0-3.408 0L9 22" />
                    </svg>
                </div>
            </div>

            <div class="mt-8">
                <label class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Anexar Archivos
                </label>

                <label :for="'fotosGenerales_' + edificio"
                    class="cursor-pointer inline-flex items-center justify-center w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-900 dark:border-gray-600 dark:text-white text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-paperclip mr-2">
                        <path d="M13.234 20.252 21 12.3" />
                        <path
                            d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486" />
                    </svg>

                    Seleccionar hasta 5 imágenes
                </label>

                <input type="file" :id="'fotosGenerales_' + edificio" accept="image/*" multiple class="hidden"
                    @change="
                      if ($event.target.files.length > 0) {
                          let files = Array.from($event.target.files).slice(0, 5);
                          subirFotosFinales(files);
                      }
                  " />

                <button type="button" class="mt-4 text-sm text-red-600 hover:underline"
                    @click="
                        fotografias = [];
                        fotografias_paths = [];
                    "
                    x-show="fotografias.length > 0">
                    Limpiar selección
                </button>
            </div>
        </div>

        <!-- 🔹 Sección de imágenes / archivos (3/4) -->
        <div class="col-span-3 mt-4">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4">

                <template x-for="(img, i) in fotografias" :key="i">

                    <div
                        class="relative border rounded-lg p-3 dark:border-gray-700 bg-white dark:bg-gray-900 shadow-sm hover:shadow-md transition group">

                        <!-- Nombre archivo -->
                        <div class="truncate text-sm text-gray-700 dark:text-gray-300 mb-2" :title="img.nombre"
                            x-text="img.nombre">
                        </div>

                        <!-- Imagen -->
                        <div class="relative overflow-hidden rounded-md">

                            <img :src="img.preview" alt="Vista previa"
                                class="w-full h-48 object-cover rounded-md border border-gray-200 dark:border-gray-700 transition group-hover:scale-105" />

                            <!-- Botón eliminar -->
                            <button type="button"
                                @click="
                            fotografias.splice(i,1);
                            fotografias_paths.splice(i,1);
                        "
                                class="absolute top-2 right-2 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition">
                                ✕
                            </button>

                        </div>

                    </div>

                </template>

            </div>

        </div>

    </div>
</div>
