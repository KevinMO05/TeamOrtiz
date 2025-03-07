<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Team Ortiz | Gimnasio</title>
        <link rel="icon" href="{{ asset('img/gym.svg') }}" type="image/svg+xml">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/21efb330de.js" crossorigin="anonymous"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            <div class="flex">
                <div>
                    <x-sidebar />
                </div>
                <div class="w-full h-screen overflow-y-auto bg-white">
                    @livewire('navigation-menu')
                    @if(request()->routeIs('dashboard'))
                    <div class="flex flex-col justify-center items-center">
                        <img src="img/mancuerna.png" alt="" width="40%" class="mx-auto">
                        <h1 class="mt-7 text-2xl ">Bienvenido,  <span class="bg-clip-text font-bold text-transparent bg-gradient-to-r from-[#33a346] to-sky-700">{{ Auth::user()->name}}</span></h1>
                    </div>
                    @endif
                    <main>
                        {{ $slot }}
                    </main>
                </div>
            </div>
            

            <!-- Page Content -->
            
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
