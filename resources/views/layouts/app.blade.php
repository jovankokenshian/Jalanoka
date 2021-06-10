<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jalanoka</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

</head>

<body>
    <header class="bg-black" x-data="{ isOpen: false }">
        <nav class="container px-6 py-4 mx-auto md:flex md:justify-between md:items-center">
            <div class="flex items-center justify-between">
                <a class="transform hover:scale-125 ease-out text-xl font-bold text-white transition duration-300 md:text-2xl hover:text-indigo-400"
                    href="{{ route('home') }}">Jalanoka</a>

                <!-- Mobile menu button -->
                <div @click="isOpen = !isOpen" class="flex md:hidden">
                    <button type="button"
                        class="text-gray-200 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                        aria-label="toggle menu">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path fill-rule="evenodd"
                                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div :class="isOpen ? 'flex' : 'hidden'"
                class="flex-col mt-2 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">
                <a class="text-sm font-medium text-gray-200 sm:hover:scale-125 hover:scale-105 ease-out transition duration-300 transform hover:text-indigo-400"
                    name="test" href="{{ route('hotels') }}">Hotel List</a>

                @auth
                    @if (Auth::user()->email == 'admin@admin.com')
                        <a class="text-sm font-medium text-gray-200 sm:hover:scale-125 hover:scale-105 ease-out transition duration-300 transform hover:text-indigo-400"
                            href="{{ route('admin') }}">Admin Dashboard</a>
                    @endif
                    <a class="text-sm font-medium text-gray-200 sm:hover:scale-125 hover:scale-105 ease-out transition duration-300 transform hover:text-indigo-400"
                        href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button
                            class=" text-sm font-medium text-gray-200 sm:hover:scale-125 hover:scale-105 ease-out transition
                                                                                                                                                                            duration-300 transform hover:text-indigo-400"
                            type="submit">Logout</button>
                    </form>
                @endauth
                @guest
                    <a class="text-sm font-medium text-gray-200 sm:hover:scale-125 hover:scale-105 ease-out transition duration-300 transform hover:text-indigo-400"
                        href="{{ route('login') }}">Login</a>
                    <a class="text-sm font-medium text-gray-200 sm:hover:scale-125 hover:scale-105 ease-out transition duration-300 transform hover:text-indigo-400"
                        href="{{ route('register') }}">Register</a>
                @endguest
                <a class="px-4 py-1 text-sm font-medium text-center text-gray-200 transition duration-300  sm:hover:scale-110 hover:scale-105 ease-out transform border rounded hover:bg-indigo-400"
                    href="#">About Us</a>
            </div>
        </nav>
        @if (Request::is('/'))
            <section>
                <div class="bg-star text-white py-20">
                    <div class="container mx-auto flex flex-col md:flex-row items-center my-12 md:my-24">
                        <div class="flex flex-col w-full lg:w-1/3 justify-center items-start p-8">
                            <h1 class="text-3xl md:text-5xl p-2 text-yellow-300 tracking-loose">Jalanoka</h1>
                            <h2 class="text-3xl md:text-5xl leading-relaxed md:leading-snug mb-2">Reaching the
                                Utmost Luxury
                            </h2>
                            <p class="text-sm md:text-base text-gray-50 mb-4">Explore all high class hotels to places
                                you want to travel</p>
                            <a href="{{ route('hotels') }}" id="bookButton"
                                class="bg-transparent hover:bg-yellow-300 text-yellow-300 hover:text-black rounded shadow hover:shadow-lg py-2 px-4 border border-yellow-300 transition transform duration-300  hover:scale-110 hover:border-transparent">
                                Explore Now</a>
                        </div>
                        <div
                            class="p-8 mt-12 mb-6 md:mb-0 md:mt-0 ml-0 md:ml-12 lg:w-2/3  justify-center sm:inline-block hidden">
                            <div id="allimage" class="h-48 flex flex-wrap content-center">
                                <div>
                                    <img class=" sectionImage mt-28 hidden xl:block animate-fade-in-right"
                                        src="{{ asset('images/home_page/home1.png') }}">
                                </div>
                                <div>
                                    <img class="sectionImage sm:inline-block mt-24 md:mt-0 p-8 md:p-0 animate-fade-in-right"
                                        src="{{ asset('images/home_page/home2.png') }}">
                                </div>
                                <div>
                                    <img class="sectionImage mt-28 hidden lg:block animate-fade-in-right"
                                        src="{{ asset('images/home_page/home3.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </header>

    @yield('content')
    <script src="{{ asset('js/app.js') }}"></script>



</body>

</html>
