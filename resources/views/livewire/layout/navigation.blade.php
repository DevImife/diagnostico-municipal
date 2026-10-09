<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/login', navigate: true);
    }
}; ?>

@php
    $user = auth()->user();
    $userRole = $user->id_rol ?? null;
    $userName = $user->name ?? 'Invitado';
    $userEmail = $user->email ?? '';
    $initials = collect(explode(' ', trim($userName)))
        ->filter()
        ->take(2)
        ->map(fn($part) => mb_strtoupper(mb_substr($part, 0, 1)))
        ->implode('');

    $navigationItems = [
        [
            'label' => 'Dashboard',
            'route' => 'dashboard',
            'active' => 'dashboard',
            'roles' => [1, 2, 3],
        ],
        [
            'label' => 'Catálogos',
            'route' => 'catalogos',
            'active' => 'catalogos*',
            'roles' => [1, 2],
        ],
        [
            'label' => 'C.C.T.',
            'route' => 'ccts',
            'active' => 'ccts*',
            'roles' => [1, 2, 3],
        ],
        [
            'label' => 'Encuesta',
            'route' => 'encuesta',
            'active' => 'encuesta',
            'roles' => [1, 2, 3],
        ],
        [
            'label' => 'Búsqueda',
            'route' => 'busqueda',
            'active' => 'busqueda',
            'roles' => [1, 2, 3],
        ],
        [
            'label' => 'Usuarios',
            'route' => 'usuarios',
            'active' => 'usuarios',
            'roles' => [1],
        ],
    ];

    $visibleItems = collect($navigationItems)
        ->filter(fn($item) => $user && in_array($userRole, $item['roles'], true))
        ->values();
@endphp

