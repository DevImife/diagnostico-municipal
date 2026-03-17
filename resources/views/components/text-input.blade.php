@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge(['class' => 'border-gray-300 dark:border-zinc-800 dark:bg-zinc-900 dark:text-white focus:border-vino dark:focus:border-vino focus:ring-vino dark:focus:ring-vino rounded-md shadow-sm']) }}>
