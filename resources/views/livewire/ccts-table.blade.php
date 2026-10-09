<div class="p-0">
    {{-- <h1 class="text-2xl font-bold mb-4 text-vino">Listado de Planteles</h1> --}}

    <x-table-search id="ccts-search" label="Buscar C.C.T."
        placeholder="C.C.T., plantel, municipio, turno o nivel"
        hint="Busca también por código postal y localidad. Puedes combinar: Toluca primaria matutino."
        :total="$ccts->total()" />


    <!-- Tabla -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg dark:bg-black">
        <table class="min-w-full text-sm text-left border-collapse">
            <thead class="bg-vino text-white uppercase text-xs dark:bg-gray-800 text-center">
                <tr>
                    <th class="px-6 py-3">CCT</th>
                    <th class="px-6 py-3">Plantel</th>
                    <th class="px-6 py-3">Turno</th>
                    <th class="px-6 py-3">Nivel</th>
                    <th class="px-6 py-3">Municipio</th>
                    <th class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody class="dark:bg-gray-600">
                {{-- <pre>{{ $ccts }}</pre> --}}

                @forelse($ccts  as $cct)
                    <tr wire:key="cct-{{ $cct->id }}" class="border-b hover:bg-cafeclaro dark:hover:bg-gray-700">
                        <td class="px-6 py-3">{{ $cct->clave_cct }}</td>
                        <td class="px-6 py-3">{{ $cct->plantel->nombre_plantel ?? '—' }}</td>
                        <td class="px-6 py-3">{{ $cct->turno->nombre_turno ?? '—' }}</td>
                        <td class="px-6 py-3">{{ $cct->nivel->nombre_nivel ?? '—' }}</td>
                        <td class="px-6 py-3">{{ $cct->plantel->codigo_postal->municipio->nombre_municipio ?? '—' }}
                        </td>
                        <td class="px-6 py-3">
                            <div class="mt-1 flex justify-center space-x-2">
                                <a href="{{ route('ccts.edit', $cct->id) }}"
                                    class="text-blue-500 hover:text-cafe transition" title="Editar">✏️
                                </a>
                                <form id="form-delete-cct-{{ $cct->id }}"
                                    action="{{ route('ccts.destroy', $cct->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete('cct', {{ $cct->id }})"
                                        class="text-red-500 hover:text-red-700 transition" title="Eliminar">🗑️</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-3 text-center text-gray-500">
                            No se encontraron C.C.T. Prueba con otra búsqueda.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $ccts->links() }}
    </div>
</div>
