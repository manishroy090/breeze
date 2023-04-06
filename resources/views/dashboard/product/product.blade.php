<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <form class=" flex justify-center" enctype="multipart/form-data" id="product">
        @csrf

        <div class="bg-slate-400 flex flex-col px-8 py-8 mt-8 ml-20">
            <div class="flex justify-center ">
                <span class="material-symbols-outlined text-5xl">
                    shopping_cart
                </span>
                <h1 class="text-center text-4xl">Add Product</h1>
            </div>
            <div class="flex flex-row mt-5">
                <div class=" w-2/4 ">
                    <x-text-input :type="'text'" placeholder="product name" id="product.name"
                        class="bg-white w-full rounded-none" name="name" />
                    <span class="text-danger" id="productnameerr"></span>
                </div>

                <div class="ml-5   w-2/4">
                    <x-select-input class="w-full " name="category" id="category" :categories="$categories"/>
                    <span class="text-danger" id="caterror"></span>
                </div>

            </div>
            <div class="flex flex-row mt-5 ">
                <div class=" w-2/4">
                    <x-text-input :type="'text'" placeholder="title" id="title"
                        class="bg-white w-full rounded-none" name="title" />
                    <span class="text-danger" id="titlerr"></span>
                </div>
                <div class="ml-5  w-2/4">
                    <x-text-input :type="'text'" placeholder="Summary" id="('Summary')"
                        class="bg-white w-full rounded-none" name="summary" />
                    <span class="text-danger" id="summaryerr"></span>
                </div>

            </div>
            <div class="flex flex-row mt-5">
                <div class=" w-2/4">
                    <x-text-input type="file" id="img" class="bg-white w-full rounded-none" name="img" />
                    <span class="text-danger" id="imgerr"></span>
                </div>
                <div class="ml-5  w-2/4">
                    <x-datepicker type="text" id="ed" class="bg-white w-64" name="ed" />
                    <span class="text-danger" id="ederr"></span>
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
                    <x-textarea placeholder="Describe your product here" name="description" id="description" />
                    <span class="text-danger" id="descriptionerr"></span>
                </div>


            </div>

            <div class="flex flex-row mt-20" id="btndiv">
                <x-primary-button class="w-50  h-14 hover:bg-green-300 hover:text-black" type="submit" id="savebtn">
                    {{ 'Add Product' }}</x-primary-button>

            </div>
        </div>
    </form>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

    <script>
        $( function() {
          $( "#ed" ).datepicker(
            { dateFormat: 'yy-mm-dd'
        }
          );
        } );
        </script>
    <script>
        $(function() {
            ClassicEditor
                .create(document.querySelector('#description'))
                .catch(error => {
                    console.error(error);
                });

        })
    </script>
    <script>
        $('#category').select2({
            placeholder: "Select Category",
            allowClear: true
        });
    </script>

    <script>

        $(document).ready(function() {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#product').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('product.store') }}",
                    method: 'POST',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    dataType: 'JSON',
                    success: function(response) {
                        if (response.sucess.length > 0) {
                            console.log(response);
                            alert("product added successful")

                        }

                    },
                    error: function(error) {
                        console.log(error);


                        var errorlist = error.responseJSON.errors;
                        if (errorlist) {
                            console.log(errorlist.name);
                            errorlist.name ?
                                $('#productnameerr').html(errorlist.name) :
                                $('#productnameerr').empty()
                            errorlist.category ?
                                $('#caterror"').html(errorlist.category) :
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
                                $('#imgerr').empty()
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


        })
    </script>



</x-app-layout>
