<!-- Paso 1 -->
<div data-step="3" x-show="step === 3" class="px-6">

    <h3 class="text-2xl align-middle font-semibold text-vino dark:text-gray-100 text-center mt-6 break-normal">
        DATOS DEL DIRECTOR DE OBRAS PÚBLICAS</h3>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
        {{-- card 11 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-8">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-user-cog-icon lucide-user-cog">
                        <path d="M10 15H6a4 4 0 0 0-4 4v2" />
                        <path d="m14.305 16.53.923-.382" />
                        <path d="m15.228 13.852-.923-.383" />
                        <path d="m16.852 12.228-.383-.923" />
                        <path d="m16.852 17.772-.383.924" />
                        <path d="m19.148 12.228.383-.923" />
                        <path d="m19.53 18.696-.382-.924" />
                        <path d="m20.772 13.852.924-.383" />
                        <path d="m20.772 16.148.924.383" />
                        <circle cx="18" cy="15" r="3" />
                        <circle cx="9" cy="7" r="4" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="directorobras" class="text-lg font-semibold text-gray-900 dark:text-white  mb-5">
                    Nombre del Director de Obras Públicas
                </label>
                <input type="text" id="directorobras" name="directorobras" placeholder="Ej. Juan José" x-model="directorObras.directorobras"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
            </div>
        </div>
        {{-- card 12 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-8">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-user-cog-icon lucide-user-cog">
                        <path d="M10 15H6a4 4 0 0 0-4 4v2" />
                        <path d="m14.305 16.53.923-.382" />
                        <path d="m15.228 13.852-.923-.383" />
                        <path d="m16.852 12.228-.383-.923" />
                        <path d="m16.852 17.772-.383.924" />
                        <path d="m19.148 12.228.383-.923" />
                        <path d="m19.53 18.696-.382-.924" />
                        <path d="m20.772 13.852.924-.383" />
                        <path d="m20.772 16.148.924.383" />
                        <circle cx="18" cy="15" r="3" />
                        <circle cx="9" cy="7" r="4" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="apellidos_director_obras"
                    class="text-lg font-semibold text-gray-900 dark:text-white  mb-4">
                    Apellidos del Director
                </label>
                <input type="text" id="apellidos_director_obras" name="apellidos_director_obras"
                    placeholder="Ej. Pérez López" x-model="directorObras.apellidos_director_obras"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
            </div>
        </div>
        {{-- card 12 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center  transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-8">
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
                <label for="direccion_director_obras"
                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Dirección
                </label>
                <input type="text" id="direccion_director_obras" name="direccion_director_obras"
                    placeholder="Ej. Calle Número" x-model="directorObras.direccion_director_obras"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
            </div>
        </div>
        {{-- card 13 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-8">
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-phone-icon lucide-phone">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="telefono_director_obras" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Número de Teléfono Oficina
                </label>
                <input type="number" id="telefono_director_obras" name="telefono_director_obras"
                    placeholder="Ej. 7222222222"  x-model="directorObras.telefono_director_obras"
                    oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10);"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
            </div>
        </div>
        {{-- card 14 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-4 border border-transparent dark:border-gray-600 mt-8">
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-smartphone-icon lucide-smartphone">
                        <rect width="14" height="20" x="5" y="2" rx="2" ry="2" />
                        <path d="M12 18h.01" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="celular_director_obras" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Número de Celular
                </label>
                <input type="number" id="celular_director_obras" name="celular_director_obras"
                    placeholder="Ej. 7222222222" x-model="directorObras.celular_director_obras"
                    oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10);"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
            </div>
        </div>
        {{-- card 15 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-4 border border-transparent dark:border-gray-600 mt-8">

            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-mail-icon lucide-mail">
                        <rect width="20" height="16" x="2" y="4" rx="2" />
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="correo_director_obras" class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Correo Electrónico
                </label>
                <input type="mail" id="correo_director_obras" name="correo_director_obras"
                    placeholder="Ej. correo@dominio.com" x-model="directorObras.correo_director_obras"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
            </div>
        </div>
    </div>
    {{-- card 16 --}}
    <h3 class="text-2xl align-middle font-semibold text-vino dark:text-gray-100 text-center mt-6 break-normal">
        DATOS DEL DIRECTOR DE DESARROLLO URBANO</h3>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-8">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-user-cog-icon lucide-user-cog">
                        <path d="M10 15H6a4 4 0 0 0-4 4v2" />
                        <path d="m14.305 16.53.923-.382" />
                        <path d="m15.228 13.852-.923-.383" />
                        <path d="m16.852 12.228-.383-.923" />
                        <path d="m16.852 17.772-.383.924" />
                        <path d="m19.148 12.228.383-.923" />
                        <path d="m19.53 18.696-.382-.924" />
                        <path d="m20.772 13.852.924-.383" />
                        <path d="m20.772 16.148.924.383" />
                        <circle cx="18" cy="15" r="3" />
                        <circle cx="9" cy="7" r="4" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="director_desarrallo_urbano" class="text-lg font-semibold text-gray-900 dark:text-white">
                    Nombre del Director de Desarrollo Urbano
                </label>
                <input type="text" id="director_desarrallo_urbano" name="director_desarrallo_urbano"
                    placeholder="Ej. Juan José"  x-model="directorObras.director_desarrallo_urbano"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
            </div>
        </div>
        {{-- card 17 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-8">
            <!-- Icono centrado arriba -->
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-user-cog-icon lucide-user-cog">
                        <path d="M10 15H6a4 4 0 0 0-4 4v2" />
                        <path d="m14.305 16.53.923-.382" />
                        <path d="m15.228 13.852-.923-.383" />
                        <path d="m16.852 12.228-.383-.923" />
                        <path d="m16.852 17.772-.383.924" />
                        <path d="m19.148 12.228.383-.923" />
                        <path d="m19.53 18.696-.382-.924" />
                        <path d="m20.772 13.852.924-.383" />
                        <path d="m20.772 16.148.924.383" />
                        <circle cx="18" cy="15" r="3" />
                        <circle cx="9" cy="7" r="4" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="apellidos_director_urbano"
                    class="text-lg font-semibold text-gray-900 dark:text-white  mb-4">
                    Apellidos del Director
                </label>
                <input type="text" id="apellidos_director_urbano" name="apellidos_director_urbano"
                    placeholder="Ej. Pérez López" x-model="directorObras.apellidos_director_urbano"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
            </div>
        </div>
        {{-- card 17 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center  transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-8">
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
                <label for="direccion_director_desarrollo"
                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Dirección
                </label>
                <input type="text" id="direccion_director_desarrollo" name="direccion_director_desarrollo"
                    placeholder="Ej. Calle Número"  x-model="directorObras.direccion_director_desarrollo"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
            </div>
        </div>
        {{-- card 18 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-8">
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-phone-icon lucide-phone">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="telefono_director_desarrollo"
                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Número de Teléfono Oficina
                </label>
                <input type="number" id="telefono_director_desarrollo" name="telefono_director_desarrollo"
                    placeholder="Ej. 7222222222" x-model="directorObras.telefono_director_desarrollo"
                    oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10);"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
            </div>
        </div>
        {{-- card 19 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-4 border border-transparent dark:border-gray-600 mt-8">
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-smartphone-icon lucide-smartphone">
                        <rect width="14" height="20" x="5" y="2" rx="2" ry="2" />
                        <path d="M12 18h.01" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="celular_director_desarrollo"
                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Número de Celular
                </label>
                <input type="number" id="celular_director_desarrollo" name="celular_director_desarrollo"
                    placeholder="Ej. 7222222222" x-model="directorObras.celular_director_desarrollo"
                    oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10);"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
            </div>
        </div>
        {{-- card 20 --}}
        <div
            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-4 border border-transparent dark:border-gray-600 mt-8">
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                    <!-- Ícono Lucide o Heroicons -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-mail-icon lucide-mail">
                        <rect width="20" height="16" x="2" y="4" rx="2" />
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <label for="correo_director_desarrollo"
                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Correo Electrónico
                </label>
                <input type="mail" id="correo_director_desarrollo" name="correo_director_desarrollo"
                    placeholder="Ej. correo@dominio.com" x-model="directorObras.correo_director_desarrollo"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
            </div>
        </div>
    </div>

</div>


{{-- <script>
    document.addEventListener("DOMContentLoaded", () => {
        const directorInput = document.getElementById("director");

        //datos para llenar
        const camposRequeridos = [

        ];

        document.querySelector("form").addEventListener("submit", (e) => {
            if (directorInput.value.trim() !== "") {
                const faltan = camposRequeridos.filter(input => input.value.trim() === "");
                if (faltan.length > 0) {
                    e.preventDefault();
                    alert("Faltan datos");
                }
            }
        });

    });
</script> --}}
