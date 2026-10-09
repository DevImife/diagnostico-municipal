<div>
    <x-table-search id="codigos-table-search" label="Buscar códigos postales" placeholder="Código postal, municipio o localidad" hint="Busca también por tipo y zona. Ejemplo: Toluca urbana." :total="$codigos->total()" />
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">

        @forelse ($codigos as $codigo)
            <div
                wire:key="codigo-{{ $codigo->id }}" class="bg-white dark:bg-gray-700 rounded-lg shadow p-2 hover:bg-gray-100 dark:hover:bg-gray-900 transition flex flex-col justify-between">
                <div class="">
                    <h2
                        class="mb-2 text-sm md:text-lg font-semibold text-cafe dark:text-grisclaro break-words">
                        {{ $codigo->codigo_postal }}
                    </h2>
                    <p class="text-vino font-medium text-sm">
                        {{ $codigo->municipio->nombre_municipio ?? '—' }}</p>
                    <p class="text-gray-700 dark:text-gray-300 truncate text-xs"
                        title="{{ $codigo->localidad }}">
                        {{ $codigo->localidad }}
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 text-xs">{{ $codigo->tipo }}</p>
                    <p class="text-gray-500 dark:text-gray-400 text-xs">{{ $codigo->zona }}</p>
                </div>
                <div class="mt-1 flex justify-end space-x-2">
                    <a href="{{ route('codigos.edit', $codigo->id) }}"
                        class="text-blue-500 hover:text-cafe transition" title="Editar">✏️
                    </a>
                    <form id="form-delete-codigo-{{ $codigo->id }}"
                        action="{{ route('codigos.destroy', $codigo->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button"
                            onclick="confirmDelete('codigo', {{ $codigo->id }})"
                            class="text-red-500 hover:text-red-700 transition"
                            title="Eliminar">🗑️</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full text-gray-500 text-center py-4">
                No se encontraron códigos postales. Prueba con otra búsqueda.
            </div>
        @endforelse
    </div>

    <div class="mt-6">{{ $codigos->links() }}</div>
</div>
