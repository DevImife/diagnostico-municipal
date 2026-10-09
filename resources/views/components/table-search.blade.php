@props(['id', 'label', 'placeholder', 'hint', 'total'])

<div class="mb-4">
    <label for="{{ $id }}" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    <div class="flex flex-col sm:flex-row gap-2">
        <input id="{{ $id }}" type="search" wire:model.live.debounce.350ms="search"
            placeholder="{{ $placeholder }}" aria-describedby="{{ $id }}-hint" autocomplete="off"
            class="w-full min-w-0 p-2 text-sm border border-gray-300 rounded-lg focus:ring-vino focus:border-vino dark:bg-gray-700 dark:focus:ring-white dark:text-white">
        <button type="button" wire:click="clearSearch"
            class="px-3 py-2 text-sm border border-gray-300 rounded-lg text-vino hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
            Limpiar
        </button>
    </div>
    <p id="{{ $id }}-hint" class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ $hint }}</p>
    <div class="mt-2 text-xs text-gray-600 dark:text-gray-300" role="status" aria-live="polite">
        <span wire:loading.remove wire:target="search,clearSearch">{{ $total }} {{ $total == 1 ? 'resultado' : 'resultados' }}</span>
        <span wire:loading wire:target="search,clearSearch">Buscando…</span>
    </div>
</div>
