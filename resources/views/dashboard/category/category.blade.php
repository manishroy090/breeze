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
                    <form class="bg-white h-22" id="addCategory">
                        @csrf

                        <input type="hidden" class="processFor" value="">
                        <input type="hidden" class="updateurl" value="">
                        <input type="hidden" class="deletel" value="">
                    
                        <div class="py-4 px-4">
                            <x-input-label for="menuname" value="" class="text-lg" />
                            <x-text-input placeholder="Name" id="categoryname"
                                class="w-full h-11 border-2 px-4" name="category" />
                        </div>
                        <div class="text-danger ml-7 relative bottom-6 " id="categoryerror"></div>

                        <div class="py-4 px-4 ">
                            <x-primary-button class="bg-blue-600" type="submit" id="savemenu">Add Category
                            </x-primary-button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="border-2 text-center h-10m my-8 py-4">
        <h1 class="text-2xl font-bold">Category items</h1>
        <div>
            <span class="material-symbols-outlined text-green-600 add cursor-pointer px-2" data-bs-toggle="modal"
                data-bs-target="#exampleModal" type="button" data-title="AddMenu" data-name="Add menu"
                id="add_category">
                add_circle
            </span>

        </div>
    </div>

    <div class="">
        <table id="myTable">
            <thead class="border-2">
                <tr>
                    <th class="w-64  border-2 text-center">Category id</th>
                    <th class="w-64 border-2 text-center">Category</th>
                    <th class="w-64 border-2 text-center">Action</th>

                </tr>
            </thead>
            <tbody id="tablebody">
                @foreach ($categories as $key => $category)
                <tr class="border-2" id="{{$category->id}}">
                    <td class="text-center border-2" id="categoryid">{{ $category->id }}</td>
                    <td class="text-center border-2" id="categoryname">{{ $category->category }}</td>

                    <td class="text-center border-2">

                        <button type="button" editcategory
                            class="  editcategory bg-green-600 border-spacing-2 border-r-4 px-4 py-1 text-white rounded w-15 border-green-600 edits"
                            data-bs-toggle="modal" data-bs-target="#exampleModal" data-title="Edit Menu"
                            data-name="Save Changes" data-url="{{ route('category.edit', ['id' => $category->id]) }}"
                            data-updateurl="{{ route('category.update', ['id' => $category->id]) }}">Edit</button>




                        <button type="button"
                            class="delet bg-red-600 border-spacing-2 border-r-4 px-4 py-1 text-white rounded w-15 border-red-600 "
                            data-url="{{route('category.delete',['id'=>$category->id])}}">Delete</button>


                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

        <script>
        $(document).ready(function() {
            $('.modal-title').text('Add Category')


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



            $('#add_category').click(function() {
                $('.processFor').val("add")

                var form = $('#addCategory')[0];
                form.reset();
            })


            $('.editcategory').click(function() {

                $('.processFor').val("edit")



            })
            $('.deletel').click(function(){
                $('.processFor').val("delete")
            })


            $('#addCategory').on('submit', function(e) {
                e.preventDefault();
                var url = '';
                var processfor = $('.processFor').val();

                if (processfor == "add") {
                    url = '{{route("category.store")}}';

                }
                var update = $('.updateurl').val()
                if (processfor == "edit") {
                    url = update;

                }

                $.ajax({
                    url: url,
                    method: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        Swal.fire(
                            'Success!',
                            response.storeresult,
                            'success'
                        )
                        console.log(response);
                        if (processfor == "add") {

                            var tr = "<tr class='border-2'>" +
                                "<td class='text-center border-2'>" +
                                response.data.id + "</td>" +
                                "<td class='text-center border-2' id='categoryname'>" +
                                response.data.category +
                                "</td>" + "<td class='text-center border-2'>" +
                                " <button type='button' id='edit_category' class='bg-green-600 border-spacing-2 border-r-4 px-4 py-1 text-white rounded w-15 border-green-600 edits'>Edit</button>" +
                                "<button type='button' id='' class='delet bg-red-600 border-spacing-2 border-r-4 px-4 py-1 text-white rounded w-15 border-red-600 ml-1'>delete</button>" +
                                "</td>" + "<tr>";
                            var tbody = $('#tablebody').append(tr);


                        }
                        if (processfor == "edit") {
                            $('#' + response.data.id).find('#categoryname').html(response
                                .data.category)

                        }


                        $('#exampleModal').modal('hide');

                    },
                    error: function(error) {
                        console.log(error);

                    }
                })
            })
            $('.editcategory').click(function() {
                var editurl = $(this).data('url');
                var update = $(this).data('updateurl');
                $('.updateurl').val(update);
               



                $.ajax({
                    url: editurl,
                    method: 'GET',
                    success: function(response) {

                        $('#categoryname').val(response.data[0].category)

                    },
                    error: function(error) {
                        console.log(error);

                    }

                })
            })
            $('.delet').click(function() {
                var deleturl=$(this).data('url');
               $.ajax({
                url:deleturl,
                method:"GET",
                success:function(response){
                  console.log(response);
                  $("#"+response.data.id).remove()
                },
                error:function(error){
                    console.log(error)
                }
               })
               
            })
           
        })
        </script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</x-app-layout>