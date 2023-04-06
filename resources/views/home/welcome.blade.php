<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>

        <nav class="">

            <ul class="flex bg-indigo-300 bg-white border-b-2  h-14">

                @if (Route::has('login'))

                    @auth
                        <li class="px-8 py-4 hover:bg-black hover:text-white"> <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        @foreach ($menus as $key => $menu)
                            <li class="px-8 py-4 hover:bg-black hover:text-white"><a
                                    href="{{ route('menu', $menu->menulinks) }}">{{ $menu->menu }} </a></li>
                        @endforeach
                    @else
                        <li class="px-8 py-4 hover:bg-black hover:text-white"> <a href="{{ route('login') }}">Log in</a>
                        <li>

                            @if (Route::has('register'))
                        <li class="px-8 py-4 hover:bg-black hover:text-white"> <a
                                href="{{ route('register') }}">Register</a></li>
                    @endif
                @endauth

                @endif


            </ul>
        </nav>
    </header>




</body>

</html>
