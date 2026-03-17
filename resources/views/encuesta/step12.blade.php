<div data-step="12" x-show="step === 12" class="px-12">
    <div class="mb-12">
        <h2 class="text-2xl align-middle font-semibold text-vino dark:text-gray-100 text-center mt-6 break-normal">
            ENERGÍA ELÉCTRICA</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start dark:text-white">

        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
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
                <label for="otros" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    ¿La escuela donde labora cuenta con servicio de energía eléctrica?
                </label>
                <div>
                    <input type="radio" id="energia_electrica" name="energia_electrica" value="si"
                        class="accent-vino" x-model="energiaElectrica.servicio" />
                    <label class="py-2 px-2 text-left">Si</label>
                </div>
                <div>

                    <input type="radio" id="energia_electrica" name="energia_electrica" value="no"
                        class="accent-vino" x-model="energiaElectrica.servicio" />
                    <label class="py-2 px-2 text-left">No</label>
                </div>
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
                        stroke-linejoin="round" class="lucide lucide-file-text-icon lucide-file-text">
                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                        <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                        <path d="M10 9H8" />
                        <path d="M16 13H8" />
                        <path d="M16 17H8" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="otros" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    ¿Cuentan con un contrato ante CFE?
                </label>
                <div>
                    <input type="radio" id="contrato_cfe" name="contrato_cfe" value="si" class="accent-vino"
                        x-model="energiaElectrica.contrato" />
                    <label class="py-2 px-2 text-left">Si</label>
                </div>
                <div>

                    <input type="radio" id="contrato_cfe" name="contrato_cfe" value="no" class="accent-vino"
                        x-model="energiaElectrica.contrato" />
                    <label class="py-2 px-2 text-left">No</label>
                </div>
            </div>
        </div>
        {{-- card 5 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">

            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-file-digit-icon lucide-file-digit">
                        <path d="M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4" />
                        <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                        <rect width="4" height="6" x="2" y="12" rx="2" />
                        <path d="M10 12h2v6" />
                        <path d="M10 18h4" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="numero_servicio" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Anote su Número de Servicio
                </label>
                <input type="number" id="numero_servicio" name="numero_servicio" placeholder="Ej. 333222222222"
                    x-model="energiaElectrica.numeroServicio"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
            </div>
        </div>
        {{-- card 6 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-file-archive-icon lucide-file-archive">
                        <path d="M10 12v-1" />
                        <path d="M10 18v-2" />
                        <path d="M10 7V6" />
                        <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                        <path d="M15.5 22H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v16a2 2 0 0 0 .274 1.01" />
                        <circle cx="10" cy="20" r="2" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="recibospdf" class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Anexe el recibo escaneado en formato PDF
                </label>
                <div class="mt-4">
                    <!-- Estilo personalizado del input file -->
                    <label for="recibospdf"
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
                    <!-- Input oculto -->
                    <input type="file" id="recibospdf" name="recibospdf" accept=".pdf" class="hidden"
                        @change="
                          if ($event.target.files.length > 0) {
                            const file = $event.target.files[0];

                            energiaElectrica.documento = {
                              file,
                              preview: URL.createObjectURL(file),
                              name: file.name,
                              type: file.type
                            };
                          }
                        " />

                    <!-- Mostrar nombre del archivo -->
                    <p x-text="nombreArchivo" class="mt-2 text-sm text-gray-500 dark:text-gray-300 truncate">
                    </p>

                    <!-- Vista previa si es imagen -->
                    {{-- <template x-if="mostrarRecibo">
                        <img :src="mostrarRecibo" alt="Vista previa"
                            class="mt-2 w-48 h-48 object-cover rounded-lg border border-gray-300 dark:border-gray-600" />
                    </template> --}}
                    <template x-if="energiaElectrica.documento">
                        <div
                            class="mt-3 flex items-center justify-between bg-gray-100 dark:bg-gray-800 p-3 rounded-lg border dark:border-gray-700">

                            <div class="flex items-center space-x-3">
                                <!-- Icono PDF -->
                                <div class="bg-red-600 text-white rounded-md px-2 py-1 text-xs font-bold">
                                    PDF
                                </div>

                                <p class="text-sm text-gray-700 dark:text-gray-300 truncate max-w-[120px] sm:max-w-xs md:max-w-sm"
                                    x-text="
                                    (() => {
                                      const name = energiaElectrica.documento?.name;
                                      if (!name) return '';
                                      const ext = name.split('.').pop();
                                      const base = name.substring(0, name.lastIndexOf('.'));
                                      return base.length > 18
                                        ? base.substring(0, 18) + '...' + ext
                                        : name;
                                    })()
                                  ">
                                </p>
                            </div>

                            <!-- Botones -->
                            <div class="flex items-center space-x-2">

                                <!-- Ver PDF -->
                                <a :href="energiaElectrica.documento.preview" target="_blank"
                                    class="text-blue-600 hover:underline text-sm">
                                    Ver
                                </a>

                                <!-- Eliminar -->
                                <button type="button" @click="energiaElectrica.documento = null"
                                    class="text-red-600 hover:text-red-800 text-sm">
                                    ✕
                                </button>

                            </div>

                        </div>

                    </template>

                </div>
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
                        stroke-linejoin="round" class="lucide lucide-file-text-icon lucide-file-text">
                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                        <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                        <path d="M10 9H8" />
                        <path d="M16 13H8" />
                        <path d="M16 17H8" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="medidor" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    En donde se encuentra instalado el medidor(es)
                </label>
                <div>
                    <input type="radio" id="Instalacion_medidor" name="Instalacion_medidor" value="muro"
                        class="accent-vino" x-model="energiaElectrica.medidor" />
                    <label class="py-2 px-2 text-left">Acometida en muro</label>
                </div>
                <div>

                    <input type="radio" id="Instalacion_medidor" name="Instalacion_medidor" value="poste"
                        class="accent-vino" x-model="energiaElectrica.medidor" />
                    <label class="py-2 px-2 text-left">Al Poste</label>
                </div>
            </div>
        </div>
        {{-- card 8 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center  transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600">

            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-file-digit-icon lucide-file-digit">
                        <path d="M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4" />
                        <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                        <rect width="4" height="6" x="2" y="12" rx="2" />
                        <path d="M10 12h2v6" />
                        <path d="M10 18h4" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="numero_medidor" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Agregue número del medidor
                </label>
                <label for="">(Caracteres alfanuméricos)</label>
                <input type="text" id="numero_medidor" name="numero_medidor"
                    x-model="energiaElectrica.numeroMedidior"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
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
                        stroke-linejoin="round" class="lucide lucide-camera-icon lucide-camera">
                        <path
                            d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z" />
                        <circle cx="12" cy="13" r="3" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="foto_medidor" class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Anexe fotografía del medidor en formato PNG
                </label>
                <label for="foto_medidor"></label>
                <div class="mt-4">
                    <!-- Estilo personalizado del input file -->
                    <label for="foto_medidor"
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
                    <input type="file" id="foto_medidor" name="foto_medidor" accept="image/*" class="hidden"
                        @change="
                        if ($event.target.files.length > 0) {
                          const file = $event.target.files[0];

                          energiaElectrica.fotografiaMedidor = {
                            file,
                            preview: URL.createObjectURL(file),
                            name: file.name
                          };
                        }
                      " />

                    <!-- Nombre del archivo -->
                    <p x-text="energiaElectrica.fotografiaMedidor?.name"
                        class="mt-2 text-sm text-gray-500 dark:text-gray-300 truncate">
                    </p>

                    <!-- Vista previa -->
                    <template x-if="energiaElectrica.fotografiaMedidor?.preview">
                        <div class="relative group mt-2 w-48">
                            <img :src="energiaElectrica.fotografiaMedidor.preview"
                                class="w-48 h-48 object-cover rounded-lg border border-gray-300 dark:border-gray-600 transition group-hover:scale-105" />

                            <button type="button" @click="energiaElectrica.fotografiaMedidor = null"
                                class="absolute top-1 right-1 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition">
                                ✕
                            </button>
                        </div>
                    </template>
                </div>
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
                        stroke-linejoin="round" class="lucide lucide-file-text-icon lucide-file-text">
                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                        <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                        <path d="M10 9H8" />
                        <path d="M16 13H8" />
                        <path d="M16 17H8" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="medidor_activo" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    ¿El medidor se encuentra activo?
                </label>
                <div>
                    <input type="radio" id="medidor_activo" name="medidor_activo" value="muro"
                        class="accent-vino" x-model="energiaElectrica.activoMedidor" />
                    <label class="py-2 px-2 text-left">Si</label>
                </div>
                <div>

                    <input type="radio" id="medidor_activo" name="medidor_activo" value="poste"
                        class="accent-vino" x-model="energiaElectrica.activoMedidor" />
                    <label class="py-2 px-2 text-left">No</label>
                </div>
            </div>
        </div>
        {{-- card 11 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
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
                <label for="pago_servicio" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    ¿Quien paga el servicio de la institución?
                </label>
                <div>
                    <input type="radio" id="pago_servicio" name="servicio_institucion" value="muro"
                        class="accent-vino" x-model="energiaElectrica.pago" />
                    <label class="py-2 px-2 text-left">Sociedad de padres de familia</label>
                </div>
                <div>

                    <input type="radio" id="pago_servicio" name="servicio_institucion" value="poste"
                        class="accent-vino" x-model="energiaElectrica.pago" />
                    <label class="py-2 px-2 text-left">Recursos Autogenerados de la institución</label>
                </div>
                <div>

                    <input type="radio" id="pago_servicio" name="servicio_institucion" value="poste"
                        class="accent-vino" x-model="energiaElectrica.pago" />
                    <label class="py-2 px-2 text-left">Gobierno del Estado de México</label>
                </div>
                <div>

                    <input type="radio" id="pago_servicio" name="servicio_institucion" value="poste"
                        class="accent-vino" x-model="energiaElectrica.pago" />
                    <label class="py-2 px-2 text-left">No se paga</label>

                </div>
                <div>

                    <input type="radio" id="pago_servicio" name="servicio_institucion" value="poste"
                        class="accent-vino" x-model="energiaElectrica.pago" />
                    <label class="py-2 px-2 text-left">Otros:</label>
                    <input type="text" id="numero_medidor" name="numero_medidor"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                </div>
            </div>
        </div>
        {{-- card 11 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-bell-dot-icon lucide-bell-dot">
                        <path d="M10.268 21a2 2 0 0 0 3.464 0" />
                        <path
                            d="M13.916 2.314A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.74 7.327A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673 9 9 0 0 1-.585-.665" />
                        <circle cx="18" cy="8" r="3" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="adeudo" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    ¿El o los servicios de energía eléctrica presentan alguna notificación de adeudo?
                </label>
                <div>
                    <input type="radio" id="adeudo" name="adeudo" value="muro" class="accent-vino"
                        x-model="energiaElectrica.adeudo" />
                    <label class="py-2 px-2 text-left">Si</label>
                </div>
                <div>

                    <input type="radio" id="adeudo" name="adeudo" value="poste" class="accent-vino"
                        x-model="energiaElectrica.adeudo" />
                    <label class="py-2 px-2 text-left">No</label>
                </div>
            </div>
        </div>
        {{-- card 12 --}}

        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
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
                <label class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    El monto del adeudo asciende a:
                </label>
                <div>
                    <input type="radio" value="cero" class="accent-vino" x-model="energiaElectrica.montoAdeudo">
                    <label class="py-2 px-2 text-left">Nada</label>
                </div>
                <div>
                    <input type="radio" value="menos_300000" class="accent-vino"
                        x-model="energiaElectrica.montoAdeudo">
                    <label class="py-2 px-2 text-left">Menos de $300,000.00</label>
                </div>

                <div>
                    <input type="radio" value="300000_600000" class="accent-vino"
                        x-model="energiaElectrica.montoAdeudo">
                    <label class="py-2 px-2 text-left">De $300,000.00 a $600,000.00</label>
                </div>

                <div>
                    <input type="radio" value="600000_900000" class="accent-vino"
                        x-model="energiaElectrica.montoAdeudo">
                    <label class="py-2 px-2 text-left">De $600,000.00 a $900,000.00</label>
                </div>

                <div>
                    <input type="radio" value="mas_1000000" class="accent-vino"
                        x-model="energiaElectrica.montoAdeudo">
                    <label class="py-2 px-2 text-left">Más de $1,000,000.00</label>
                </div>
            </div>

        </div>
        {{-- card 13 --}}

        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600  mt-4">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-shield-check-icon lucide-shield-check">
                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17
                    1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                        <path d="m9 12 2 2 4-4" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="uvie1" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    ¿Cuentan con certificado de UVIE?
                </label>
                <label for="uvie2">(Unidad Verificadora de Instalaciones Eléctricas)</label>
                <div>
                    <input type="radio" id="verificacion_si" name="verificacion" value="si"
                        class="accent-vino" x-model="energiaElectrica.certificadoUvie" />
                    <label for="verificacion_si" class="py-2 px-2 text-left">Si</label>
                </div>
                <div>

                    <input type="radio" id="verificacion_no" name="verificacion" value="no"
                        class="accent-vino" x-model="energiaElectrica.certificadoUvie" />
                    <label for="verificacion_no" class="py-2 px-2 text-left">No</label>
                </div>
            </div>
        </div>
        {{-- card 14 --}}
        <div x-show="energiaElectrica.certificadoUvie === 'si'" x-transition
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-8">
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
                <label for="archivosuvie" class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Adjuntar UVIE en formato PDF
                </label>
                <!-- Estilo personalizado del input file -->
                <label for="archivosuvie"
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
                <input type="file" id="archivosuvie" name="archivosuvie" accept="image/*" class="hidden"
                    @change="
                  if ($event.target.files.length > 0) {
                    const file = $event.target.files[0];

                    energiaElectrica.archivoCertificadovie = {
                      file,
                      preview: URL.createObjectURL(file),
                      name: file.name
                    };
                  }
                  " />

                <!-- Nombre del archivo -->
                <p x-text="energiaElectrica.archivoCertificadovie?.name"
                    class="mt-2 text-sm text-gray-500 dark:text-gray-300 truncate">
                </p>

                <!-- Vista previa -->
                <template x-if="energiaElectrica.archivoCertificadovie?.preview">
                    <div class="relative group mt-2 w-48">
                        <img :src="energiaElectrica.archivoCertificadovie.preview"
                            class="w-48 h-48 object-cover rounded-lg border border-gray-300 dark:border-gray-600 transition group-hover:scale-105" />

                        <button type="button" @click="energiaElectrica.archivoCertificadovie = null"
                            class="absolute top-1 right-1 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition">
                            ✕
                        </button>
                    </div>
                </template>
            </div>
        </div>
    </div>
</div>
