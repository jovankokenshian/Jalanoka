@extends('layouts.app')

@section('content')
    <div class="container mx-auto ">
        <div class="flex justify-center px-6 my-12">
            <!-- Row -->
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                <!-- Col -->
                <div class="w-full h-auto hidden lg:block lg:w-5/12 bg-cover rounded-l-lg "
                    style="background-image: url('images/bg/register_image.jfif');"></div>
                <!-- Col -->
                <div class="w-full lg:w-7/12 p-5 rounded-lg lg:rounded-l-none bg-gray-50">
                    <h3 class="pt-4 text-2xl text-center">Create an Account!</h3>
                    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data"
                        class="px-8 pt-6 pb-8 mb-4 bg-gray-50 rounded">
                        @csrf
                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                                    Name
                                </label>
                                <input id="name" name="name" type="text" placeholder="Your Name"
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline
                                                                                                                                                                                                                                        @error('name') border-red-500 @enderror"
                                    value="">
                                @error('name')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="md:ml-2">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                    Email
                                </label>
                                <input id="email" name="email" type="email" placeholder="Your Email"
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline
                                                                                                                                                                                                                                            @error('email') border-red-500 @enderror"
                                    value="">
                                @error('email')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="phone">
                                    Phone Number
                                </label>
                                <input id="phone" name="phone" type="text" placeholder="Your Phone Number"
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline
                                                                                                                                                                                                                                        @error('phone') border-red-500 @enderror"
                                    value="">
                                @error('phone')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="md:ml-2">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="date_of_birth">
                                    Birth Date
                                </label>
                                <input id="date_of_birth" name="date_of_birth" type="date" placeholder="Your Birth Date"
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline
                                                                                                                                                                                                                                            @error('date_of_birth') border-red-500 @enderror"
                                    value="">
                                @error('date_of_birth')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="profile_image">
                                Profile Image
                            </label>
                            <div class="h-32 w-32 border-4 md:box-content mb-2">
                                <img id="prev_image" src='{{ asset('uploads/profile_images/default.jpg') }}'
                                    class="object-scale-down w-full h-full">
                            </div>
                            <input id="profile_image" name="profile_image" type="file" placeholder="Insert Image"
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline
                                                                                                                                                                                                                                    @error('profile_image') border-red-500 @enderror"
                                value="default.jpg">
                            @error('profile_image')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                    Password
                                </label>
                                <input id="password" name="password" type="password" placeholder="Your Password"
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline
                                                                                                                                                                                                                                        @error('password') border-red-500 @enderror"
                                    value="">
                                @error('password')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="md:ml-2">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="password_confirmation">
                                    Confirm Password
                                </label>
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    placeholder="Confirm Your Password" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline
                                                @error('password_confirmation') border-red-500 @enderror" value="">
                                @error('password_confirmation')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-6 text-center">
                            <button
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                type="submit">
                                Register Account
                            </button>
                        </div>
                        <hr class="mb-6 border-t" />
                        @if (session('success'))
                            <div class="text-center">
                                <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                    href="{{ route('login') }}">
                                    {{ session('success') }}
                                </a>
                            </div>
                        @endif
                    </form>
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

    </script>

@endsection
