<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="p-0">
        {{-- <h1 class="text-2xl font-bold mb-4 text-vino">Listado de Planteles</h1> --}}

        <!-- Input de búsqueda -->
        <div class="grid grid-cols-1 md:grid-cols-2">
            <!-- Columna vacía -->
            <div></div>
            <!-- Columna con el input -->
            <div class="mb-2 flex justify-end">
                <input type="text" wire:model="search" placeholder="Buscar por plantel"
                    class="w-full md:w-full p-2 text-xs border rounded-lg focus:ring-vino focus:border-vino dark:bg-gray-700 dark:focus:ring-white dark:text-white">
            </div>
        </div>


        <!-- Tabla -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg dark:bg-black">
            <table class="min-w-full text-sm text-left border-collapse">
                <thead class="bg-vino text-white uppercase text-xs dark:bg-gray-800 text-center">
                    <tr>
                        <th class="px-6 py-3">Plantel</th>
                        <th class="px-6 py-3">Municipio</th>
                        <th class="px-6 py-3">Código Postal</th>
                        <th class="px-6 py-3">Localidad</th>
                        <th class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="dark:bg-gray-600">
                    @forelse($planteles as $plantel)
                        <tr class="border-b hover:bg-cafeclaro dark:hover:bg-gray-700">
                            <td class="px-6 py-3 text-xs">{{ $plantel->nombre_plantel }}</td>
                            <td class="px-6 py-3 text-xs">{{ $plantel->codigo_postal->municipio->nombre_municipio }}
                            </td>
                            <td class="px-6 py-3">{{ $plantel->codigo_postal->codigo_postal }}</td>
                            <td class="px-6 py-3">{{ $plantel->codigo_postal->localidad }}</td>
                            <td class="px-6 py-3">
                                <div class="mt-1 flex justify-center space-x-2">
                                    <a href="{{ route('planteles.edit', $plantel->id) }}"
                                        class="text-blue-500 hover:text-cafe transition" title="Editar">✏️
                                    </a>
                                    <form id="form-delete-localidad-{{ $plantel->id }}"
                                        action="{{ route('planteles.destroy', $plantel->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete('localidad', {{ $plantel->id }})"
                                            class="text-red-500 hover:text-red-700 transition"
                                            title="Eliminar">🗑️</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-3 text-center text-gray-500">
                                No se encontraron resultados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="mt-4">
            {{ $planteles->links() }}
        </div>
    </div>

</div>
