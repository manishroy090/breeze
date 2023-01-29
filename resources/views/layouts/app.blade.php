<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
<<<<<<< HEAD
        <!-- Google fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />



        <!-- Scripts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

=======

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
>>>>>>> f0fbe1f3fb851607ff0b866645be0c5247768002
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
<<<<<<< HEAD

    <div class="flex flex-row">

        <div class="bg-current  w-44 h-full">
            <div class="flex ">
                <img src="{{ asset('img/logo.png') }}" class="w-20">
                <h1 class="relative top-5 right-5 text-lg text-white">Dashboard</h1>
            </div>
            <div class="">
                <ul class="pl-6 text-white" >
                    <li class="mt-5">
                        <a href="{{ route('addproduct') }}" class="pt-8">Add Product</a>
                    </li>
                    <li class="mt-5"><a href="{{ route('addmenu') }}">Menu</a></li>

                    <li class="mt-5"><a href="">Product</a>
                    </li>
                    <li class="mt-5"><a href="">Chart</a>
                    </li>
                    <li class="mt-5"><a href="">icon</a>
                    </li>
                    <li class="mt-5"><a href="">Notification</a>
                    </li>
                    <li class="mt-5"><a href="">Widget</a>
                    </li>
                    <li class="mt-5"><a href="">Pages</a>
                    </li>
                    <li class="mt-5"><a href="">Member</a>
                    </li>
                    <li class="mt-5"><a href="">Project</a>
                    </li>
                    <li class="mt-5"><a href="">Forms</a>
                    </li>
                    <li class="mt-5"><a href="">Smart Table</a>
                    </li>
                    <li class="mt-5"><a href="">Google Map</a>
                    </li>
                    <li class="mt-5"><a href="">Apps</a>
                    </li>
                    <li class="mt-5"><a href="">Base</a>
                    </li>
                    <li class="mt-5"><a href="">Button</a>
                    </li>


                </ul>
            </div>

        </div>

        <main class="relative left-52">
            {{ $slot }}
        </main>

    </div>
        </div>


=======
            <main>
                {{ $slot }}
            </main>
        </div>
>>>>>>> f0fbe1f3fb851607ff0b866645be0c5247768002
    </body>
</html>