<nav x-data="{ open: false }"
    class="relative z-40 w-full border-b border-[#ebe4dc] bg-white/95 shadow-[0_10px_28px_rgba(35,24,20,0.05)] backdrop-blur dark:border-neutral-800 dark:bg-neutral-950/95">
    <div class="w-full px-4 sm:px-6 lg:px-10">
        <div class="mx-auto flex w-full max-w-[1680px] items-center justify-between gap-4 py-4">
            <div class="flex min-w-0 items-center gap-3 lg:gap-4">
                <a href="{{ route('dashboard') }}" wire:navigate class="flex min-w-0 items-center gap-3">
                    <div
                        class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl border border-[#e9dfd4] bg-white shadow-[0_10px_20px_rgba(49,31,24,0.06)] dark:border-neutral-800 dark:bg-neutral-900">
                        <img src="{{ asset('images/vino.png') }}" alt="Estado de México"
                            class="h-10 w-10 object-contain" />
                    </div>

                    <div class="min-w-0">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.34em] text-[#9f2241]">
                            IMIFE
                        </p>
                        <p class="truncate text-sm font-semibold text-[#211915] dark:text-neutral-100">
                            Registro de Planteles
                        </p>
                        <p class="hidden text-xs text-[#7b6d61] sm:block dark:text-neutral-400">
                            Infraestructura física educativa
                        </p>
                    </div>
                </a>
            </div>

            <div class="hidden flex-1 justify-center lg:flex">
                <div
                    class="flex items-center gap-2 rounded-2xl border  bg-[#faf9f7] p-1.5 shadow-inner dark:border-neutral-800 dark:bg-neutral-900/70">
                    @foreach ($visibleItems as $item)
                        @php($isActive = request()->routeIs($item['active']))
                        <a href="{{ route($item['route']) }}" wire:navigate
                            class="{{ $isActive
                                ? 'bg-[#9f2241] text-white shadow-[0_12px_26px_rgba(159,34,65,0.24)]'
                                : 'text-[#5f534a] hover:bg-white hover:text-[#211915] dark:text-neutral-300 dark:hover:bg-neutral-800 dark:hover:text-white' }} rounded-full px-4 py-2.5 text-sm font-semibold transition">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="hidden items-center gap-3 sm:flex">
                <div
                    class="hidden rounded-2xl border  bg-[#fbfaf8] px-4 py-2.5 text-right shadow-sm xl:block dark:border-neutral-800 dark:bg-neutral-900/70">
                    <p class="text-[10px] uppercase tracking-[0.3em] text-[#9f2241]">
                        Sesión activa
                    </p>
                    <p class="max-w-[180px] truncate text-sm font-semibold text-[#211915] dark:text-white">
                        {{ $userName }}
                    </p>
                </div>

                <x-dropdown align="right" width="72">
                    <x-slot name="trigger">
                        <button type="button"
                            class="group inline-flex items-center gap-3 rounded-2xl border  bg-white px-3 py-2 shadow-sm transition hover:border-[#d7c5bb] hover:shadow-md dark:border-neutral-800 dark:bg-neutral-900">
                            <span
                                class="flex h-11 w-11 items-center justify-center rounded-full bg-[#9f2241] text-sm font-bold text-white shadow-[0_10px_22px_rgba(159,34,65,0.20)]">
                                {{ $initials ?: 'IM' }}
                            </span>
                            <span class="hidden text-left lg:block">
                                <span
                                    class="block max-w-[160px] truncate text-sm font-semibold text-[#211915] dark:text-white">
                                    {{ $userName }}
                                </span>
                                <span class="block max-w-[180px] truncate text-xs text-[#7b6d61] dark:text-neutral-400">
                                    {{ $userEmail }}
                                </span>
                            </span>
                            <svg class="h-4 w-4 text-[#7b6d61] transition group-hover:text-[#9f2241] dark:text-neutral-400"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.168l3.71-3.938a.75.75 0 1 1 1.08 1.04l-4.25 4.5a.75.75 0 0 1-1.08 0l-4.25-4.5a.75.75 0 0 1 .02-1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-3">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-[#9f2241]">
                                Cuenta
                            </p>
                            <p class="mt-2 text-sm font-semibold text-[#211915] dark:text-white">
                                {{ $userName }}
                            </p>
                            <p class="truncate text-xs text-[#7b6d61] dark:text-neutral-400">
                                {{ $userEmail }}
                            </p>
                        </div>

                        <div class="border-t border-neutral-200 dark:border-neutral-700"></div>

                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link class="font-medium text-[#9f2241] focus:text-[#9f2241]">
                                Cerrar sesión
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="flex items-center sm:hidden">
                <button @click="open = ! open" type="button"
                    class="inline-flex h-12 w-12 items-center justify-center rounded-2xl border  bg-white text-[#5f534a] shadow-sm transition hover:border-[#d7c5bb] hover:text-[#9f2241] dark:border-neutral-800 dark:bg-neutral-900 dark:text-neutral-300 dark:hover:text-white">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M4 7h16M4 12h16M4 17h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="1.8" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <div x-show="open" x-transition.origin.top
            class="border-t border-[#eee7df] pb-4 pt-4 sm:hidden dark:border-neutral-800">
            <div class="mx-auto grid max-w-[1680px] gap-3">
                <div class="rounded-3xl border  bg-[#fbfaf8] p-4 shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
                    <div class="flex items-center gap-3">
                        <span
                            class="flex h-12 w-12 items-center justify-center rounded-full bg-[#9f2241] text-sm font-bold text-white">
                            {{ $initials ?: 'IM' }}
                        </span>
                        <div class="min-w-0">
                            <p class="truncate text-sm font-semibold text-[#211915] dark:text-white">
                                {{ $userName }}</p>
                            <p class="truncate text-xs text-[#7b6d61] dark:text-neutral-400">{{ $userEmail }}</p>
                        </div>
                    </div>
                </div>

                <div class="grid gap-2">
                    @foreach ($visibleItems as $item)
                        @php($isActive = request()->routeIs($item['active']))
                        <a href="{{ route($item['route']) }}" wire:navigate
                            class="{{ $isActive
                                ? 'bg-[#9f2241] text-white shadow-[0_12px_24px_rgba(159,34,65,0.18)]'
                                : 'bg-white text-[#3c332d] hover:bg-[#f7f4f1] dark:bg-neutral-900 dark:text-neutral-200 dark:hover:bg-neutral-800' }} rounded-2xl border  px-4 py-3 text-sm font-semibold transition dark:border-neutral-800">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>

                <button wire:click="logout" type="button"
                    class="w-full rounded-2xl border border-[#e8ccd3] bg-[#fff6f8] px-4 py-3 text-left text-sm font-semibold text-[#9f2241] transition hover:bg-[#fdecef] dark:border-neutral-800 dark:bg-neutral-900 dark:text-[#f0d8b6]">
                    Cerrar sesión
                </button>
            </div>
        </div>
    </div>
</nav>
