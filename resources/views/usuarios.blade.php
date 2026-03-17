<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-dorado leading-tight">
            {{ __('Crear Usuario') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="mx-auto sm:px-6 lg:px-8 max-w-3xl">
            <div
                class="bg-white dark:bg-gray-950 shadow-xl sm:rounded-2xl p-8 border border-gray-100 dark:border-gray-700 transition-all duration-300">

                <!-- Título del formulario -->
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 border-b pb-2">
                    Datos del Usuario
                </h3>

                <!-- Formulario -->
                <form method="POST" action="{{ route('usuarios.store') }}">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-5">
                        <x-input-label for="name" :value="__('Nombre de usuario')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                            value="{{ old('name') }}" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Correo -->
                    <div class="mb-5">
                        <x-input-label for="email" :value="__('Correo electrónico')" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                            value="{{ old('email') }}" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-5">
                        <x-input-label for="password" :value="__('Contraseña')" />
                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Municipio -->
                    <div class="mb-6">
                        <x-input-label for="id_municipio" :value="__('Municipio')" />
                        <select id="id_municipio" name="id_municipio"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-zinc-800 dark:bg-zinc-900 dark:text-white focus:border-vino dark:focus:border-vino focus:ring-vino dark:focus:ring-vino shadow-sm">
                            <option value="">Seleccione un municipio</option>
                            @foreach ($municipios as $mun)
                                <option value="{{ $mun->id }}">{{ $mun->nombre_municipio }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('id_municipio')" class="mt-2" />
                    </div>

                    <!-- Rol -->
                    <div class="mb-6">
                        <x-input-label for="id_rol" :value="__('Rol')" />
                        <select id="id_rol" name="id_rol"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-zinc-800 dark:bg-zinc-900 dark:text-white focus:border-vino dark:focus:border-vino focus:ring-vino dark:focus:ring-vino shadow-sm">
                            <option value="">Seleccione un rol</option>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->nombre_rol }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('id_rol')" class="mt-2" />
                    </div>

                    <!-- Botón -->
                    <div class="flex items-center justify-end">
                        <x-primary-button>
                            {{ __('Guardar Usuario') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <div
                class="bg-white dark:bg-gray-950 shadow-xl sm:rounded-2xl p-8 border border-gray-100 dark:border-gray-700 transition-all duration-300">

                <!-- Título del formulario -->
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 border-b pb-2">
                    Usuarios Registrados
                </h3>
                <div class="overflow-x-auto bg-white shadow-md rounded-lg dark:bg-black">
                    <table class="min-w-full text-sm text-left border-collapse">
                        <thead class="bg-vino text-white uppercase text-xs dark:bg-gray-800 text-center">
                            <tr>
                                <th class="px-6 py-3">Nombre</th>
                                <th class="px-6 py-3">Correo</th>
                                <th class="px-6 py-3">Rol</th>
                                <th class="px-6 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="dark:bg-gray-600">
                            {{-- <pre>{{ print_r($usuarios, true) }}</pre> --}}

                            @forelse ($usuarios as $usuario)
                                <tr class="border-b hover:bg-cafeclaro dark:hover:bg-gray-700">
                                    <td class="px-6 py-3">{{ $usuario->name }}</td>
                                    <td class="px-6 py-3">{{ $usuario->email }}</td>
                                    <td class="px-6 py-3">{{ $usuario->rol->nombre_rol ?? 'Sin rol' }}</td>
                                    <td class="px-6 py-3">
                                        <div class="mt-1 flex justify-center space-x-2">
                                            {{-- <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                                class="text-blue-500 hover:text-cafe transition" title="Editar">✏️
                                            </a> --}}
                                            <form id="form-delete-usuario-{{ $usuario->id }}"
                                                action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    onclick="confirmDelete('usuario', {{ $usuario->id }})"
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
                <div class="mt-4">
                  {{ $usuarios->links() }}
                </div>

            </div>
            <!-- Paginación -->

        </div>
    </div>

</x-app-layout>
