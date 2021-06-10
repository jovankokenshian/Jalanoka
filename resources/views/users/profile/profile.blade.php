@extends('layouts.app')

@section('content')
    <div class="w-full relative mt-0 shadow-2xl rounded my-24 overflow-hidden">

        <div class="top h-64 w-full bg-blue-600 overflow-hidden relative">
            <img src="https://images.unsplash.com/photo-1503264116251-35a269479413?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                alt="" class="bg w-full h-full object-cover object-center absolute z-0">
            <div class="flex flex-col justify-center items-center relative h-full bg-black bg-opacity-50 text-white">
                <form id="image_form" action="{{ route('profile.update_image') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="relative inline-block">
                        <img src="{{Storage::disk('s3')->url($user->profile_image) }}"
                            class="h-24 w-24 object-cover rounded-full">
                        <div id="upfile1"
                            class="opacity-0 hover:opacity-100 rounded-full hover:bg-gray-400 hover:bg-opacity-25 duration-300 absolute inset-0 z-10 flex justify-center items-center text-white font-semibold text-sm text-center select-none
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            @error('profile_image') border-red-500 @enderror">
                            Change your picture</div>

                        <span
                            class="absolute bottom-0 right-0 inline-block w-8 h-8 bg-plus object-scale-down object-center "></span>

                        <input id="file1" name="profile_image" type="file" style="display:none"
                            onchange="image_form.submit()" />
                    </div>
                </form>
                @error('profile_image')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <h1 class="text-2xl font-semibold">{{ $user->name }}</h1>
                <h4 class="text-sm font-semibold">Joined since {{ $user->created_at->diffForHumans() }}</h4>
            </div>
        </div>
        <div class="grid grid-cols-12 bg-white ">

            <div
                class="col-span-12 w-full px-3 py-6 justify-center flex space-x-4 border-b border-solid md:space-x-0 md:space-y-4 md:flex-col md:col-span-2 md:justify-start ">

                <a href="#" class="text-sm p-2 bg-indigo-900 text-white text-center rounded font-bold">Basic Information</a>

                <a href="#"
                    class="text-sm p-2 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200">Another
                    Information</a>

                <a href="#"
                    class="text-sm p-2 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200">Another
                    Something</a>

            </div>

            <div
                class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">
                <div class="px-4 pt-4">

                    <div>
                        <h3 class="text-2xl font-semibold">Change Profile</h3>
                        <hr>
                    </div>
                    {{-- @if (session('message'))
                        <div class="text-center">
                            <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                href="{{ route('login') }}">
                                {{ session('message') }}
                            </a>
                        </div>
                    @endif --}}

                    <form action="{{ route('profile.update_info') }}" method="post" class="flex flex-col space-y-8">
                        @csrf
                        <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">

                            <div class="form-item w-full">
                                <label class="text-xl">Name</label>
                                <input type="text" value="{{ $user->name }}" name="name"
                                    class="w-full text-black rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 @error('name') border-red-500 @enderror">
                                @error('name')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-item w-full">
                                <label class="text-xl">Date of Birth</label>
                                <input type="date" value="{{ $user->date_of_birth }}" name='date_of_birth'
                                    class="w-full text-black rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200">
                            </div>
                        </div>

                        <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">

                            <div class="form-item w-full">
                                <label class="text-xl">Phone Number</label>
                                <input type="text" value="{{ $user->phone }}" name="phone"
                                    class="w-full text-black rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 @error('phone') border-red-500 @enderror">
                                @error('phone')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-item w-full">
                                <label class="text-xl">Email</label>
                                <input type="text" value="{{ $user->email }}"
                                    class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200"
                                    disabled>
                            </div>

                        </div>
                        <div class="flex flex-col justify-center space-y-4 md:space-y-0 md:flex-row md:space-x-4">
                            <div class="mb-6 text-center">
                                <button
                                    class="px-4 py-1 text-sm w-40 mr-12 font-medium text-center text-black bg-green-300 transition duration-300  hover:scale-110 ease-out transform border rounded hover:bg-green-400"
                                    type="submit">
                                    Update Profile
                                </button>
                            </div>
                        </div>


                    </form>

                    <div>
                        <h3 class="text-2xl font-semibold ">Change Password</h3>
                        <hr>
                    </div>
                    <form method="post" action="{{ route('profile.update_pass') }}" class="flex flex-col space-y-8">
                        @csrf
                        <div class="mb-6 form-item">
                            <label class="text-xl">Old Password</label>
                            <input type="password" placeholder="*************" name="old_password"
                                class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                @error('old_password') border-red-500 @enderror"
                                value="">
                            @error('old_password')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">

                            <div class="form-item w-full">
                                <label class="text-xl">New Password</label>
                                <input type="password" placeholder="*************" name="password"
                                    class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    @error('password') border-red-500 @enderror"
                                    value="">
                                @error('password')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-item w-full">
                                <label class="text-xl">Confirm New Password</label>
                                <input type="password" placeholder="*************" name="password_confirmation"
                                    class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    @error('password_confirmation') border-red-500 @enderror"
                                    value="">
                                @error('password_confirmation')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-col justify-center space-y-4 md:space-y-0 md:flex-row md:space-x-4">
                            <div class="mb-6 text-center">
                                <button
                                    class="px-4 py-1 text-sm w-40 mr-12 font-medium text-center text-black bg-green-300 transition duration-300  hover:scale-110 ease-out transform border rounded hover:bg-green-400"
                                    type="submit">
                                    Update Password
                                </button>
                            </div>
                        </div>
                    </form>
                    <div>
                        <h3 class="text-2xl font-semibold">Currently Booked Hotel Room Lists</h3>
                        <hr>
                    </div>
                    <div class="grid gap-6 grid-cols-1 xl:grid-cols-2 mt-6" id="entryDiv">
                        @foreach ($transactions as $transaction)
                            <div data-aos="fade-right" data-aos-offset="200" data-aos-delay="50" data-toggle="modal"
                                data-target="{{ '#booked-' . $transaction->id }}"
                                class="cursor-pointer sm:grid grid-cols-5 bg-white shadow-2xl relative lg:max-w-3xl sm:p-4 rounded-lg hover:scale-105 ease-out transform transition duration-300 submit">
                                <div class="flex items-end justify-end w-full bg-cover  rounded-lg"
                                    style="background-image: url('{{ Storage::disk('s3')->url($transaction->room->room_image) }}')">
                                </div>
                                <div class="self-center px-4 py-4 sm:px-0 sm:py-0 sm:pl-10 col-span-3">
                                    <h2 class="text-gray-800 capitalize text-xl font-bold ">
                                        {{ $transaction->room->hotel->name }} - {{ $transaction->room->name }}
                                    </h2>
                                    <br>
                                    Orderer: <p class="pt-2 sm:pt-0 capitalize underline inline-block">
                                        {{ $transaction->name }}
                                    </p>
                                </div>
                            </div>
                            <div id="{{ 'booked-' . $transaction->id }}" class="modal fade items-center" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title font-semibold">Invoice No.
                                                {{ sprintf('%02s', $transaction->id) }}-{{ sprintf('%02s', $user->id) }}/{{ sprintf('%04s', $transaction->room->id) }}
                                            </h3>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body flex flex-col px-6 py-5 bg-gray-50">
                                            <h4 class="text-gray-800 capitalize text-xl font-bold mb-5">
                                                {{ $transaction->room->hotel->name }} - {{ $transaction->room->name }}
                                            </h4>
                                            <pre><b>{{ str_pad('Orderer', 20, ' ') }}:</b>      {{ $transaction->name }}</pre>
                                            <pre><b>{{ str_pad('Email', 20, ' ') }}:</b>      {{ $transaction->email }}</pre>
                                            <pre><b>{{ str_pad('Phone Number', 20, ' ') }}:</b>      {{ $transaction->phone }}</pre>
                                            <pre><b>{{ str_pad('Room Ordered', 20, ' ') }}:</b>      {{ $transaction->room_ordered }}</pre>
                                            <pre><b>{{ str_pad('Date of Stay', 20, ' ') }}:</b>      {{ $transaction->check_in }} - {{ $transaction->check_out }}</pre>
                                            <pre><b>{{ str_pad('Price per Day', 20, ' ') }}:</b>      {{ $transaction->convertedPrice($transaction->room->price) }}/day</pre>
                                            <pre><b>{{ str_pad('Total Price', 20, ' ') }}:</b>      {{ $transaction->convertedPrice($transaction->totalprice) }}</pre>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        @endforeach
                    </div>


                    <div class="mt-12">
                        {{ $transactions->links() }}
                    </div>
                </div>
            </div>


        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(e) {


            $('#profile_image').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#prev_image').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

        });

        $("#upfile1").click(function() {
            $("#file1").trigger('click');
        });

        $(".submit").click(function(event) {
            $(".formModal").submit();
        });

    </script>

@endsection
