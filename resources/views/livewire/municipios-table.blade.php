<div>
    <x-table-search id="municipios-table-search" label="Buscar municipios" placeholder="Nombre del municipio" hint="Puedes escribir varias palabras en cualquier orden." :total="$municipios->total()" />
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
        @forelse ($municipios as $municipio)
            <div
                wire:key="municipio-{{ $municipio->id }}" class="bg-white dark:bg-gray-700 rounded-lg shadow p-2 hover:bg-gray-100 dark:hover:bg-gray-900 transition flex flex-col justify-between">
                <div class="">
                    <h2
                        class="mb-1 text-sm md:text-lg font-semibold text-cafe dark:text-grisclaro break-words">
                        {{ $municipio->nombre_municipio }}
                    </h2>
                </div>
                <div class="mt-1 flex justify-end space-x-2">
                    <a href="{{ route('catalogos.edit', $municipio->id) }}"
                        class="text-blue-500 hover:text-cafe transition" title="Editar">✏️
                    </a>
                    <form id="form-delete-municipio-{{ $municipio->id }}"
                        action="{{ route('catalogos.destroy', $municipio->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button"
                            onclick="confirmDelete('municipio', {{ $municipio->id }})"
                            class="text-red-500 hover:text-red-700 transition"
                            title="Eliminar">🗑️</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full text-gray-500 text-center py-4">
                No se encontraron municipios. Prueba con otra búsqueda.
            </div>
        @endforelse
    </div>

    <div class="mt-6">{{ $municipios->links() }}</div>
</div>
