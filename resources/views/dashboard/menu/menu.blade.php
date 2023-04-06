<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>






    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="flex flex-row bg-white text-3xl h-20">
                        <h2 class="modal-title text-black relative top-4 left-28 font-bold"></h2>
                        <span class="material-symbols-outlined relative left-60 top-6 cursor-pointer" id="modaloff"
                            data-bs-dismiss="modal" aria-label="Close">
                            close
                        </span>
                    </div>
                </div>
                <div class="modal-body">
                    <form class="bg-white h-22" id="addmenuform">
                        @csrf

                        <input type="hidden" class="processFor" value="">
                        <input type="hidden" id="update_url">
                        <div class="py-4 px-4">
                            <x-input-label for="menuname" value="" class="text-lg" />
                            <x-text-input placeholder="Name" id="menuname"
                                class="w-full h-11 border-2 px-4 border-black" name="menu" />
                        </div>
                        <div class="text-danger ml-7 relative bottom-6 " id="menuerror"></div>
                        <div class="py-4 px-4">
                            <x-input-label for="menuname" :value="_('Menu item link')" class="text-lg" />
                            <x-text-input placeholder="Enter Link" id="menunlink"
                                class="w-full h-11 border-2 border-black px-4" name="menulinks" />
                        </div>
                        <div class="text-danger ml-7 relative bottom-6 " id="menulink"></div>
                        <div class="py-4 px-4 ">
                            <x-primary-button class="bg-blue-600" type="submit" id="savemenu">Add Menu item
                            </x-primary-button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>







    <div class="border-2 text-center h-10m my-8 py-4">
        <h1 class="text-2xl font-bold">Menu items</h1>
        <div>
            <span class="material-symbols-outlined text-green-600 add cursor-pointer px-2" data-bs-toggle="modal"
                data-bs-target="#exampleModal" type="button" data-title="AddMenu" data-name="Add menu" id="add_menu">
                add_circle
            </span>

        </div>
    </div>

    <div class="">
        <table id="menutable">
            <thead class="border-2">
                <tr>
                    <th class="w-64  border-2 text-center">Menu id</th>
                    <th class="w-64 border-2 text-center">Menu</th>
                    <th class="w-64 border-2 text-center">Route</th>
                    <th class="w-64 border-2 text-center">Action</th>
                </tr>
            </thead>
            <tbody id="tablebody">
                @foreach ($menus as $key => $menu)
                    <tr class="border-2">
                        <td class="text-center border-2" id="tmenuid">{{ $menu->id}}</td>
                        <td class="text-center border-2" id="tmenu">{{ $menu->menu }}</td>
                        <td class="text-center border-2" id="menulinks">{{ $menu->menulinks }}</td>
                        <td class="text-center border-2">
                            <a> <button type="button" id="edit_menu"
                                    class="bg-green-600 border-spacing-2 border-r-4 px-4 py-1 text-white rounded w-15 border-green-600 edits"
                                    value="{{ $menu->menuid }}">Edit</button>

                            </a>

                            <a href="">
                                <button type="button" value="{{ $menu->menuid }}"
                                    class="delet bg-red-600 border-spacing-2 border-r-4 px-4 py-1 text-white rounded w-15 border-red-600 ">Delete</button>
                            </a>

                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        <script>
            $('#menutable').DataTable();
        </script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>


        <script>
            $(document).ready(function() {


                $('.delet').click(function(e) {
                    e.preventDefault();
                    Swal.fire(
                        'Success!',
                        "deleted successfully",
                        'success'
                    )
                })
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var form = $('#addmenuform')[0];

                $('#savemenu').click(function(e) {
                    e.preventDefault();

                    var formdata = new FormData(form)
                    var url = '';
                    var method = '';
                    var processFor = $('.processFor').val();
                    if (processFor == 'add') {
                        url = "{{ route('menu.store') }}";
                        method = 'POST'
                        var msg = "Menu created"
                    }
                    var update_url = $('#update_url').val();
                    if (processFor == 'edit') {
                        url = update_url;
                        method = 'POST'
                        var msg = "Menu updated"
                    }
                    console.log(url)
                    //Ajax method for store product

                    $.ajax({
                        url: url,
                        method: method,
                        data: formdata,
                        processData: false,
                        contentType: false,
                        success: function(response) {

                            console.log(response.data)

                            Swal.fire(
                                'Success!',
                                msg,
                                'success'
                            )

                            $('#menutable').children('tbody').append('<tr>' +
                                '<td>' + response.data.id + '</td>' +
                                '<td>' + response.data.menu + '</td>' +
                                '<td>' + response.data.menulinks + '</td>' +
                                '<td>' + '<a href="">' +
                                '<button type="button" value="' + response.data.menu +
                                '" id="edit_menu"class="bg-green-600 border-spacing-2 border-r-4 px-4 py-1 text-white rounded w-15 border-green-600 edits" >' +
                                "Edit" + '</button>' + '</a>' +
                                '<a href="">' +
                                '<button type="button"class="delet bg-red-600 border-spacing-2 border-r-4 px-4 py-1 text-white rounded w-15 border-red-600 ">' +
                                "Delete" + '</button> ' + '</a>' + '</td>' + '</tr>')

                                $('#exampleModal').modal('hid');

                        },
                        error: function(error) {
                            console.log(error);
                            var errorlist = error.responseJSON.errors;
                            if (errorlist) {
                                errorlist.menu ?
                                    $('#menuerror').html(errorlist.menu) :
                                    $('#menuerror').empty()
                                errorlist.menulinks ?
                                    $('#menulink').html(errorlist.menulinks) :
                                    $('#menulink').empty()

                            }

                        }
                    })
                });


                $('body').on('click', '#edit_menu', function(e) {
                    e.preventDefault();
                    $('#exampleModal').modal('toggle');
                    $('.modal-title').text("Edit Menu");
                    $('#savemenu').text("SaveChanges");
                    var editid = $(this).val();
                    $('#menuerror').empty()
                    $('#menulink').empty()

                    var userurl = "{{ route('menu.edit', ':id') }}"
                    userurl = userurl.replace(':id', editid)
                    console.log(userurl);

                    $.ajax({
                        url: userurl,
                        method: 'GET',
                        success: function(response) {
                            console.log(response);
                            $("#menuname").val(response.data[0].menu)
                            $("#menunlink").val(response.data[0].menulinks);
                            var updateurl = "{{ route('menu.update', ':updateid') }}"
                            updateurl = updateurl.replace(':updateid', editid)
                            $('#update_url').val(updateurl)

                        },
                        error: function(error) {
                            console.log(error)
                        }
                    })

                    /*  var update_url = $(this).data('update-url')
                      $.get(userurl, function(data) {
                          console.log(data);
                          console.log($up);
                          $('#update_url').val(update_url)
                          $("#menuname").val(data[0].menu)
                          $("#menunlink").val(data[0].menulinks)




                      })*/



                })
                $('.delet').click(function() {
                    var deleteid = $(this).val();
                    var deleteurl = "{{ route('menu.delete', ':id') }}"
                    deleteurl = deleteurl.replace(':id', deleteid);
                    console.log(deleteurl);
                    $.ajax({
                        url: deleteurl,
                        method: 'GET',
                        success: function(data) {
                            console.log(data)
                            $()
                        },
                        error: function(error) {
                            console.log(error);

                        }
                    })
                })

            })
        </script>
        <script>
            $(document).ready(function() {

                $('#add_menu').click(function() {
                    var form = $('#addmenuform')[0];
                    form.reset();
                    $('.processFor').val('add');
                    $('.modal-title').text("")
                    $('.modal-title').text("ADD Menu")
                    $('#savemenu').text("")
                    $('#savemenu').text("Save Menu")

                })

                $('#edit_menu').click(function() {

                    $('.processFor').val('edit');
                })


            })
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</x-app-layout>
