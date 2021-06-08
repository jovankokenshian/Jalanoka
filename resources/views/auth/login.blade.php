@extends('layouts.app')

@section('content')
    <section class="flex flex-col md:flex-row h-screen items-center">

        <div class="bg-indigo-600 hidden bg-cover lg:block w-full md:w-1/2 xl:w-2/3 h-auto">
            <img src="images/bg/login_image.jpg" alt="" class="w-full h-full object-cover">
        </div>

        <div class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
                                                  flex items-center justify-center">

            <div class="w-full h-100">


                <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12">Log in to your account</h1>

                <form class="mt-6" action="{{ route('login') }}" method="post">
                    @csrf
                    <div>
                        <label class="block text-gray-700">Email Address</label>
                        <input type="email" name="email" placeholder="Enter Email Address" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none
                                                    @error('email') border-red-500 @enderror">
                        @error('email')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label class="block text-gray-700">Password</label>
                        <input type="password" name="password" placeholder="Enter Password"
                            class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                                                          focus:bg-white focus:outline-none @error('password') border-red-500  @enderror">
                        @error('password')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label class="block text-gray-700">Captcha</label>
                        <span>{!! captcha_img() !!}</span>
                        <input type="text" name="captcha" placeholder=""
                            class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                                                          focus:bg-white focus:outline-none @error('captcha') border-red-500  @enderror">
                        @error('captcha')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="remember" id="remember" class="mr-2">
                            <label for="remember">Remember me</label>
                        </div>
                    </div>



                    <button type="submit" class="w-full block bg-indigo-500 hover:bg-indigo-400 focus:bg-indigo-400 text-white font-semibold rounded-lg
                                                        px-4 py-3 mt-6">Log In</button>
                </form>

                <hr class="my-6 border-gray-300 w-full">

                @if (session('status'))
                    <div class="text-red-500 mb-4 text-md">
                        {{ session('status') }}
                    </div>
                @endif


                <p class="mt-8">Need an account? <a href="{{ route('register') }}"
                        class="text-blue-500 hover:text-blue-700 font-semibold">Create
                        an
                        account</a></p>


            </div>
        </div>

    </section>

@endsection
