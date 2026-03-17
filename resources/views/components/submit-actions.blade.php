<div class="mt-1 flex justify-end">
    <input 
        type="submit" 
        value="{{ $value ?? 'Registrar' }}"
        class="{{ $isEdit
            ? 'text-grisOscuro bg-gradient-to-r from-dorado via-doradoFuerte to-doradoFuerte hover:bg-gradient-to-br dark:text-white dark:from-gray-800 dark:via-gray-800 dark:to-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-0'
            : 'text-white bg-gradient-to-r from-red-900 via-vino to-vino hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-0 mb-0' }}">
    
    @if ($isEdit && $cancelHref)
        <a href="{{ $cancelHref }}" title="Cancelar"
            class="bg-vino rounded-lg py-1 px-5 text-white hover:bg-red-900 flex items-center justify-center">
            X
        </a>
    @endif
</div>
