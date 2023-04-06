<div>
    <div class="flex justify-center relative top-20 right-48">
        {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
        <form class="card card-body border-0 shadow mb-4 bg-white w-auto px-11 rounded-lg  h-auto py-6" wire:submit.prevent="store">
            <div class="">
                <h1 class="text-4xl">General information</h1>
            </div>
            <div class="flex flex-row mt-4">
                <div class="flex flex-col">
                    <label for="firstname" class="text-xl font-bold">First Name</label>
                    <input type="text" placeholder="Enter your first name" id="firstname"
                        class="border border-indigo-600 rounded h-9 w-80 text-xl" wire:model.defer="firstname" >
                       
                        @error('firstname')
                        <span class="text-red-600">{{ $message }}</span>
                @enderror

                </div>



                <div class="flex flex-col ml-10">
                    <label for="lastnam" class="text-xl font-bold" >Last Name</label>
                    <input type="text" placeholder="User" id="lastnam" class="border border-indigo-600 rounded h-9 w-80 text-xl" wire:model.defer="lastname">

                    @error('lastname')
                    <span class="text-red-600">{{ $message }}</span>
            @enderror

                </div>

            </div>

            <div class="flex flex-row mt-4">
                <div class="flex flex-col">
                    <label for="email" class="text-xl font-bold">email</label>
                    <input type="email" placeholder="Enter your email" id="email"
                        class="border border-indigo-600 rounded h-9 w-80 text-xl" wire:model.defer="email" >
                        @error('email')
                        <span class="text-red-600">{{ $message }}</span>
                @enderror


                </div>
                <div class="flex flex-col ml-10">
                    <label for="number" class="text-xl font-bold">Phone no</label>
                    <input type="tel" placeholder="Phone number" id="number"
                        class="border border-indigo-600 rounded h-9 w-80 text-xl" wire:model.defer="number">
                        @error('number')
                        <span class="text-red-600">{{ $message }}</span>
                @enderror


                </div>

            </div>
            <div class="flex flex-row mt-4">

                <div class="flex flex-col ">
                    <label for="status" class="text-xl font-bold">status</label>
                    <select id="status" class=" w-80 rounded" wire:model.defer="status">
                        <option selected="">Choose...</option>
                        <option value="Active">Active</option>
                        <option value="Pending">Pending</option>
                        <option value="Suspended">Suspended</option>
                    </select>
                    @error('status')
                    <span class="text-red-600">{{ $message }}</span>
            @enderror


                </div>
                <div class="flex flex-col ml-10 ">
                    <label for="role" class="text-xl font-bold">Role</label>
                    <select id="role" class="w-80 rounded" wire:model.defer="role">
                        <option selected="">Choose...</option>
                        <option value="Admin">Admin</option>
                        <option value="Creator">Creator</option>
                        <option value="Member">Member</option>
                    </select>
                    @error('role')
                    <span class="text-red-600">{{ $message }}</span>
            @enderror


                </div>

            </div>
            <div class="flex flex-row mt-4">
                <div class="flex flex-col">
                    <label for="password" class="text-xl font-bold">Password</label>

                    <input type="password" placeholder="Enter your Password" id="password"
                        class="border border-indigo-600 rounded h-9 w-80 text-xl" wire:model.defer="password">
                        @error('password')
                        <span class="text-red-600">{{ $message }}</span>
                @enderror


                </div>



                <div class="flex flex-col ml-10">
                    <label for="conpass" class="text-xl font-bold" >Confirm Password</label>
                    <input type="password" placeholder="Confirm Password" id="conpass" class="border border-indigo-600 rounded h-9 w-80 text-xl" wire:model.defer="confirmpass">
                    @error('confirmpass')
                    <span class="text-red-600">{{ $message }}</span>
            @enderror


                </div>

            </div>
            <div>
                <button class="bg-gray-900 text-white rounded py-2 px-4 mt-4" type="submit">Save all</button>
            </div>


        </form>


    </div>

</div>
