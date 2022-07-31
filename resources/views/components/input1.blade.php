@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-2 border-gray-400 block w-full mt-1 text-sm  dark:border-white-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-white dark:focus:shadow-outline-gray px-2 py-2 rounded-md']) !!}>