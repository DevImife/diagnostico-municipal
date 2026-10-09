<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-dorado leading-tight">
            {{ __('Catálogos') }}
        </h2>
    </x-slot>
    {{-- <p>{{ Route::currentRouteName() }}</p> --}}
    <div class="py-1">
        <div class="mx-auto sm:px-6 lg:px-5">
            <div
                class="bg-white dark:bg-gradient-to-br dark:from-gray-800  dark:to-negro overflow-hidden shadow-sm sm:rounded-lg ">

                <div
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 p-3 bg-gray-100 dark:bg-gray-950 items-start">
                    <!-- Tarjeta -->
                    <div
                        class="bg-white dark:bg-gray-950 rounded-2xl shadow-md p-6 border border-transparent dark:border-gray-600">
                        <h2 class="text-xl font-semibold text-vino dark:text-white mb-2 ">Alta de Municipios</h2>

                        <form
                            action="{{ isset($municipioEdit) ? route('catalogos.update', $municipioEdit->id) : route('catalogos.store') }}"
                            method="POST" autocomplete="off">
                            @csrf

                            @if (isset($municipioEdit))
                                @method('PUT')
                            @endif

                            {{-- <pre>{{$municipioEdit}}</pre> --}}

                            <div class="grid gap-6 mb-6 md:grid-cols-1 mt-12">
                                <div>
                                    <label for="nombre_municipio"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                                        Municipio</label>
                                    <input type="text" id="nombre_municipio" name="nombre_municipio"
                                        value="{{ old('nombre_municipio', $municipioEdit->nombre_municipio ?? '') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                        focus:ring-vino focus:border-vino block w-3/4 p-2.5 
                                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                        dark:text-white dark:focus:ring-vino dark:focus:border-vino"
                                        placeholder="Municipio" required />
                                </div>

                                <x-submit-actions :is-edit="isset($municipioEdit)" :value="isset($municipioEdit) ? 'Actualizar' : 'Registrar'"
                                    cancel-href="{{ url('/catalogos') }}" />

                            </div>
                        </form>
                    </div>


                    <!-- Copia y cambia para más tarjetas -->
                    <div
                        class="bg-white dark:bg-gray-950 rounded-2xl shadow-md p-6 border border-transparent dark:border-gray-600">
                        <h2 class="text-xl font-semibold text-vino dark:text-white mb-4">Visualizar Municipios</h2>
                        <livewire:municipios-table />
                    </div>

                </div>
            </div>
        </div>
        {{-- segundo catalogo --}}
        <div class="mx-auto sm:px-6 lg:px-5">
            <div
                class="bg-white dark:bg-gradient-to-br dark:from-gray-800  dark:to-negro overflow-hidden shadow-sm sm:rounded-lg">

                <div
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 p-3 bg-gray-100 dark:bg-gray-950 items-start">
                    <!-- Tarjeta -->
                    <div
                        class="bg-white dark:bg-gray-950 rounded-2xl shadow-md p-6 border border-transparent dark:border-gray-600">
                        <h2 class="text-xl font-semibold text-vino dark:text-white mb-2">Alta de Código Postal</h2>
                        {{-- <pre>{{ print_r($codigoEdit, true) }}</pre> --}}

                        <form
                            action="{{ isset($codigoEdit) ? route('codigos.update', $codigoEdit->id) : route('codigos.store') }}"
                            method="POST" autocomplete="off">

                            @csrf
                            @if (isset($codigoEdit))
                                @method('PUT')
                            @endif
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6 mt-6">

                                <!-- Campo Código Postal -->
                                <div>
                                    <label for="codigo_postal"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Código Postal
                                    </label>
                                    <input type="number" id="codigo_postal" name="codigo_postal"
                                        value="{{ old('codigo_postal', $codigoEdit->codigo_postal ?? '') }}"
                                        oninput="if(this.value.length > 5) this.value = this.value.slice(0, 5);"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-vino focus:border-vino block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vino dark:focus:border-vino"
                                        placeholder="Código" required />
                                </div>

                                <!-- Campo Municipio -->
                                <div>
                                    <label for="municipio_id"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Municipio
                                    </label>
                                    @php
                                        $selectedMunicipio = old('municipio_id', $codigoEdit->municipio_id ?? '');
                                    @endphp
                                    <select id="municipio_id" name="municipio_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-vino focus:border-vino block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vino dark:focus:border-vino">

                                        @forelse ($municipiosAll as $municipio)
                                            <option value="{{ $municipio->id }}"
                                                {{ $selectedMunicipio == $municipio->id ? 'selected' : '' }}>
                                                {{ $municipio->nombre_municipio }}
                                            </option>
                                        @empty
                                            <option disabled selected>No hay municipios registrados</option>
                                        @endforelse
                                    </select>
                                </div>

                                <div>
                                    <label for="localidad"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Localidad
                                    </label>
                                    <input type="text" id="localidad" name="localidad"
                                        value="{{ old('localidad', $codigoEdit->localidad ?? '') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-vino focus:border-vino block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vino dark:focus:border-vino"
                                        placeholder="Localidad" required />
                                </div>
                                <div>
                                    <label for="tipo"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Tipo
                                    </label>
                                    <select id="tipo" name="tipo"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-vino focus:border-vino block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vino dark:focus:border-vino">
                                        @php
                                            $selectedTipo = old('tipo', $codigoEdit->tipo ?? '');
                                        @endphp

                                        <option value="AEROPUERTO"
                                            {{ $selectedTipo === 'AEROPUERTO' ? 'selected' : '' }}>Aeropuerto</option>
                                        <option value="BARRIO" {{ $selectedTipo === 'BARRIO' ? 'selected' : '' }}>
                                            Barrio</option>
                                        <option value="COLONIA" {{ $selectedTipo === 'COLONIA' ? 'selected' : '' }}>
                                            Colonia</option>
                                        <option value="CONDOMINIO"
                                            {{ $selectedTipo === 'CONDOMINIO' ? 'selected' : '' }}>Condominio</option>
                                        <option value="CONJUNTO HABITACIONAL"
                                            {{ $selectedTipo === 'CONJUNTO HABITACIONAL' ? 'selected' : '' }}>Conjunto
                                            habitacional</option>
                                        <option value="EJIDO" {{ $selectedTipo === 'EJIDO' ? 'selected' : '' }}>Ejido
                                        </option>
                                        <option value="EQUIPAMIENTO"
                                            {{ $selectedTipo === 'EQUIPAMIENTO' ? 'selected' : '' }}>Equipamiento
                                        </option>
                                        <option value="EXHACIENDA"
                                            {{ $selectedTipo === 'EXHACIENDA' ? 'selected' : '' }}>Exhacienda</option>
                                        <option value="FRACCIONAMIENTO"
                                            {{ $selectedTipo === 'FRACCIONAMIENTO' ? 'selected' : '' }}>Fraccionamiento
                                        </option>
                                        <option value="GRANJA" {{ $selectedTipo === 'GRANJA' ? 'selected' : '' }}>
                                            Granja</option>
                                        <option value="HACIENDA" {{ $selectedTipo === 'HACIENDA' ? 'selected' : '' }}>
                                            Hacienda</option>
                                        <option value="PARAJE" {{ $selectedTipo === 'PARAJE' ? 'selected' : '' }}>
                                            Paraje</option>
                                        <option value="PUEBLO" {{ $selectedTipo === 'PUEBLO' ? 'selected' : '' }}>
                                            Pueblo</option>
                                        <option value="RANCHERÍA"
                                            {{ $selectedTipo === 'RANCHERÍA' ? 'selected' : '' }}>Ranchería</option>
                                        <option value="RANCHO" {{ $selectedTipo === 'RANCHO' ? 'selected' : '' }}>
                                            Rancho</option>
                                        <option value="UNIDAD HABITACIONAL"
                                            {{ $selectedTipo === 'UNIDAD HABITACIONAL' ? 'selected' : '' }}>Unidad
                                            habitacional</option>
                                        <option value="ZONA COMERCIAL"
                                            {{ $selectedTipo === 'ZONA COMERCIAL' ? 'selected' : '' }}>Zona comercial
                                        </option>
                                        <option value="ZONA FEDERAL"
                                            {{ $selectedTipo === 'ZONA FEDERAL' ? 'selected' : '' }}>Zona federal
                                        </option>
                                        <option value="ZONA INDUSTRIAL"
                                            {{ $selectedTipo === 'ZONA INDUSTRIAL' ? 'selected' : '' }}>Zona industrial
                                        </option>
                                        <option value="ZONA MILITAR"
                                            {{ $selectedTipo === 'ZONA MILITAR' ? 'selected' : '' }}>Zona militar
                                        </option>
                                    </select>
                                </div>
                                <div>
                                    <label for="zona"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Zona
                                    </label>
                                    <select id="zona" name="zona"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-vino focus:border-vino block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-vino dark:focus:border-vino">
                                        @php
                                            $selectedZona = old('zona', $codigoEdit->zona ?? '');
                                        @endphp
                                        <option value="RURAL" {{ $selectedZona === 'RURAL' ? 'selected' : '' }}>RURAL
                                        </option>
                                        <option value="URBANA" {{ $selectedZona === 'URBANA' ? 'selected' : '' }}>
                                            URBANA</option>
                                    </select>
                                </div>
                            </div>

                            <x-submit-actions :is-edit="isset($codigoEdit)" :value="isset($codigoEdit) ? 'Actualizar' : 'Registrar'"
                                cancel-href="{{ url('/catalogos') }}" />

                        </form>
                    </div>

                    <div
                        class="bg-white dark:bg-gray-950 rounded-2xl shadow-md p-6 border border-transparent dark:border-gray-600">
                        <h2 class="text-xl font-semibold text-vino dark:text-white mb-4">Visualizar Códigos Postales</h2>
                        <livewire:codigos-table />
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script></script>
    @endsection
</x-app-layout>
