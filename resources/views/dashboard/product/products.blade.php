<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/datatable.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Button trigger modal -->
    <div class="bg-blue-100 relative right-48 top-8 h-28 pl-22 flex rounded">
        <h1 class="text-3xl relative top-10 left-16 font-mono">Product Management</h1>
        <button type="button"
            class="bg-green-600 font-mono text-white rounded px-4 w-52 pt-2 h-10 flex relative top-14 left-96"
            data-toggle="modal" data-target="#exampleModal" id="addproduct">
            New Product
            <span class="material-symbols-outlined relative bottom-1 ml-4 text-2xl ">
                add
            </span>
        </button>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ri " role="document">
            <div class="modal-content bg-slate-400 pr-4 ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <form id="product">
                        <div class="flex justify-center ">
                            <span class="material-symbols-outlined text-5xl">
                                shopping_cart
                            </span>
                            <h1 class="text-center text-4xl">Add Product</h1>
                        </div>
                        <div class="flex flex-row mt-2">
                            <div class="">
                                <x-text-input :type="'text'" placeholder="Product Name" id="productname"
                                    class="" name="name" />
                                <input type="hidden" id="hidenel">
                                <input type="hidden" id="updateurl">
                                <span class="text-danger" id="nameerror"></span>
                            </div>

                            <div class="ml-5   w-2/4">
                                <x-select-input class="w-full " name="category" id="category" style="height: 60px"
                                    :categories="$categories" />
                                <span class="text-danger" id="caterror"></span>
                            </div>
                        </div>
                        <div class="flex flex-row mt-5 ">
                            <div class=" w-2/4">
                                <x-text-input :type="'text'" placeholder="Title" id="title" class=""
                                    name="title" />
                                <span class="text-danger" id="titlerr"></span>
                            </div>
                            <div class="ml-5  w-2/4">
                                <x-text-input :type="'text'" placeholder="Summary" id="Summary" class="w-52"
                                    name="summary" />
                                <span class="text-danger" id="summaryerr"></span>
                            </div>
                        </div>


                        <div class="flex flex-row mt-5 ">
                            <div class="">
                                <x-text-input type="file" id="imggg" value=""
                                    class="bg-white w-full rounded-none" name="img" />
                                <img src="" width="100" height="100" id="productimg">
                                <span class="text-danger" id="imgerr"></span>
                            </div>
                            <div class="flex-col">
                                <div class="ml-5 flex bg-white  rounded">
                                    <input type="text" id="ed" name="ed" class="w-44 border-none"
                                        placeholder="Select Date">
                                    <span class="material-symbols-outlined relative top-2 right-6">
                                        calendar_month
                                    </span>

                                </div>
                                <span class="text-danger ml-6" id="ederr"></span>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="">
                                <x-input-radio-button name="quality" id="quality" />
                                <span class="text-danger" id="qualityerr"></span>
                            </div>


                        </div>
                        <div class="flex flex-row">
                            <div class=" w-full h-11">
                                <x-textarea placeholder="Describe your product here" name="description"
                                    id="description" />
                                <span class="text-danger" id="descriptionerr"></span>
                            </div>
                        </div>
                </div>
                <div class="modal-footer mt-14">
                    <x-primary-button type="submit">Add</x-primary-button>

                </div>
                </form>
            </div>
        </div>
    </div>
    <div>


        <table id="producttable" class="relative right-48 top-14">
            <thead class="bg-blue-100 h-14">
                <tr>
                    <th class="pr-20 ">ID</th>
                    <th class="pr-20">Product_name</th>
                    <th class="pr-20">Cateory</th>
                    <th class="pr-20">Title</th>
                    <th class="pr-20">Summery</th>
                    <th class="pr-20">images</th>
                    <th class="pr-20">Quality</th>
                    <th class="pr-20">Description</th>
                    <th class="pr-20">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->summary }}</td>

                        <td><img src="{{ asset('/storage/uploads/' . $product->img) }}"
                                style="width: 100px; height:100px;"></td>
                        <td>{{ $product->quality }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <button type="button"
                                id="editproduct"class="bg-green-600 border-spacing-2 border-r-4 px-4 py-1 text-white rounded w-15 border-green-600 edits"
                                data-toggle="modal" data-target="#exampleModal"
                                data-url={{ route('product.edit', ['id' => $product->id]) }}
                                data-updaturl={{ route('product.update', ['id' => $product->id]) }}>Edit</button>
                            <a href="{{ route('product.destroy', ['id' => $product->id]) }}">
                                <button type="button"
                                    class="delet bg-red-600 border-spacing-2 border-r-4 px-4 py-1 text-white rounded w-15 border-red-600 ">Delete</button>
                            </a>

                        </td>
                    </tr>
                @endforeach



            </tbody>

        </table>
        <script>
            $('#producttable').DataTable();
        </script>


        <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
        {{-- <script>
            $(function() {
                let YourEditor;

                ClassicEditor
                    .create(document.querySelector('#description'))
                    .then(editor => {
                        window.editor = editor;
                        YourEditor = editor;
                    })

            })
        </script> --}}

        {{--     --}}
        <script>
            $(function() {
                $('#ed').datepicker({
                    dateFormat: 'yy-mm-dd'
                });

            })
        </script>
        <!-- Ajax for get data and post data -->
        <script>
            $('#category').select2(

            );
            $(document).ready(function() {


                let YourEditor;

                ClassicEditor
                    .create(document.querySelector('#description'))
                    .then(editor => {
                        window.editor = editor;
                        YourEditor = editor;
                    })

                $('#addproduct').click(function() {
                        $('#hidenel').val("add");
                        var form = $('#product')[0];
                        form.reset();
                        var img = $('#productimg').css('display', 'none')
                        console.log(img)
                        $('#category').select2('destroy');
                        $('#category').select2()
                        YourEditor.setData('');
                        $('#titlerr').empty()
                        $('#summaryerr').empty()
                        $('#imgerr').empty()
                        $('#ederr').empty()
                        $('qualityerr').empty()
                        $('#descriptionerr').empty()

                    }

                )


                $('#editproduct').click(function() {
                    $('#hidenel').val("edit");

                })


                $('#product').on('submit', function(e) {
                    e.preventDefault();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var url = '';
                    var method = '';
                    var hiddele = $('#hidenel').val();
                    if (hiddele == 'add') {
                        url = "{{ route('product.store') }}"
                        method = "POST"
                        msg = "product added Successfully"

                    }

                    var updaturl = $('#updateurl').val();
                    if (hiddele == "edit") {
                        url = updaturl;
                        method = "POST"
                        msg = "product updated successfully"
                    }
                    YourEditor.getData();
                    var errorlist = '';
                    console.log(url)
                    $.ajax({
                        url: url,
                        method: method,
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function(response) {
                                console.log(msg);
                                Swal.fire(
                                    'Success!',
                                    msg,
                                    'success'
                                )

                            }

                            ,
                        error: function(error) {
                            console.log(error);
                            errorlist = error.responseJSON.errors;
                            if (errorlist) {
                                errorlist.name ?
                                    $('#nameerror').html(errorlist.name) :
                                    $('#nameerror').empty()
                                errorlist.category ?
                                    $('#categorerr').html(errorlist.category) :
                                    $('#nameerror').empty()
                                errorlist.title ?
                                    $('#titlerr').html(errorlist.title) :
                                    $('#titlerr').empty()
                                errorlist.summary ?
                                    $('#summaryerr').html(errorlist.summary) :
                                    $('#summaryerr').empty()
                                errorlist.img ?
                                    $('#imgerr').html(errorlist.img) :
                                    $('#imgerr').empty()
                                errorlist.ed ?
                                    $('#ederr').html(errorlist.ed) :
                                    $('#ederr').empty()
                                errorlist.quality ?
                                    $('#qualityerr').html(errorlist.quality) :
                                    $('qualityerr').empty()
                                errorlist.description ?

                                    $('#descriptionerr').html(errorlist.description) :
                                    $('#descriptionerr').empty()

                            }
                        }
                    })

                })



                $('body').on('click', '#editproduct', function(e) {
                    $('#titlerr').empty()
                    $('#summaryerr').empty()
                    $('#imgerr').empty()
                    $('#ederr').empty()
                    $('qualityerr').empty()
                    $('#descriptionerr').empty()
                    var geturl = $(this).data('url');
                    var updateurl = $(this).data('updaturl');

                    $.ajax({
                        url: geturl,
                        method: 'GET',
                        success: function(data) {
                            $('#productname').val(data[0].name)
                            $('#title').val(data[0].title);
                            $('#Summary').val(data[0].summary);
                            $('#ed').val(data[0].ed);
                            var img = "{{ asset('storage/uploads/') }}" + '/' + data[0].img;
                            $('#productimg').attr('src', img)
                            $('#category').select2('destroy');
                            $('#category').val(data[0].category)
                            $('#category').select2()
                            YourEditor.setData(data[0].description);
                           var check= $('#updateurl').val(updateurl);
                           console.log(check);





                            //    var des=CKEDITOR.instances['description'];
                            //    console.log(des);
                        },
                        error: function(error) {
                            console.log(error)
                        }
                    })

                })
            })
        </script>


</x-app-layout>
