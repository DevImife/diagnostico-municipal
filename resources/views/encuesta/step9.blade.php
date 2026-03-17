<div data-step="9" x-show="step === 9" class="px-9">
    <div class="mb-12">
        <h2 class="text-2xl align-middle font-semibold text-vino dark:text-gray-100 text-center mt-6 break-normal">
            OBRA EXTERIOR (ESPACIOS DE USOS MÚLTIPLES)</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 items-start dark:text-white">
        {{-- card 1 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600">
            <label class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                Estado Físico (Seleccionar el estado físico de los espacios de usos múltiples)
            </label>

            <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
                <table class="min-w-full text-sm text-center text-gray-700 dark:text-gray-300">
                    <thead class="bg-gray-100 dark:bg-gray-800 text-xs uppercase">
                        <tr>
                            <td class="py-2 px-2 text-left">Espacio</td>
                            <template x-for="estado in OExteriorEstado" :key="estado">
                                <th class="py-3 px-2 whitespace-nowrap" x-text="estado"></th>
                            </template>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        <template x-for="esp in OExteriorEspacios" :key="esp">
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                <td class="py-2 px-2 text-left font-medium" x-text="esp"></td>
                                <template x-for="estado in OExteriorEstado" :key="esp + '_' + estado">
                                    <td class="px-2 py-2">
                                        <input type="radio" :name="esp" :value="estado"
                                            class="accent-vino w-4 h-4" x-model="respuestaObraExterior[esp]">
                                    </td>
                                </template>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
            {{-- card 2 --}}
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
                    <label for="barda" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Barda Perimetral</label>
                    <br>
                    <label for="barda" class="text-sm">(cuantos metros lineales tiene la barda perimetral)</label>
                    <input type="number" id="barda" name="barda" x-model="obraExterior.bardaPerimetral"
                        oninput="if(this.value.length > 20) this.value = this.value.slice(0, 20);"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
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
                    <label for="tipoestructura" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Material de Barda Perimetral
                    </label>
                    <select name="barda" id="barda" x-model="obraExterior.materialBarda"
                        class=" w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value="" disabled selected hidden class="text-gray-400">Elegir
                        </option>
                        <option value="concreto">Concreto</option>
                        <option value="tabique">Tabique</option>
                        <option value="block">Block</option>
                        <option value="adobe">Adobe</option>
                        <option value="otros">Otros</option>
                    </select>
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
                    <label for="cerco" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Cerco o Reja Perimetral</label>
                    <br>
                    <label for="cerco" class="text-sm">(Cuantos Metros lineales tiene el cerco o reja
                        perimetral)</label>
                    <input type="number" id="cerco" name="cerco" x-model="obraExterior.metrosCerco"
                        oninput="if(this.value.length > 20) this.value = this.value.slice(0, 20);"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                </div>
            </div>
            {{-- card 5 --}}
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
                    <label for="cerco_reja" class="block text-lg font-semibold text-gray-900 dark:text-white">
                        Material del Cerco o Reja Perimetral
                    </label>
                    <label for="cerco_reja" class="text-sm">(Seleccionar el tipo de material de los portones de
                        acceso)</label>
                    <select name="cerco_reja" id="cerco_reja" x-model="obraExterior.materialCerco"
                        class=" w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value="" disabled selected hidden class="text-gray-400">Elegir
                        </option>
                        <option value="ptr">PTR</option>
                        <option value="malla">Malla de Acero</option>
                        <option value="madera">Madera</option>
                        <option value="otros">Otros</option>
                    </select>
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
                    <label for="porton" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Portones de Acceso</label>
                    <br>
                    <label for="porton" class="text-sm">(Anotar el número de portones de acceso)</label>
                    <input type="number" id="porton" name="porton" x-model="obraExterior.portonAcceso"
                        oninput="if(this.value.length > 20) this.value = this.value.slice(0, 20);"
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
                    <label for="material_portones" class="block text-lg font-semibold text-gray-900 dark:text-white">
                        Material de los Portones de Acceso
                    </label>
                    <label for="material_portones" class="text-sm">(Seleccionar el tipo de material de los portones de
                        acceso)</label>
                    <select name="material_portones" id="material_portones" x-model="obraExterior.materialPorton"
                        class=" w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value="" disabled selected hidden class="text-gray-400">Elegir
                        </option>
                        <option value="acero">Acero</option>
                        <option value="lamina">Lámina</option>
                        <option value="madera">Madera</option>
                        <option value="fierro">Fierro Fundido</option>
                        <option value="otros">Otros</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
            {{-- card 8 --}}
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
                    <label for="estacionamiento" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Estacionamiento</label>
                    <br>
                    <label for="porton" class="text-sm">(Anotar el número de Metros cuadrados que ocupa el
                        estacionamiento)</label>
                    <input type="number" id="porton" name="estacionamiento"
                        x-model="obraExterior.estacionamiento"
                        oninput="if(this.value.length > 20) this.value = this.value.slice(0, 20);"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
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
                    <label for="material_portones" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Material de Estacionamiento
                    </label>
                    <label for="material_portones" class="text-sm">(Seleccionar el tipo de material de los portones de
                        acceso)</label>
                    <select name="material_portones" id="material_portones"
                        x-model="obraExterior.materialEstacionamiento"
                        class=" w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value="" disabled selected hidden class="text-gray-400">Elegir
                        </option>
                        <option value="concreto">Concreto</option>
                        <option value="tierra">Tierra</option>
                        <option value="adoquin">Adoquin</option>
                        <option value="tepojal">Tepojal</option>
                        <option value="arena">Arena</option>
                        <option value="otros">otros</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- card 10 --}}
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
                    <label for="plaza_civica" class="block text-lg font-semibold text-gray-900 dark:text-white">
                        Plaza CÍvica</label>
                    <br>
                    <label for="plaza_civica" class="text-sm">(Anotar cuantos Metros cuadrados ocupa la plaza
                        cívica)</label>
                    <input type="number" id="plaza_civica" name="plaza_civica" x-model="obraExterior.plazaCivica"
                        oninput="if(this.value.length > 20) this.value = this.value.slice(0, 20);"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
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
                    <label for="material_plaza" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Material de Plaza Cívica
                    </label>
                    <label for="material_plaza" class="text-sm">(Seleccionar el tipo de material donde se instala la
                        plaza
                        cívica)</label>
                    <select name="material_plaza" id="material_plaza" x-model="obraExterior.materialPlazaCivica"
                        class=" w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value="" disabled selected hidden class="text-gray-400">Elegir
                        </option>
                        <option value="concreto">Concreto</option>
                        <option value="tierra">Tierra</option>
                        <option value="adoquin">Adoquin</option>
                        <option value="tepojal">Tepojal</option>
                        <option value="arena">Arena</option>
                        <option value="otros">otros</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- card 12 --}}
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
                    <label for="area_deportiva" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Área Deportiva</label>
                    <br>
                    <label for="area_deportiva" class="text-sm">(Anotar el número de Metros cuadrados que ocupa el
                        área deportiva)</label>
                    <input type="number" id="area_deportiva" name="area_deportiva"
                        x-model="obraExterior.areaDeportiva"
                        oninput="if(this.value.length > 20) this.value = this.value.slice(0, 20);"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                </div>
            </div>
            {{-- card 13 --}}
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
                    <label for="material_plaza" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Material de Área Deportiva
                    </label>
                    <label for="material_area_deportiva" class="text-sm">(Selecciona el tipo de material en donde se
                        instalan las áreas
                        deportivas)</label>
                    <select name="material_area_deportiva" id="material_area_deportiva"
                        x-model="obraExterior.materialAreaDeportiva"
                        class=" w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value="" disabled selected hidden class="text-gray-400">Elegir
                        </option>
                        <option value="concreto">Concreto</option>
                        <option value="tierra">Tierra</option>
                        <option value="adoquin">Adoquin</option>
                        <option value="tepojal">Tepojal</option>
                        <option value="arena">Arena</option>
                        <option value="otros">otros</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
            {{-- card 14 --}}
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
                    <label for="cubiertas" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Cubiertas</label>
                    <br>
                    <label for="cubiertas" class="text-sm">(Anotar el número de cubiertas)</label>
                    <input type="number" id="cubiertas" name="cubiertas" x-model="obraExterior.cubiertas"
                        oninput="if(this.value.length > 20) this.value = this.value.slice(0, 20);"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                </div>
            </div>
            {{-- card 15 --}}
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
                    <label for="mcubiertas" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        M2 de Cubiertas</label>
                    <br>
                    <label for="mcubiertas" class="text-sm">(Anotar el número de Metros cuadrados que ocupan las
                        cubiertas)</label>
                    <input type="number" id="mcubiertas" name="mcubiertas" x-model="obraExterior.medidaCubierta"
                        oninput="if(this.value.length > 20) this.value = this.value.slice(0, 20);"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- card 16 --}}
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
                    <label for="material_cubiertas" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Material de Cubiertas
                    </label>
                    <label for="material_cubiertas" class="text-sm">(Selecciona el tipo de material en donde se
                        instalan las áreas
                        deportivas)</label>
                    <select name="material_cubiertas" id="material_cubiertas" x-model="obraExterior.materialCubierta"
                        class=" w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value="" disabled selected hidden class="text-gray-400">Elegir
                        </option>
                        <option value="acero">Acero</option>
                        <option value="madera">Madera</option>
                        <option value="lamina">Lamina</option>
                        <option value="galvateja">Galvateja</option>
                        <option value="teja">Teja</option>
                        <option value="otros">Otros</option>
                    </select>
                </div>
            </div>
            {{-- card 17 --}}
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
                    <label for="bebederos" class="block text-lg font-semibold text-gray-900 dark:text-white">
                        Bebederos</label>
                    <br>
                    <label for="bebederos" class="text-sm">(Anotar el número de Bebederos)</label>
                    <input type="number" id="bebederos" name="bebederos" x-model="obraExterior.bebederos"
                        oninput="if(this.value.length > 20) this.value = this.value.slice(0, 20);"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
            {{-- card 18 --}}
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
                    <label for="material_bebederos" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Material de Bebederos
                    </label>
                    <label for="material_bebederos" class="text-sm">(Selecciona el tipo de material en donde se
                        instalan los
                        bebederos)</label>
                    <select name="material_bebederos" id="material_bebederos"
                        x-model="obraExterior.materialBebederos"
                        class=" w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value="" disabled selected hidden class="text-gray-400">Elegir
                        </option>
                        <option value="acero">Acero</option>
                        <option value="ceramica">Ceramica</option>
                        <option value="lamina">Otros</option>
                    </select>
                </div>
            </div>
            {{-- card 19 --}}
            <div
                class="relative bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-4">

                <!-- Icono centrado arriba -->
                <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                    <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
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
                    <label for="fotos_espacios"
                        class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Fotografías de los Espacios de Usos Múltiples del Plantel
                    </label>

                    <!-- Botón de selección -->
                    <label for="fotos_espacios"
                        class="cursor-pointer inline-flex items-center justify-center w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-900 dark:border-gray-600 dark:text-white text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-paperclip mr-2">
                            <path d="M13.234 20.252 21 12.3" />
                            <path
                                d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486" />
                        </svg>
                        Seleccionar hasta 10 archivos
                    </label>

                    <!-- Input real -->
                    <input type="file" id="fotos_espacios" name="fotografiaUsoMultiples[]" accept="image/*"
                        multiple class="hidden"
                        @change="

                        let actuales = obraExterior.fotografiaUsoMultiples || [];
                        let nuevos = Array.from($event.target.files);

                        let total = [...actuales, ...nuevos].slice(0,10);

                        obraExterior.fotografiaUsoMultiples = total.map(file => {
                          if(file.file) return file;
                          return {
                            file,
                            preview: URL.createObjectURL(file)
                          }
                        });
                        
                        " />

                    <!-- Lista de archivos con vista previa -->
                    <template x-if="obraExterior.fotografiaUsoMultiples.length > 0">
                        <div class="mt-3 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3">
                            <template x-for="(img, i) in obraExterior.fotografiaUsoMultiples" :key="i">
                                <div class="relative">
                                    <img :src="img.preview"
                                        class="w-full h-32 object-cover rounded-lg border border-gray-300 dark:border-gray-600" />
                                    <button type="button" @click="obraExterior.fotografiaUsoMultiples.splice(i, 1)"
                                        class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 text-xs hover:bg-red-700">
                                        ✕
                                    </button>
                                    {{-- <p class="text-xs text-gray-500 dark:text-gray-300 truncate mt-1"
                                        x-text="img.file.name"></p> --}}
                                </div>
                            </template>
                        </div>
                    </template>
                </div>

            </div>
        </div>
        <h2 class="text-2xl align-middle font-semibold text-vino dark:text-gray-100 text-center mt-6 break-normal">
            CROQUIS O PLANO DE CONJUNTO</h2>
        <br>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- card 20 --}}
            <div
                class="relative bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-4">

                <!-- Icono centrado arriba -->
                <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                    <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
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

                    <label for="croquis" class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Sembrado de edificios; contemplar cotas, medidas, letra asignada y tipo de estructura de cada
                        edificio, así como los elementos exteriores importantes y colindancias
                    </label>
                    <!-- Estilo personalizado del input file -->
                    <label for="croquis"
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
                    <input type="file" id="croquis" name="croquis" accept="image/*" class="hidden"
                        @change="
                                if ($event.target.files.length > 0) {
                                  const file = $event.target.files[0];

                                  obraExterior.croquis = {
                                    file,
                                    preview: URL.createObjectURL(file),
                                    name: file.name
                                  };
                                }
                            " />

                    <!-- Nombre del archivo -->
                    <p x-text="obraExterior.croquis?.name"
                        class="mt-2 text-sm text-gray-500 dark:text-gray-300 truncate">
                    </p>

                    <!-- Vista previa -->
                    <template x-if="obraExterior.croquis?.preview">
                        <img :src="obraExterior.croquis.preview" alt="Vista previa"
                            class="mt-2 w-48 h-48 object-cover rounded-lg border border-gray-300 dark:border-gray-600" />
                    </template>
                </div>
            </div>
        </div>
    </div>
</div>
