<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark" >
    

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Review App') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    @vite(['public/build/assets/app-9RYooLcg.css', 'public/build/assets/app-Xaw6OIO1.js'])


    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased min-h-screen" >
    <x-banner class=""/>

    <div class="min-h-screen ">
        
        <x-side-navigation>

        <!-- Page Heading -->
        @if (isset($header))
        @livewire('navigation-menu')
        <header class="">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                
                {{ $header }}
            </div>
            
        </header>
        @endif

        <!-- Page Content -->
        <main class="">
            @yield('content')
        </main>
        </x-side-navigation>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>