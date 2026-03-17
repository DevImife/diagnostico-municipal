    <!-- Paso 5 -->
    <div data-step="5" x-show="step === 5" class="px-6">
        <div class="mb-12">
            <h2 class="text-2xl align-middle font-semibold text-vino dark:text-gray-100 text-center mt-6 break-normal"
                text="left">
                ZONA SÍSMICA</h2>
        </div>
        <!-- Cards aquí -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">

                <!-- ZONA SÍSMICA -->
                <div class="relative overflow-x-auto rounded-xl border border-gray-300 dark:border-gray-700 p-4 mx-6">

                    <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-200 mb-4">
                        ZONA SÍSMICA
                    </h3>

                    <table class="min-w-full text-sm text-center text-gray-700 dark:text-gray-300">
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800"
                                :class="zonaSismica.zona === 'muy_baja' ? 'bg-vino/10' : ''">
                                <td class="w-10">
                                    <input type="radio" id="muybaja" name="zona_sismica" value="muy_baja"
                                        class="accent-vino" x-model="zonaSismica.zona" />
                                </td>
                                <td class="py-2 px-2 text-left">
                                    A .- Zona de Muy Baja sismicidad.- No se tiene registro en los últimos 80 años
                                    y no pasa del 10% de aceleración de gravedad.
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800"
                                :class="zonaSismica.zona === 'baja' ? 'bg-vino/10' : ''">
                                <td>
                                    <input type="radio" id="baja" name="zona_sismica" value="baja"
                                        class="accent-vino" x-model="zonaSismica.zona" />
                                </td>
                                <td class="py-2 px-2 text-left">
                                    B .- Zona de Baja sismicidad.- No se registran eventos con frecuencia y no
                                    sobrepasan el
                                    70% de la aceleración de gravedad.
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800"
                                :class="zonaSismica.zona === 'alta' ? 'bg-vino/10' : ''">
                                <td>
                                    <input type="radio" id="alta" name="zona_sismica" value="alta"
                                        class="accent-vino" x-model="zonaSismica.zona" />
                                </td>
                                <td class="py-2 px-2 text-left">
                                    C .- Zona de Alta sismicidad.- Se registran sismos con frecuencia y no sobrepasan el
                                    70%
                                    de la aceleración de la gravedad.
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800"
                                :class="zonaSismica.zona === 'muy_alta' ? 'bg-vino/10' : ''">
                                <td>
                                    <input type="radio" id="muy_alta" name="zona_sismica" value="muy_alta"
                                        class="accent-vino" x-model="zonaSismica.zona" />
                                </td>
                                <td class="py-2 px-2 text-left">
                                    D .- Zona de Muy alta sismicidad.- Presentan sismos de gran magnitud y superan el
                                    70%
                                    de la aceleración de la gravedad.
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <!-- TIPO DE SUELO -->
                <div class="overflow-x-auto rounded-xl border border-gray-300 dark:border-gray-700 p-4 mx-6">

                    <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-200 mb-4 text-center">
                        TIPO DE SUELO
                    </h3>

                    <table class="min-w-full text-sm text-center text-gray-700 dark:text-gray-300">
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800"
                                :class="zonaSismica.tipo_suelo === 'lomas' ? 'bg-vino/10' : ''">
                                <td class="w-10">
                                    <input type="radio" id="lomas" name="tipo_suelo" value="lomas"
                                        class="accent-vino" x-model="zonaSismica.tipo_suelo" />
                                </td>
                                <td class="py-2 px-2 text-left">
                                    I = Lomas, formadas por rocas o suelos generalmente firmes.
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800"
                                :class="zonaSismica.tipo_suelo === 'predominante' ? 'bg-vino/10' : ''">
                                <td>
                                    <input type="radio" id="predominante" name="tipo_suelo" value="predominante"
                                        class="accent-vino" x-model="zonaSismica.tipo_suelo" />
                                </td>
                                <td class="py-2 px-2 text-left">
                                    II = Constituido predominantemente por estratos arenosos
                                    y limo arenoso intercalados con capas de arcilla lacustre.
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800"
                                :class="zonaSismica.tipo_suelo === 'lacustre' ? 'bg-vino/10' : ''">
                                <td>
                                    <input type="radio" id="lacustre" name="tipo_suelo" value="lacustre"
                                        class="accent-vino" x-model="zonaSismica.tipo_suelo" />
                                </td>
                                <td class="py-2 px-2 text-left">
                                    III = Lacustre, integrado por potentes depósitos de arcilla altamente compresibles.
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mx-6">

                <div
                    class="sticky top-6 rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 p-4 shadow-sm">

                    <div class="flex items-center gap-2 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-vino" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M12 16v-4" />
                            <path d="M12 8h.01" />
                        </svg>

                        <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                            Información de referencia
                        </h4>
                    </div>

                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-3">
                        Consulta esta imagen como apoyo para identificar correctamente
                        la zona sísmica correspondiente.
                    </p>

                    <img src="{{ asset('storage/info/zona_sismica.png') }}" alt="Zonas sísmicas"
                        class="rounded-lg border border-gray-300 dark:border-gray-700" />
                </div>
            </div>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">

            <div
                class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-9">
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
                <div class="mt-4 dark:text-white">
                    <label for="otros" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        ¿Tiene Documento de Propiedad o Posesión?
                    </label>
                    <div>
                        <input type="radio" id="documentodepropiedad" name="documento" value="si"
                            class="accent-vino" x-model="documento.docPropiedad" />
                        <label class="py-2 px-2 text-left">Si</label>
                    </div>
                    <div>

                        <input type="radio" id="documentodepropiedad1" name="documento" value="no"
                            class="accent-vino" x-model="documento.docPropiedad" />
                        <label class="py-2 px-2 text-left">No</label>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-9"
                x-show="documento.docPropiedad === 'si'" x-transition>
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
                    <label for="turno" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        ¿Qué Tipo de Documento es?
                    </label>
                    <select id="tipodoc" name="tipodoc"
                        class=" w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        x-model="documento.tipoDocumento">
                        <option value="" disabled selected hidden class="text-gray-400">Elegir
                        </option>
                        <option value="Inmatriculación">Inmatriculación</option>
                        <option value="Certificado de Cabildo">Certificado de Cabildo</option>
                        <option value="Escritura Notarial">Escritura Notarial</option>
                        <option value="Acta de Donación">Acta de Donación</option>
                        <option value="Acta Ejidal">Acta Ejidal</option>
                        <option value="Contrato de Compraventa">Contrato de Compraventa</option>
                        <option value="Escrituras CORETT">Escrituras CORETT</option>
                        <option value="Constancia Agraria">Constancia Agraria</option>
                        <option value="Acta de Entrega">Acta de Entrega</option>
                        <option value="Certificado de Posesión">Certificado de Posesión</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600"
                x-show="documento.tipoDocumento === 'otro'" x-transition>
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
                    <label for="otros" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        En caso de Otro especificar que tipo de documento es:
                    </label>
                    <input type="text" id="otros" name="otros" x-model="documento.otroTipo"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                </div>
            </div>
            <div class="relative bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-9"
                x-show="documento.docPropiedad === 'si'" x-transition x-cloak>

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

                    <label class="block text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Documento de Propiedad o Posesión
                    </label>

                    <!-- 🔹 SI YA EXISTE ARCHIVO GUARDADO -->
                    <template x-if="documento.archivoPropiedad && typeof documento.archivoPropiedad === 'string'">
                        <div
                            class="mb-4 p-3 rounded-lg bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 text-left">
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-1">
                                Archivo cargado:
                            </p>

                            <a :href="`/storage/${documento.archivoPropiedad}`" target="_blank"
                                class="text-vino text-sm underline break-all">
                                Ver documento
                            </a>
                        </div>
                    </template>

                    <!-- Botón personalizado -->
                    <label for="archivo_propiedad"
                        class="cursor-pointer inline-flex items-center justify-center w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-50 dark:bg-gray-900 dark:border-gray-600 dark:text-white text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-paperclip">
                            <path d="M13.234 20.252 21 12.3" />
                            <path
                                d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486" />
                        </svg>
                        <span class="ml-2"
                            x-text="documento.archivoPropiedad ? 'Reemplazar archivo' : 'Seleccionar archivo'">
                        </span>
                    </label>

                    <!-- Input oculto -->
                    <input type="file" id="archivo_propiedad" accept="application/pdf" class="hidden"
                        @change="
                        if ($event.target.files.length > 0) {
                            const file = $event.target.files[0];

                            documento.archivoPropiedad = file;
                            nombreDocPropiedad = file.name;
                        }
                    " />

                    <!-- Nombre del archivo -->
                    {{-- <p x-show="nombreDocPropiedad" x-text="nombreDocPropiedad"
                        class="mt-2 text-sm text-gray-500 dark:text-gray-300 truncate">
                    </p> --}}

                    <template x-if="nombreDocPropiedad">
                        <div class="mt-3 flex items-center gap-2 text-sm text-gray-700 dark:text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h10M7 11h10M7 15h6" />
                            </svg>

                            <span class="truncate" x-text="nombreDocPropiedad"></span>
                        </div>
                    </template>

                </div>
            </div>
        </div>
    </div>
