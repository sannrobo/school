<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>
 
    <!-- Fonts -->

    <script src="{{asset('js/init-alpine.js')}}" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chenla&display=swap" rel="stylesheet">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />
    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}
    {{-- <script src="{{asset('js/init-alpine.js')}}" defer></script> --}}


    @livewireStyles
    {{-- <script>
        import Turbolinks from 'turbolinks';
        Turbolinks.start()
    </script> --}}
    <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

{{-- 
     <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>  --}}


</head>

<body style=" font-family: Chenla,sans-serif;">
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900 isSideMenuOpen" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('layouts.menu')
        @include('layouts.mobile-menu')

        <div class="flex flex-col flex-1 w-full">
            @include('layouts.navigation-dropdown')
            <main class="h-full overflow-y-auto">
                {{ $slot }}

            </main>

            <footer class="h-12 dark:bg-gray-800 dark:text-white   bg-gray-100 px-8  rounded-md   flex justify-start py-4 text-gray-500">
                <p class="mr-2 text-md">Copyright &copy; {{ date('Y') }} <span class="dark:text-blue-400 text-blue-600 text-md"><a href="https://facebook.com/sanrobo12" target="_Blank">SANN ROBO</a></span>.All rights reserved.</p>
             </footer>





            


        </div>





        @stack('modals')

        @livewireScripts
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
        <x-livewire-alert::scripts />
    </div>
</body>

</html>
