<div data-step="11" x-show="step === 11" class="px-12">
    <div class="mb-12">
        <h2 class="text-2xl align-middle font-semibold text-vino dark:text-gray-100 text-center mt-6 break-normal">
            BIENES INSERVIBLES</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start dark:text-white">
        {{-- card 1 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-brush-cleaning-icon lucide-brush-cleaning">
                        <path d="m16 22-1-4" />
                        <path
                            d="M19 13.99a1 1 0 0 0 1-1V12a2 2 0 0 0-2-2h-3a1 1 0 0 1-1-1V4a2 2 0 0 0-4 0v5a1 1 0 0 1-1 1H6a2 2 0 0 0-2 2v.99a1 1 0 0 0 1 1" />
                        <path d="M5 14h14l1.973 6.767A1 1 0 0 1 20 22H4a1 1 0 0 1-.973-1.233z" />
                        <path d="m8 22 1-4" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="limpia_escuela" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    ¿Sabías que a través del Programa Limpia tu Escuela puedes dar de baja bienes inservibles que
                    fueron inventariados en tu Institución?
                </label>
                <div>
                    <input type="radio" id="limpia_escuela_si" name="limpia_escuela" value="si"
                        class="accent-vino" x-model="bienesInservibles.programaLimpia" />
                    <label for="limpia_escuela_si" class="py-2 px-2 text-left">Sí</label>
                </div>

                <div>
                    <input type="radio" id="limpia_escuela_no" name="limpia_escuela" value="no"
                        class="accent-vino" x-model="bienesInservibles.programaLimpia" />
                    <label for="limpia_escuela_no" class="py-2 px-2 text-left">No</label>
                </div>
            </div>

        </div>
        {{-- card 2 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-arrow-big-down-icon lucide-arrow-big-down">
                        <path d="M15 6v6h4l-7 7-7-7h4V6h6z" />
                    </svg>
                </div>
            </div>
           <div class="mt-4">
              <label for="otros" 
                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4 break-words">
                  ¿Sabías que el proceso de baja de bienes inservibles puedes generarlo en todas sus etapas a través del correo electrónico:
                  <span class="font-medium text-blue-700 break-all">limpiatuescuela@edugem.gob.mx</span>?
              </label>

              <div>
                  <input type="radio" id="bajadebienes_si" name="bajadebienes" value="si" class="accent-vino" x-model="bienesInservibles.correo"/>
                  <label for="bajadebienes_si" class="py-2 px-2 text-left">Sí</label>
              </div>
              <div>
                  <input type="radio" id="bajadebienes_no" name="bajadebienes" value="no" class="accent-vino" x-model="bienesInservibles.correo"/>
                  <label for="bajadebienes_no" class="py-2 px-2 text-left">No</label>
              </div>
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
                        stroke-linejoin="round" class="lucide lucide-brush-cleaning-icon lucide-brush-cleaning">
                        <path d="m16 22-1-4" />
                        <path
                            d="M19 13.99a1 1 0 0 0 1-1V12a2 2 0 0 0-2-2h-3a1 1 0 0 1-1-1V4a2 2 0 0 0-4 0v5a1 1 0 0 1-1 1H6a2 2 0 0 0-2 2v.99a1 1 0 0 0 1 1" />
                        <path d="M5 14h14l1.973 6.767A1 1 0 0 1 20 22H4a1 1 0 0 1-.973-1.233z" />
                        <path d="m8 22 1-4" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">

                <label for="mobiliario" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">¿Sabías que en
                    caso de contar con mobiliario escolar en
                    estado regular que no utilices puedes transferirlo a otra Institución Educativa que le sea de
                    utilidad?</label>
                <div>
                    <input type="radio" id="mobiliario" name="mobiliario" value="si" class="accent-vino" x-model="bienesInservibles.tansferencia"/>
                    <label class="py-2 px-2 text-left">Si</label>
                </div>
                <div>

                    <input type="radio" id="mobiliario" name="mobiliario" value="no" class="accent-vino" x-model="bienesInservibles.tansferencia"/>
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
                        stroke-linejoin="round" class="lucide lucide-brush-cleaning-icon lucide-brush-cleaning">
                        <path d="m16 22-1-4" />
                        <path
                            d="M19 13.99a1 1 0 0 0 1-1V12a2 2 0 0 0-2-2h-3a1 1 0 0 1-1-1V4a2 2 0 0 0-4 0v5a1 1 0 0 1-1 1H6a2 2 0 0 0-2 2v.99a1 1 0 0 0 1 1" />
                        <path d="M5 14h14l1.973 6.767A1 1 0 0 1 20 22H4a1 1 0 0 1-.973-1.233z" />
                        <path d="m8 22 1-4" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">

                <label for="resguardo" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">¿Sabías que en
                    el Área de Bienes Patrimoniales puedes solicitar el alta de bienes,
                    la re impresión de tus tarjetas de resguardo y su actualización?</label>
                <div>
                    <input type="radio" id="resguardo_si" name="resguardo" value="si" class="accent-vino" x-model="bienesInservibles.reImpresion"/>
                    <label class="py-2 px-2 text-left">Si</label>
                </div>
                <div>

                    <input type="radio" id="resguardo_no" name="resguardo" value="no" class="accent-vino" x-model="bienesInservibles.reImpresion"/>
                    <label class="py-2 px-2 text-left">No</label>
                </div>
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
                        stroke-linejoin="round" class="lucide lucide-brush-cleaning-icon lucide-brush-cleaning">
                        <path d="m16 22-1-4" />
                        <path
                            d="M19 13.99a1 1 0 0 0 1-1V12a2 2 0 0 0-2-2h-3a1 1 0 0 1-1-1V4a2 2 0 0 0-4 0v5a1 1 0 0 1-1 1H6a2 2 0 0 0-2 2v.99a1 1 0 0 0 1 1" />
                        <path d="M5 14h14l1.973 6.767A1 1 0 0 1 20 22H4a1 1 0 0 1-.973-1.233z" />
                        <path d="m8 22 1-4" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">

                <label for="robo_siniestro" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">¿Conoces
                    el procedimiento de baja de bienes por robo/siniestro?</label>
                <div>
                    <input type="radio" id="robo_siniestro_si" name="robo_siniestro" value="si"
                        class="accent-vino" x-model="bienesInservibles.bajaBienes" />
                    <label class="py-2 px-2 text-left">Si</label>
                </div>
                <div>
                    <input type="radio" id="robo_siniestro_no" name="robo_siniestro" value="no"
                        class="accent-vino"  x-model="bienesInservibles.bajaBienes"/>
                    <label class="py-2 px-2 text-left">No</label>
                </div>
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
                        stroke-linejoin="round" class="lucide lucide-school-icon lucide-school">
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
                <label for="evento_siniestro" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Si tu Escuela ha tenido algún evento por siniestro, ¿Ha sido atendido en el Área de Bienes
                    Patrimoniales?
                </label>
                <div>
                    <input type="radio" id="evento_siniestro_si" name="evento_siniestro" value="si"
                        class="accent-vino" x-model="bienesInservibles.eventoSiniestro"/>
                    <label class="py-2 px-2 text-left">Si</label>
                </div>
                <div>
                    <input type="radio" id="evento_siniestro_no" name="evento_siniestro" value="no"
                        class="accent-vino" x-model="bienesInservibles.eventoSiniestro"/>
                    <label class="py-2 px-2 text-left">No</label>
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
                        stroke-linejoin="round" class="lucide lucide-arrow-big-down-icon lucide-arrow-big-down">
                        <path d="M15 6v6h4l-7 7-7-7h4V6h6z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="bien_extraviado" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    ¿Conoces el procedimiento de baja cuando tu Escuela tiene algún bien extraviado?
                </label>
                <div>
                    <input type="radio" id="bien_extraviado_si" name="bien_extraviado" value="si"
                        class="accent-vino" x-model="bienesInservibles.extravio"/>
                    <label class="py-2 px-2 text-left">Si</label>
                </div>
                <div>

                    <input type="radio" id="bien_extraviado_no" name="bien_extraviado"
                        value="no"class="accent-vino" x-model="bienesInservibles.extravio"/>
                    <label class="py-2 px-2 text-left">No</label>
                </div>
            </div>
        </div>
    </div>
</div>
