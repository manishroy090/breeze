<x-app-layout>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="flex flex-row bg-white text-3xl h-20">
                        <h2 class=" text-black relative top-4 left-28 font-bold ">Add menu</h2>
                        <span class="material-symbols-outlined relative left-60 top-6 cursor-pointer" id="modaloff">
                            close
                        </span>
                    </div>
                </div>
                <div class="modal-body">
                    <form class="bg-white  h-22   " action="{{ url('/') }}/addmenu/store" method="POST">
                        @csrf


                        <div class="py-4 px-4">
                            <x-input-label for="menuname" :value="_('Menu Name')" class="text-lg" />
                            <x-text-input placeholder="Name" id="menuname"
                                class="w-full h-11 border-2 px-4 border-black" name="menu" />
                        </div>
                        <div class="py-4 px-4">
                            <x-input-label for="menuname" :value="_('Menu item link')" class="text-lg" />
                            <x-text-input placeholder="Enter Link" id="menuname"
                                class="w-full h-11 border-2 border-black px-4" name="menulinks" />
                        </div>
                        <div class="py-4 px-4">
                            <x-primary-button class="bg-blue-600" type="submit">Add Menu item</x-primary-button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="flex flex-row bg-white text-3xl h-20">
                        <h2 class=" text-black relative top-4 left-28 font-bold ">Edit menu</h2>
                        <span class="material-symbols-outlined relative left-60 top-6 cursor-pointer" id="editmodaloff">
                            close
                        </span>
                    </div>
                </div>
                <div class="modal-body">
                    <form class="bg-white  h-22   " action="{{ url('/') }}/addmenu/store" method="POST">
                        @csrf


                        <div class="py-4 px-4">
                            <x-input-label for="menuname" :value="_('Menu Name')" class="text-lg" />
                            <x-text-input placeholder="Name" id="menuname"
                                class="w-full h-11 border-2 px-4 border-black" name="menu" />
                        </div>
                        <div class="py-4 px-4">
                            <x-input-label for="menuname" :value="_('Menu item link')" class="text-lg" />
                            <x-text-input placeholder="Enter Link" id="menuname"
                                class="w-full h-11 border-2 border-black px-4" name="menulinks" />
                        </div>
                        <div class="py-4 px-4">
                            <x-primary-button class="bg-blue-600" type="submit">Save changes</x-primary-button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>







        <div class="border-2 text-center h-10m my-8 py-4">
            <h1 class="text-2xl font-bold">Menu items</h1>
            <div>
                <span class="material-symbols-outlined text-green-600 add cursor-pointer px-2">
                    add_circle
                </span>
            </div>
        </div>

        <div class="">
            <table id="table border-2 bg-white">
                <thead class="border-2">
                    <tr>
                        <th class="w-64  border-2 text-center">Menu id</th>
                        <th class="w-64 border-2 text-center">Menu</th>
                        <th class="w-64 border-2 text-center">Route</th>
                        <th class="w-64 border-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $key => $menu)
                        <tr class="border-2">
                            <td class="text-center border-2">{{$menu->menuid }}</td>
                            <td class="text-center border-2">{{ $menu->menu }}</td>
                            <td class="text-center border-2">{{ $menu->menulinks }}</td>
                            <td class="text-center border-2">
                                <a href="{{ route('edit',['id'=>$menu->menuid]) }}" >
                                    <button type="button"
                                        class="bg-green-600 border-spacing-2 border-r-4 px-4 py-1 text-white rounded w-15 border-green-600 edits">Edit</button>

                                </a>

                                <a href="{{ route('delete', ['id' => $menu->menuid]) }}">
                                    <button type="button"
                                        class="delet bg-red-600 border-spacing-2 border-r-4 px-4 py-1 text-white rounded w-15 border-red-600 ">Delete</button>
                                </a>

                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>

        <script>
            let modalon = document.getElementsByClassName('add');
            Array.from(modalon).forEach((element) => {
                element.addEventListener("click", (e) => {
                    $('#exampleModal').modal('toggle');
                });
            });
            let modalclose = document.getElementById('modaloff');
            modalclose.addEventListener('click', function() {
                $('#exampleModal').modal('hide');
            })
            let edits = document.getElementsByClassName('edits');
            Array.from(edits).forEach((element) => {
                element.addEventListener("click", (e) => {
                    event.preventDefault();
                    $('#editModal').modal('toggle');
                });
            });
            let check = document.getElementById('editmodaloff');
            check.addEventListener('click', function() {
                $('#editModal').modal('hide');

            })

        </script>


</x-app-layout>
