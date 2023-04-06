<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!--Font Awosome -->
    <script src="https://kit.fontawesome.com/27c4fe563d.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Google fonts-->
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--bootstrap css cdn-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!--datatable css -->
    
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <!--datatable js -->
    
    
    
    <!-- Select2 css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Tailwind css -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!--jquery js  CDN-->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>

 <!-- jquery ajax cdn -->

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- jquery UI css cdn -->
 <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

 <!-- select2 CDN -->
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <!--datatable js -->
 <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>


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

        <div class="flex flex-row bg-gray-100">

            <div class="bg-gray-900  w-44 h-full">
                <div class="flex ">
                    <img src="{{ asset('img/logo.png') }}" class="w-20">
                    <h1 class="relative top-5 right-5 text-lg text-white">Dashboard</h1>
                </div>
                <div class="">
                    <ul class=" text-white">
                        <li class="mt-5 hover:bg-slate-500  rounded pt-4 pb-4 pl-4 ">
                            <a class="categorybtn text-decoration-none hover:text-white">
                                Category
                                <span class="material-symbols-outlined relative top-2 left-10 text-base">
                                    chevron_right
                                </span>
                            </a>
                            <ul class="pt-2 categorydropdown">
                                <li class="hover:bg-red-500 pt-3 pb-3 pl-4 pr-4 rounded w-full"> <a
                                    href="{{ route('category.index') }}" class="text-decoration-none hover:text-white">Add Category</a></li>
                                </ul>
                            </li>

                        <li class="mt-2 hover:bg-slate-500  rounded pt-4 pb-4 pl-4  ">
                            <a class="productbtn text-decoration-none hover:text-white">
                                Product
                                <span class="material-symbols-outlined relative top-2 left-10 text-base">
                                    chevron_right
                                </span>
                            </a>
                            <ul class="pt-2  productdropdown">
                                <li class="hover:bg-red-500 pt-3 pb-3 pl-4 pr-4 rounded w-full "> <a
                                    href="{{ route('product.create') }}" class="text-decoration-none hover:text-white">Add product</a></li>
                                    <li class="hover:bg-red-500  pt-3 pb-3 pl-4 pr-4 rounded "> <a
                                        href="{{ route('product.index') }}" class="text-decoration-none hover:text-white">product</a></li>
                                    </ul>
                                </li>
                                <li class="mt-2€ hover:bg-slate-500  rounded pt-4 pb-4 pl-4 ">
                                    <a class="menubtn text-decoration-none hover:text-white">
                                        Menu
                                        <span class="material-symbols-outlined relative top-2 left-10 text-base">
                                            chevron_right
                                        </span>
                                    </a>
                                    <ul class="pt-2 menudropdown">
                                        <li class="hover:bg-red-500 pt-3 pb-3 pl-4 pr-4 rounded w-full"> <a
                                            href="{{ route('menu.create') }}" class="text-decoration-none hover:text-white">Add Menu</a></li>
                                        </ul>
                                    </li>
                                    <li class="mt-2€ hover:bg-slate-500  rounded pt-4 pb-4 pl-4 ">
                                        <a class="userbtn text-decoration-none hover:text-white">
                                            User
                                            <span class="material-symbols-outlined relative top-2 left-10 text-base">
                                                chevron_right
                                            </span>
                                        </a>
                                        <ul class="pt-2 userdropdown">

                                                <li class="hover:bg-red-500 pt-3 pb-3 pl-4 pr-4 rounded w-full"> <a
                                                    href="{{ route('user.index') }}" class="text-decoration-none hover:text-white">Users</a></li>
                                            </ul>
                                        </li>

                        <li class="mt-2 hover:bg-slate-500 pt-3 pb-3 pl-4 pr-4 rounded"><a href="" class="text-decoration-none hover:text-white">icon</a>
                        </li>
                        <li class="mt-2 hover:bg-slate-500 pt-3 pb-3 pl-4 pr-4 rounded"><a
                            href="" class="text-decoration-none hover:text-white ">Notification</a>
                        </li>
                        <li class="mt-2 hover:bg-slate-500 pt-3 pb-3 pl-4 pr-4 rounded"><a href="" class="text-decoration-none hover:text-white">Widget</a>
                        </li>
                        <li class="mt-2 hover:bg-slate-500 pt-3 pb-3 pl-4 pr-4 rounded"><a href="" class="text-decoration-none hover:text-white">Pages</a>
                        </li>
                        <li class="mt-2 hover:bg-slate-500 pt-3 pb-3 pl-4 pr-4 rounded"><a href="" class="text-decoration-none hover:text-white">Pages</a>
                        </li>
                        <li class="mt-2 hover:bg-slate-500 pt-3 pb-3 pl-4 pr-4 rounded"><a href="" class="text-decoration-none hover:text-white">Pages</a>
                        </li>
                        <li class="mt-2 hover:bg-slate-500 pt-3 pb-3 pl-4 pr-4 rounded"><a href="" class="text-decoration-none hover:text-white">Pages</a>
                        </li>
                    </ul>
                </div>

            </div>

            <main class="relative left-52 ">
                {{ $slot }}
            </main>

        </div>
    </div>








    <!-- bootstrap cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>


<!-- cakeeditor script -->



<!-- jquery for dropdown menu -->
<script>
    $(document).ready(function() {
        $('.productdropdown').css('display', 'none')
        $('.menudropdown').css('display', 'none')
        $('.categorydropdown').css('display','none')
        $('.userdropdown').css('display','none')
        $('.productbtn').click(function(e) {
            e.preventDefault()
            $('.productdropdown').fadeToggle(200);

        })

        $('.menubtn').click(function(e) {
            e.preventDefault()
            $('.menudropdown').fadeToggle(200);

        })
        $('.userbtn').click(function(e) {
            e.preventDefault()
            $('.userdropdown').fadeToggle(200);

        })

        $('.categorybtn').click(function(e){
            e.preventDefault();
            $('.categorydropdown').fadeToggle(200);
        })


        })
    </script>





</body>

</html>
