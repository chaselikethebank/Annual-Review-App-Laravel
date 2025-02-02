@props(['href' => null, 'type' => 'button'])

@if ($href)
    <!-- If href is passed, render an anchor tag (link) -->
    <a 
        href="{{ $href }}" 
        {{ $attributes->merge([
            'class' => 'px-4 py-2 text-sm font-medium rounded-lg focus:outline-none focus:ring-2 transition-colors 
                       bg-gray-100 text-gray-900 border border-gray-50 hover:bg-gray-100 hover:text-gray-100 focus:ring-gray-400 
                       dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-900 
                       inline-block mx-2 my-1'  
        ]) }}
    >
        {{ $slot }}
    </a>
@else
    <!-- Otherwise, render a button -->
    <button 
        type="{{ $type }}" 
        {{ $attributes->merge([
            'class' => 'px-4 py-2 text-sm font-medium rounded-lg focus:outline-none focus:ring-2 transition-colors 
                       bg-gray-100 text-gray-900 border border-gray-50 hover:bg-gray-100 hover:text-gray-100 focus:ring-gray-400 
                       dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-900 
                       mx-2 my-1'  
        ]) }}>
        {{ $slot }}
    </button>
@endif
