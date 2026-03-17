<!-- Paso 2 -->
<div data-step="2" x-show="step === 2" class="px-6" id="contenedor2">

    <div class="mt-4 flex flex-col md:flex-row items-start md:space-x-4 space-y-4 md:space-y-0">

        {{-- card 1 --}}
        <div class="w-full flex justify-center">
            <div
                class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 w-500">
                <div class="mt-4">
                    <p class="text-sm dark:text-white"
                        x-text="'El plantel ' + (planteles[0]?.plantel?.nombre_plantel || '') + ' cuenta con'">
                    </p>
                    <h2 class="text-2xl align-middle font-semibold text-vino dark:text-gray-100 text-center mt-1"
                        x-text="planteles.length + ' C.C.T.'"></h2>
                    <p class="text-xs">favor de llenar los datos.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Collapses dinámicos -->
    <div x-data="{ openIndex: 0 }">
        <template x-for="(plantel, index) in planteles" :key="index">
            <div class="w-full max-w-7xl mx-auto mt-5">
                <!-- Botón -->
                <button @click.prevent="openIndex = openIndex === index ? null : index"
                    class="w-full flex justify-between items-center bg-vino text-white px-4 py-2 rounded-lg">
                    <span
                        x-text="'CCT: ' + plantel.clave_cct + ' con turno: ' + plantel.turno.nombre_turno + ' nivel: ' + plantel.nivel.nombre_nivel"></span>
                    <svg class="w-5 h-5 transform transition-transform duration-300" :class="open ? 'rotate-180' : ''"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Contenido -->
                <div x-show="openIndex === index" x-transition class="p-4 bg-white dark:bg-gray-950 rounded-b-lg">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
                        {{-- card 1 --}}
                        <div
                            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-9">
                            <!-- Icono centrado arriba -->
                            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                                    <!-- Ícono Lucide o Heroicons -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-user-cog-icon lucide-user-cog">
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
                                <label for="nombre_director"
                                    class="text-lg font-semibold text-gray-900 dark:text-white  mb-5">
                                    Nombre del Director
                                </label>
                                <input type="text" id="nombre_director" name="nombre_director"
                                    placeholder="Ej. Juan José" x-model="matricula[index].nombre_director"
                                    :class="errores[index]?.nombre_director ?
                                        'border-red-500 focus:ring-red-500' :
                                        'border-gray-300 focus:ring-vino'"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                            </div>
                        </div>

                        {{-- card2 --}}

                        <div
                            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-8">
                            <!-- Icono centrado arriba -->
                            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                                    <!-- Ícono Lucide o Heroicons -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-user-cog-icon lucide-user-cog">
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
                                <label for="apellidos_director"
                                    class="text-lg font-semibold text-gray-900 dark:text-white  mb-4">
                                    Apellidos del Director
                                </label>
                                <input type="text" id="apellidos_director" name="apellidos_director"
                                    placeholder="Ej. Pérez López" x-model="matricula[index].apellidos_director"
                                    :class="errores[index]?.apellidos_director ?
                                        'border-red-500 focus:ring-red-500' :
                                        'border-gray-300 focus:ring-vino'"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                            </div>
                        </div>
                        {{-- card 3 --}}
                        <div
                            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center  transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-8">

                            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                                    <!-- Ícono Lucide o Heroicons -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-map-pin-house-icon lucide-map-pin-house">
                                        <path
                                            d="M15 22a1 1 0 0 1-1-1v-4a1 1 0 0 1 .445-.832l3-2a1 1 0 0 1 1.11 0l3 2A1 1 0 0 1 22 17v4a1 1 0 0 1-1 1z" />
                                        <path
                                            d="M18 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 .601.2" />
                                        <path d="M18 22v-3" />
                                        <circle cx="10" cy="10" r="3" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="direccion_director"
                                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Dirección
                                </label>
                                <input type="text" id="direccion_director" name="direccion_director"
                                    placeholder="Ej. Calle Número" x-model="matricula[index].direccion_director"
                                    :class="errores[index]?.direccion_director ?
                                        'border-red-500 focus:ring-red-500' :
                                        'border-gray-300 focus:ring-vino'"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                            </div>
                        </div>
                        {{-- card 4 --}}
                        <div
                            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 border border-transparent dark:border-gray-600 mt-8">

                            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                                    <!-- Ícono Lucide o Heroicons -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-phone-icon lucide-phone">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="telefono_director"
                                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Teléfono Oficina
                                </label>
                                <input type="number" id="telefono_director" name="telefono_director"
                                    placeholder="Ej. 7222222222" x-model="matricula[index].telefono_director"
                                    oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10);"
                                    :class="errores[index]?.telefono_director ?
                                        'border-red-500 focus:ring-red-500' :
                                        'border-gray-300 focus:ring-vino'"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                            </div>
                        </div>
                        {{-- card 5 --}}
                        <div
                            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-4 border border-transparent dark:border-gray-600 mt-8">
                            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                                    <!-- Ícono Lucide o Heroicons -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-smartphone-icon lucide-smartphone">
                                        <rect width="14" height="20" x="5" y="2" rx="2"
                                            ry="2" />
                                        <path d="M12 18h.01" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="celular_director"
                                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Número de Celular
                                </label>
                                <input type="number" id="celular_director" name="celular_director"
                                    placeholder="Ej. 7222222222" x-model="matricula[index].celular_director"
                                    oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10);"
                                    :class="errores[index]?.celular_director ?
                                        'border-red-500 focus:ring-red-500' :
                                        'border-gray-300 focus:ring-vino'"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                            </div>
                        </div>
                        {{-- card 6 --}}
                        <div
                            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-4 border border-transparent dark:border-gray-600 mt-8">
                            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                                    <!-- Ícono Lucide o Heroicons -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-mail-icon lucide-mail">
                                        <rect width="20" height="16" x="2" y="4" rx="2" />
                                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="correo_director"
                                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Correo Electrónico
                                </label>
                                <input type="mail" id="correo_director" name="correo_director"
                                    placeholder="Ej. correo@dominio.com" x-model="matricula[index].correo_director"
                                    :class="errores[index]?.correo_director ?
                                        'border-red-500 focus:ring-red-500' :
                                        'border-gray-300 focus:ring-vino'"
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-mars-icon lucide-mars">
                                        <path d="M16 3h5v5" />
                                        <path d="m21 3-6.75 6.75" />
                                        <circle cx="10" cy="14" r="6" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="alumnos"
                                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Alumnos
                                </label>
                                <input type="number" name="alumnos" id="alumnos" placeholder="Ej. 250"
                                    oninput="if(this.value.length > 6) this.value = this.value.slice(0, 6);"
                                    x-model.number="matricula[index].alumnos"
                                    :class="errores[index]?.alumnos ?
                                        'border-red-500 focus:ring-red-500' :
                                        'border-gray-300 focus:ring-vino'"
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-venus-icon lucide-venus">
                                        <path d="M12 15v7" />
                                        <path d="M9 19h6" />
                                        <circle cx="12" cy="9" r="6" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="alumnas"
                                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Alumnas
                                </label>
                                <input type="number" name="alumnas" id="alumnas" placeholder="Ej. 250"
                                    oninput="if(this.value.length > 6) this.value = this.value.slice(0, 6);"
                                    x-model.number="matricula[index].alumnas"
                                    :class="errores[index]?.alumnas ?
                                        'border-red-500 focus:ring-red-500' :
                                        'border-gray-300 focus:ring-vino'"
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-accessibility-icon lucide-accessibility">
                                        <circle cx="16" cy="4" r="1" />
                                        <path d="m18 19 1-7-6 1" />
                                        <path d="m5 8 3-3 5.5 3-2.36 3.5" />
                                        <path d="M4.24 14.5a5 5 0 0 0 6.88 6" />
                                        <path d="M13.76 17.5a5 5 0 0 0-6.88-6" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="personas_discapacidad"
                                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Personas con Discapacidad
                                </label>
                                <input type="number" name="personas_discapacidad" id="personas_discapacidad"
                                    oninput="if(this.value.length > 6) this.value = this.value.slice(0, 6);"
                                    x-model.number="matricula[index].personas_discapacidad" placeholder="Ej. 250"
                                    :class="errores[index]?.personas_discapacidad ?
                                        'border-red-500 focus:ring-red-500' :
                                        'border-gray-300 focus:ring-vino'"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                            </div>
                        </div>
                        {{-- card 8 --}}
                        <div
                            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
                            <!-- Icono centrado arriba -->
                            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                                    <!-- Ícono Lucide o Heroicons -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-equal-icon lucide-equal">
                                        <line x1="5" x2="19" y1="9" y2="9" />
                                        <line x1="5" x2="19" y1="15" y2="15" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="total_matricula"
                                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Total Matrícula
                                </label>
                                <div
                                    x-effect="matricula[index].total_matricula = 
                                (Number(matricula[index].alumnos) || 0) + 
                                (Number(matricula[index].alumnas) || 0) + 
                                (Number(matricula[index].personas_discapacidad) || 0)">
                                </div>
                                <input type="number" readonly x-model="matricula[index].total_matricula"
                                    placeholder="Ej. 250" x-model.number="matricula[index].total_matricula"
                                    name="total_matricula" id="total_matricula"
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-shield-user-icon lucide-shield-user">
                                        <path
                                            d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                                        <path d="M6.376 18.91a6 6 0 0 1 11.249.003" />
                                        <circle cx="12" cy="11" r="4" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="directores"
                                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Directivos
                                </label>
                                <input type="number" placeholder="Ej. 250" name="directores" id="directores"
                                    x-model.number="matricula[index].directores"
                                    oninput="if(this.value.length > 6) this.value = this.value.slice(0, 6);"
                                    :class="errores[index]?.directores ?
                                        'border-red-500 focus:ring-red-500' :
                                        'border-gray-300 focus:ring-vino'"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                            </div>
                        </div>
                        {{-- card 10 --}}
                        <div
                            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
                            <!-- Icono centrado arriba -->
                            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                                    <!-- Ícono Lucide o Heroicons -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-user-round-pen-icon lucide-user-round-pen">
                                        <path d="M2 21a8 8 0 0 1 10.821-7.487" />
                                        <path
                                            d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                                        <circle cx="10" cy="8" r="5" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="docentes"
                                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Docentes
                                </label>
                                <input type="number" id="docentes" name="docentes" placeholder="Ej. 250"
                                    oninput="if(this.value.length > 6) this.value = this.value.slice(0, 6);"
                                    :class="errores[index]?.docentes ?
                                        'border-red-500 focus:ring-red-500' :
                                        'border-gray-300 focus:ring-vino'"
                                    x-model.number="matricula[index].docentes"
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-contact-icon lucide-contact">
                                        <path d="M16 2v2" />
                                        <path d="M7 22v-2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2" />
                                        <path d="M8 2v2" />
                                        <circle cx="12" cy="11" r="3" />
                                        <rect x="3" y="4" width="18" height="18" rx="2" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="administrativos"
                                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Administrativos
                                </label>
                                <input type="number" id="administrativos" name="administrativos"
                                    placeholder="Ej. 250"
                                    oninput="if(this.value.length > 6) this.value = this.value.slice(0, 6);"
                                    :class="errores[index]?.administrativos ?
                                        'border-red-500 focus:ring-red-500' :
                                        'border-gray-300 focus:ring-vino'"
                                    x-model.number="matricula[index].administrativos"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                            </div>
                        </div>
                        {{-- card 12 --}}
                        <div
                            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
                            <!-- Icono centrado arriba -->
                            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                                    <!-- Ícono Lucide o Heroicons -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-bubbles-icon lucide-bubbles">
                                        <path d="M7.2 14.8a2 2 0 0 1 2 2" />
                                        <circle cx="18.5" cy="8.5" r="3.5" />
                                        <circle cx="7.5" cy="16.5" r="5.5" />
                                        <circle cx="7.5" cy="4.5" r="2.5" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="conserjes"
                                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Conserje y/o Intendentes
                                </label>
                                <input type="number" id="conserjes" name="conserjes" placeholder="Ej. 250"
                                    oninput="if(this.value.length > 6) this.value = this.value.slice(0, 6);"
                                    :class="errores[index]?.conserjes ?
                                        'border-red-500 focus:ring-red-500' :
                                        'border-gray-300 focus:ring-vino'"
                                    x-model.number="matricula[index].conserjes"
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-equal-icon lucide-equal">
                                        <line x1="5" x2="19" y1="9" y2="9" />
                                        <line x1="5" x2="19" y1="15" y2="15" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="total_personal"
                                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Total de Personal
                                </label>
                                <div
                                    x-effect="matricula[index].total_personal = 
                                (Number(matricula[index].directores) || 0) + 
                                (Number(matricula[index].docentes) || 0) + 
                                (Number(matricula[index].administrativos) || 0) + 
                                (Number(matricula[index].conserjes) || 0)">
                                </div>
                                <input type="number" id="total_personal" name="total_personal"
                                    placeholder="Ej. 250" x-model="matricula[index].total_personal" readonly
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                            </div>
                        </div>
                        {{-- card 14 --}}
                        <div
                            class="bg-white dark:bg-gray-950 rounded-xl shadow-md p-6 text-center transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 mt-9 border border-transparent dark:border-gray-600">
                            <!-- Icono centrado arriba -->
                            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                                <div class="bg-cafe dark:bg-cafe text-white rounded-full p-3 shadow-md">
                                    <!-- Ícono Lucide o Heroicons -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-equal-icon lucide-equal">
                                        <line x1="5" x2="19" y1="9" y2="9" />
                                        <line x1="5" x2="19" y1="15" y2="15" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="total_grupos"
                                    class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Total de Grupos
                                </label>
                                <input type="number" id="total_grupos" name="total_grupos" placeholder="Ej. 250"
                                    oninput="if(this.value.length > 6) this.value = this.value.slice(0, 6);"
                                    :class="errores[index]?.total_grupos ?
                                        'border-red-500 focus:ring-red-500' :
                                        'border-gray-300 focus:ring-vino'"
                                    x-model.number="matricula[index].total_grupos"
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-vino focus:border-transparent transition dark:bg-gray-950 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>
