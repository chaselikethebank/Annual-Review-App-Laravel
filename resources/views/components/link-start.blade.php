 

<a 
    href="{{ $href }}" 
    {{ $attributes->merge([
        'class' => '
            px-4 py-2 mx-6 text-sm font-medium rounded-lg focus:outline-none focus:ring-2 transition-colors
            border border-gray-50 focus:ring-gray-400 dark:border-gray-700 dark:focus:ring-gray-900
            dark:hover:bg-gray-100 dark:hover:text-gray-600
        '
    ]) }}
>
    {{ $slot }}
</a>
