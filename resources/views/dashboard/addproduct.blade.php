<x-app-layout>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

   <form class=" flex justify-center" action="{{ url('/') }}/addproduct/store" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="bg-slate-400 flex flex-col px-8 py-8 mt-20">
        <div class="flex justify-center ">
            <span class="material-symbols-outlined text-5xl">
                shopping_cart
            </span>
            <h1 class="text-center text-4xl">Add Product</h1>
        </div>
        <div class="flex flex-row mt-5">
            <div class="bg-red w-2/4 ">
                <x-text-input :type="'text'" :placeholder="'Email'" id="('email')" class="bg-white  w-full rounded-none" name="email" />
            </div>
            <div class="ml-5 bg-white  w-2/4">
                <x-text-input :type="'text'" :placeholder="'product Name'" id="('productname')" class="bg-white w-full rounded-none" name="productname" />
            </div>

        </div>
        <div class="flex flex-row mt-5 ">
            <div class="bg-white w-2/4">
                <x-text-input :type="'text'" :placeholder="_('title')" id="('title')" class="bg-white w-full rounded-none" name="title" />
            </div>
            <div class="ml-5 bg-white w-2/4">
                <x-text-input :type="'text'" :placeholder="_('Summary')" id="('Summary')" class="bg-white w-full rounded-none" name="summary" />
            </div>

        </div>
        <div class="flex flex-row mt-5">
            <div class="bg-white w-2/4">
                <x-text-input :type="'file'"  id="('img')" class="bg-white w-full rounded-none" name="img"/>
            </div>
            <div class="ml-5 bg-white w-2/4">
                <x-datepicker :type="'text'"  id="('ed')" class="bg-white w-64" name="ed" />
            </div>

        </div>
        <div class="flex flex-row">
            <div class="">
                <x-input-radio-button :type="'text'"   :name="('quality')"/>
            </div>


        </div>
        <div class="flex flex-row">
            <div class="bg-white w-full h-11">
          <x-textarea name="description" :placeholder="('Describe your product here')"/>
            </div>


        </div>

        <div class="flex flex-row mt-16">
           <x-primary-button class="w-50 h-14 hover:bg-green-300 hover:text-black" type="submit">{{ ('Add_Product') }}</x-primary-button>

        </div>



    </div>





   </form>
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
    <script>
        $(function() {
            $('#ed').datepicker({
                dateFormat: 'yy/mm/dd',
                autoclose: true,
                todayHighlight: true
            });
        })
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
      </script>

</x-app-layout>
