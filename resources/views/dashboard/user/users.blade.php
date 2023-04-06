<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
    <nav class="flex flex-row  justify-end  relative -right-60 top-10">
        <a href="{{route('user.create') }}">
            <div class="bg-gray-600 w-28 py-2 px-2 text-white rounded mr-4  cursor-pointer">

                <i class="fa-solid fa-plus"></i>
                New User
            </div>

        </a>

        <div class="flex flex-row  w-32">
            <div
                class="border-2 border-slate-600 px-2 py-2 rounded-l-lg border-r-none hover:bg-slate-500 hover:text-white cursor-pointer hover:border-slate-500">
                Share</div>
            <div
                class=" border-2 border-slate-600 px-2 py-2 rounded-r-lg hover:bg-slate-500 hover:text-white cursor-pointer  hover:border-slate-500">
                Export</div>
        </div>
    </nav>

    <table id="producttable" class="relative right-48 top-14">
        <thead class="bg-blue-100 h-14">
            <tr>
                <th class="pr-20 ">ID</th>
                <th class="pr-20">FirstName</th>
                <th class="pr-20">LastName</th>
                <th class="pr-20">Email</th>
                <th class="pr-20">Phone</th>
                <th class="pr-20">Status</th>
                <th class="pr-20">Role</th>
                <th class="pr-20">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key=>$user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->lastname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->number }}</td>

                    <td>{{$user->status }}</td>
                    <td>{{ $user->role }}</td>

                    <td>
                        <button type="button"
                            id="editproduct"class="bg-green-600 border-spacing-2 border-r-4 px-4 py-1 text-white rounded w-15 border-green-600 edits" wire.click="edit">Edit</button>
                        <a href="">
                            <button type="button"
                                class="delet bg-red-600 border-spacing-2 border-r-4 px-4 py-1 text-white rounded w-15 border-red-600 ">Delete</button>
                        </a>

                    </td>
                </tr>
            @endforeach



        </tbody>

    </table>
  

</x-app-layout>
