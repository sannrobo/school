@props(['disabled' => false])
<div class="mt-1 flex rounded-md shadow-sm">
    <span
        class="inline-flex items-center py-2 px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-100 text-gray-600 text-md dark:text-gray-200 dark:bg-gray-600 dark:border-gray-500">
        {{ $slot }}
    </span>
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md md:text-md border border-gray-300 dark:text-gray-200 dark:bg-gray-700 dark:border-gray-600']) !!}>
</div>
