
{{-- @props(['class']) --}}

<!-- Card -->
<div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <div {{ $attributes->merge(['class' => 'p-3 mr-4 text-red-500 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-500']) }}>
        {{ $card_icon }}
    </div>
    <div>
        {{ $slot }}
    </div>
</div>

