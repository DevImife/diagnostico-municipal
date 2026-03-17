<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-dorado leading-tight">
            {{ __('CCT') }}
        </h2>
    </x-slot>

    <div class="py-1">
        <div class="mx-auto sm:px-6 lg:px-5">
            <div class="bg-white dark:bg-gray-950 overflow-hidden shadow-sm sm:rounded-lg">
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 p-3 bg-gray-100 dark:bg-gray-950 items-start">
                    <!-- Tarjeta -->
                    <div
                        class="bg-white dark:bg-gray-950 rounded-2xl shadow-md p-6 border border-transparent dark:border-gray-600">
                        <h2 class="text-xl font-semibold text-vino dark:text-white mb-2">Alta de Plantel</h2>

                        <form
                            action="{{ isset($institucion) ? route('planteles.update', $institucion->id) : route('planteles.store') }}"
                            method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            @if (isset($institucion))
                                @method('PUT')
                            @endif

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5 mt-5">
                                <div>
                                    <label for="nombre_plantel"
                                        class="block mb-2 text-xs font-medium text-gray-600 dark:text-white">Nombre del
                                        Plantel</label>
                                    <input type="text"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-vino focus:border-vino block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vino dark:focus:border-vino"
                                        name="nombre_plantel" placeholder="Plantel" id="nombre_plantel" required
                                        value="{{ old('nombre_plantel', $institucion->nombre_plantel ?? '') }}">
                                </div>
                                <div>
                                    <label for="codigo"
                                        class="block mb-2 text-xs font-medium text-gray-600 dark:text-white">Código
                                        Postal</label>
                                    <input type="number"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-vino focus:border-vino block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vino dark:focus:border-vino"
                                        name="codigo" placeholder="Código" id="codigo" min="10000" max="99999"
                                        oninput="if(this.value.length > 5) this.value = this.value.slice(0, 5);"
                                        required
                                        value="{{ old('codigo', $institucion->codigo_postal->codigo_postal ?? '') }}">

                                </div>
                                <input type="hidden" id="localidad_seleccionada"
                                    value="{{ old('localidad', $institucion->codigo_postal->id ?? '') }}">
                                <div>
                                    <label for="localidad"
                                        class="block mb-2 text-xs font-medium text-gray-600 dark:text-white">Localidad</label>
                                    <select id="localidad" name="localidad"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-vino focus:border-vino block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vino dark:focus:border-vino"
                                        required>
                                        <option value="" disabled selected class="text-sm text-gray-500">
                                            Seleccione una localidad</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="latitud"
                                        class="block mb-2 text-xs font-medium text-gray-600 dark:text-white">Latitud</label>
                                    <input type="number"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-vino focus:border-vino block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vino dark:focus:border-vino"
                                        name="latitud" id="latitud" step="any" min="-90" max="90"
                                        placeholder="Latitud" required
                                        value="{{ old('nombre_plantel', $institucion->latitud ?? '') }}">
                                </div>
                                <div>
                                    <label for="longitud"
                                        class="block mb-2 text-xs font-medium text-gray-600 dark:text-white">Longitud</label>
                                    <input type="number"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-vino focus:border-vino block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vino dark:focus:border-vino"
                                        name="longitud" id="longitud" step="any" min="-180" max="180"
                                        placeholder="Longitud" required
                                        value="{{ old('nombre_plantel', $institucion->longitud ?? '') }}">
                                </div>
                                <div>
                                    <label for="telefono"
                                        class="block mb-2 text-xs font-medium text-gray-600 dark:text-white">Teléfono</label>
                                    <input type="number"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-vino focus:border-vino block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vino dark:focus:border-vino"
                                        name="telefono" placeholder="Teléfono" id="telefono"
                                        oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10);"
                                        value="{{ old('nombre_plantel', $institucion->telefono ?? '') }}">
                                </div>
                                <div>
                                    <label for="inah"
                                        class="block mb-2 text-xs font-medium text-gray-600 dark:text-white">¿El Plantel
                                        esta catalogado por el I.N.A.H. o I.N.B.A.?</label>
                                    @php
                                        $select_inah = old('zona', $institucion->inah ?? '');
                                    @endphp

                                    <select id="inah" name="inah"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-vino focus:border-vino block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vino dark:focus:border-vino">
                                        <option value="" disabled selected class="text-sm text-gray-500">
                                            Seleccione una opción</option>
                                        <option value="Si" {{ $select_inah === 'Si' ? 'selected' : '' }}>Si
                                        <option value="No" {{ $select_inah === 'No' ? 'selected' : '' }}>No
                                        <option value="Sin Dato" {{ $select_inah === 'Sin Dato' ? 'selected' : '' }}>
                                            Sin Dato
                                    </select>
                                </div>
                                <div>
                                    <label for="edad_plantel"
                                        class="block mb-2 text-xs font-medium text-gray-600 dark:text-white">Edad
                                        Aproximada Del Plantel</label>
                                    <input type="number"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-vino focus:border-vino block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vino dark:focus:border-vino"
                                        name="edad_plantel" placeholder="Edad" id="edad_plantel"
                                        value="{{ old('nombre_plantel', $institucion->edad_plantel ?? '') }}">
                                </div>
                                {{-- archivo --}}
                                <div>
                                    <label for="fachada_plantel"
                                        class="block mb-2 text-xs font-medium text-gray-600 dark:text-white">
                                        Fachada o Letrero Del Plantel
                                    </label>

                                    {{-- Verificamos si ya existe una imagen en el edit --}}

                                    @if (!empty($institucion->archivo_plantel))
                                        <!-- Vista previa tipo polaroid -->
                                        <div id="imagePreview"
                                            class="relative w-40 h-46 bg-white shadow-lg rounded-lg overflow-hidden">
                                            <img src="{{ asset('storage/fachadas/' . $institucion->archivo_plantel) }}"
                                                alt="Fachada Plantel" class="w-full h-36 object-cover">

                                            <div class="p-2 text-center text-xs text-vino">Fachada</div>

                                            <!-- Botón eliminar -->
                                            <button type="button" onclick="eliminarImagenExistente()"
                                                class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md hover:bg-red-700">
                                                ✕
                                            </button>
                                        </div>
                                    @endif

                                    <!-- Contenedor con estilo como input normal -->
                                    <!-- Input file (oculto si ya hay imagen) -->
                                    <div id="fileInputWrapper"
                                        class="relative flex items-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block focus-within:ring-vino focus-within:border-vino w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white mt-2
                                        {{ !empty($institucion->archivo_plantel) ? 'hidden' : '' }}">

                                        <input type="file" id="fachada_plantel" name="fachada_plantel"
                                            class="hidden" accept="image/*" onchange="mostrarNombre(this)">

                                        <label for="fachada_plantel"
                                            class="flex items-center gap-2 cursor-pointer px-3 py-2 text-gray-500 dark:text-gray-300 hover:text-vino transition w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-paperclip">
                                                <path d="M13.234 20.252 21 12.3" />
                                                <path
                                                    d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486" />
                                            </svg>
                                            <span id="fileLabel">Seleccionar archivo...</span>
                                        </label>
                                    </div>

                                    <!-- Aquí se muestra el nombre del archivo -->
                                    <div id="filePreview"
                                        class="mt-2 ml-4 text-sm text-gray-500 flex items-center gap-3 hidden">
                                        <span id="fileName"></span>
                                        <button type="button" onclick="eliminarArchivo()"
                                            class="text-red-500 hover:text-red-700 font-bold">✕</button>
                                    </div>
                                </div>

                            </div>
                            <x-submit-actions :is-edit="isset($institucion)" :value="isset($institucion) ? 'Actualizar' : 'Registrar'" cancel-href="{{ url('/ccts') }}" />
                        </form>
                    </div>


                    <!-- Copia y cambia para más tarjetas -->
                    <div
                        class="bg-white dark:bg-gray-950 rounded-2xl shadow-md p-6 border border-transparent dark:border-gray-600">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-semibold text-vino dark:text-white mb-0">Visualizar Planteles
                            </h2>
                        </div>

                        <!-- Cards -->

                        {{-- <pre>{{print_r($institucion)}}</pre> --}}
                        <div class="container mx-auto">
                            {{-- <h1 class="text-2xl font-bold mb-6">Listado de Planteles</h1> --}}
                            @livewire('planteles-table')
                        </div>
                    </div>

                </div>

                {{-- segundo --}}

                <div
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 p-3 bg-gray-100 dark:bg-gray-950 items-start">
                    <!-- Tarjeta -->
                    <div
                        class="bg-white dark:bg-gray-950 rounded-2xl shadow-md p-6 border border-transparent dark:border-gray-600">
                        <h2 class="text-xl font-semibold text-vino dark:text-white mb-2">Alta de CCT</h2>

                        <form action="{{ isset($cct) ? route('ccts.update', $cct->id) : route('ccts.store') }}"
                            method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @if (isset($cct))
                                @method('PUT')
                            @endif
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5 mt-5">
                                <div>
                                    <label for="cct"
                                        class="block mb-2 text-xs font-medium text-gray-600 dark:text-white">C.C.T.</label>
                                    <input type="text"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-vino focus:border-vino block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vino dark:focus:border-vino"
                                        name="cct" placeholder="CCT" maxlength="10" id="cct" required
                                        value="{{ old('cct', $cct->clave_cct ?? '') }}">
                                </div>
                                <div>
                                    <label for="institution_id"
                                        class="block mb-2 text-xs font-medium text-gray-600 dark:text-white">
                                        Nombre Plantel
                                    </label>
                                    <select id="institution_id" name="institution_id" placeholder="Buscar plantel..."
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-vino focus:border-vino block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vino dark:focus:border-vino">
                                        @if (old('institution_id', $cct->plantel_id ?? false))
                                            <option value="{{ old('institution_id', $cct->plantel_id) }}" selected>
                                                {{ $cct->plantel->nombre_plantel ?? 'Plantel seleccionado' }}
                                            </option>
                                        @endif
                                    </select>
                                </div>
                                <div>
                                    <label for="nivel_id"
                                        class="block mb-2 text-xs font-medium text-gray-600 dark:text-white">
                                        Nivel
                                    </label>
                                    @php
                                        // $selectedMunicipio = old('nivel_id', $codigoEdit->nivel_id ?? '');
                                    @endphp
                                    <select id="nivel_id" name="nivel_id" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-vino focus:border-vino block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vino dark:focus:border-vino">
                                        <option value="" disabled class="text-sm text-gray-500"
                                            {{ old('nivel_id', $cct->nivel_id ?? '') == '' ? 'selected' : '' }}>
                                            Seleccione un nivel
                                        </option>
                                        @forelse ($levels as $level)
                                            <option value="{{ $level->id }}">
                                                {{ $level->nombre_nivel }}
                                            </option>
                                        @empty
                                            <option disabled selected>No hay niveles registrados</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div>
                                    <label for="turno_id"
                                        class="block mb-2 text-xs font-medium text-gray-600 dark:text-white">
                                        Turno
                                    </label>
                                    @php
                                        // $selectedMunicipio = old('turno_id', $codigoEdit->turno_id ?? '');
                                    @endphp
                                    <select id="turno_id" name="turno_id" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-vino focus:border-vino block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vino dark:focus:border-vino">
                                        <option value="" disabled
                                            {{ old('turno_id', $cct->turno_id ?? '') == '' ? 'selected' : '' }}>
                                            Seleccione un turno
                                        </option>
                                        @foreach ($shifts as $shift)
                                            <option value="{{ $shift->id }}"
                                                {{ old('turno_id', $cct->turno_id ?? '') == $shift->id ? 'selected' : '' }}>
                                                {{ $shift->nombre_turno }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <x-submit-actions :is-edit="isset($cct)" :value="isset($cct) ? 'Actualizar' : 'Registrar'" cancel-href="{{ url('/ccts') }}" />
                        </form>
                    </div>


                    <!-- Copia y cambia para más tarjetas -->
                    <div
                        class="bg-white dark:bg-gray-950 rounded-2xl shadow-md p-6 border border-transparent dark:border-gray-600">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-semibold text-vino dark:text-white mb-2">Visualizar C.C.T.</h2>
                        </div>
                        {{-- <pre>{{print_r($cct)}}</pre> --}}

                        <div class="container mx-auto">
                            {{-- <h1 class="text-2xl font-bold mb-6">Listado de Planteles</h1> --}}
                            @livewire('ccts-table')
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", initTomSelect);
            document.addEventListener("livewire:navigated", initTomSelect);

            function initTomSelect() {

                let el = document.querySelector("#institution_id");

                if (!el) return; // si no existe el input, no hagas nada

                // 🔹 Si ya tiene una instancia, destrúyela antes
                if (el.tomselect) {
                    el.tomselect.destroy();
                }

                new TomSelect(el, {
                    valueField: "id",
                    labelField: "text",
                    searchField: "text",
                    placeholder: "Buscar plantel...",
                    load: function(query, callback) {
                        if (!query.length || query.length < 3) return callback();

                        fetch("{{ route('instituciones.search') }}?q=" + encodeURIComponent(query))
                            .then(response => response.json())
                            .then(json => callback(json))
                            .catch(() => callback());
                    },
                    maxOptions: 20,
                    create: false,
                    render: {
                        option: function(item, escape) {
                            return `<div class="p-2 text-sm text-gray-800 dark:text-gray-800 dark:bg-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white rounded-md cursor-pointer">
                                ${escape(item.text)}
                            </div>`;
                        },
                        item: function(item, escape) {
                            return `<div class="px-2 py-1 text-sm bg-vino text-white rounded-md dark:bg-gray-800">
                                ${escape(item.text)}
                            </div>`;
                        }
                    }
                });
            }



            //document.getElementById("codigo").addEventListener("change", traerDatosCCT);

            // document.addEventListener("DOMContentLoaded", function() {
            //     const codigoInput = document.getElementById("codigo");

            //     codigoInput.addEventListener("input", traerDatosCCT);
            //     // codigoInput.addEventListener("change", traerDatosCCT);

            //     if (codigoInput.value.trim() !== "") {
            //         traerDatosCCT();
            //     }
            // }); 

            function bindCodigoListener() {
                let codigoInput = document.getElementById("codigo");
                if (!codigoInput) return;

                // evitar listeners duplicados
                codigoInput.removeEventListener("input", traerDatosCCT);
                codigoInput.addEventListener("input", traerDatosCCT);

                if (codigoInput.value.trim() !== "") {
                    traerDatosCCT();
                }
            }

            function mostrarNombre(input) {
                const file = input.files[0];
                const fileNameEl = document.getElementById("fileName");
                const preview = document.getElementById("filePreview");
                const label = document.getElementById("fileLabel");

                if (file) {
                    fileNameEl.textContent = file.name;
                    preview.classList.remove("hidden");
                    label.textContent = "Cambiar archivo";
                } else {
                    preview.classList.add("hidden");
                    label.textContent = "Seleccionar archivo...";
                }
            }

            function eliminarArchivo() {
                const input = document.getElementById("fachada_plantel");
                const fileNameEl = document.getElementById("fileName");
                const preview = document.getElementById("filePreview");
                const label = document.getElementById("fileLabel");

                input.value = ""; // Limpia el archivo seleccionado
                fileNameEl.textContent = "";
                preview.classList.add("hidden");
                label.textContent = "Seleccionar archivo...";
            }



            function traerDatosCCT() {

                let codigoPostal = document.getElementById("codigo").value;
                // let localidadSeleccionada = document.getElementById("localidad_seleccionada").value;
                let localidadSeleccionada = document.getElementById("localidad_seleccionada")?.value || null;
                let localidadSelect = document.getElementById("localidad");

                console.log(codigoPostal);

                // 🚨 Solo ejecutamos la búsqueda si ya tiene exactamente 5 caracteres
                if (codigoPostal.length < 5) {
                    return; // aún no hay 5 dígitos, no hacemos nada
                }

                if (codigoPostal.length > 5) {
                    notyf.error("El código postal debe tener exactamente 5 caracteres");
                    document.getElementById("codigo").value = codigoPostal.slice(0, 5);
                    return;
                }

                console.log("Código válido:", codigoPostal);

                // Reset de opciones
                localidadSelect.innerHTML =
                    `<option value="" disabled selected class="text-sm text-gray-500">Cargando localidades...</option>`;

                // Petición AJAX a Laravel
                fetch(`/ccts/localidades/${codigoPostal}`)
                    .then(response => response.json())
                    .then(data => {
                        localidadSelect.innerHTML =
                            `<option value="" disabled selected class="text-sm text-gray-500">Seleccione una localidad</option>`; // Reset

                        if (data.length > 0) {
                            data.forEach(loc => {
                                // localidadSelect.innerHTML +=
                                // `<option value="${loc.id}">${loc.localidad}</option>`;
                                let selected = (loc.id == localidadSeleccionada) ? 'selected' : '';
                                localidadSelect.innerHTML +=
                                    `<option value="${loc.id}" ${selected}>${loc.localidad}</option>`;
                            });
                        } else {
                            notyf.error("No se encontraron localidades para este código postal");
                            this.value = '';
                        }
                        console.log(data);
                    })
                    .catch(error => {
                        console.error(error);
                        notyf.error("Error al obtener localidades");
                    });

            }

            function eliminarImagenExistente() {
                // Ocultamos preview de imagen
                document.getElementById("imagePreview").classList.add("hidden");
                // Mostramos el input file
                document.getElementById("fileInputWrapper").classList.remove("hidden");

                // Opcional: si quieres marcar en el backend que eliminen la imagen existente
                let hiddenInput = document.createElement("input");
                hiddenInput.type = "hidden";
                hiddenInput.name = "eliminar_fachada";
                hiddenInput.value = "1";
                document.querySelector("form").appendChild(hiddenInput);
            }

            function mostrarNombre(input) {
                if (input.files && input.files[0]) {
                    document.getElementById("fileLabel").textContent = input.files[0].name;
                }
            }

            document.addEventListener("DOMContentLoaded", bindCodigoListener);
            document.addEventListener("livewire:load", bindCodigoListener);
            document.addEventListener("livewire:update", bindCodigoListener);
            document.addEventListener("livewire:navigated", bindCodigoListener);
        </script>
    @endpush
</x-app-layout>
