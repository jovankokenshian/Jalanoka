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
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

</head>

<body>

    <div>
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
            <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
                class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

            <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
                class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
                <div class="flex items-center justify-center mt-8">
                    <div class="flex items-center">
                        <svg class="h-12 w-12" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z"
                                fill="#4C51BF" stroke="#4C51BF" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path
                                d="M201.694 387.105C231.686 417.098 280.312 417.098 310.305 387.105C325.301 372.109 332.8 352.456 332.8 332.8C332.8 313.144 325.301 293.491 310.305 278.495C295.309 263.498 288 256 275.2 230.4C256 243.2 243.201 320 243.201 345.6C201.694 345.6 179.2 332.8 179.2 332.8C179.2 352.456 186.698 372.109 201.694 387.105Z"
                                fill="white"></path>
                        </svg>

                        <span class="text-white text-2xl mx-2 font-semibold">Dashboard</span>
                    </div>
                </div>

                <nav class="mt-10">
                    <div class="flex cursor-pointer items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100"
                        id="clickAll">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                        </svg>

                        <span class="mx-3">Dashboard All</span>
                    </div>

                    <div class="flex cursor-pointer items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
                        id="clickHotel">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                            </path>
                        </svg>

                        <span class="mx-3">Hotel List</span>
                    </div>

                    <div class="flex cursor-pointer items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
                        id="clickRoom">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>

                        <span class="mx-3">Room List</span>
                    </div>

                    <div class="flex cursor-pointer items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
                        id="clickTransaction">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>

                        <span class="mx-3">Transaction List</span>
                    </div>
                </nav>
            </div>
            <div class="flex-1 flex flex-col overflow-hidden">
                <header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-indigo-600">
                    <div class="flex items-center">
                        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>


                    </div>

                    <div class="flex items-center">

                        <div x-data="{ dropdownOpen: false }" class="relative">
                            <button @click="dropdownOpen = ! dropdownOpen"
                                class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                                <img class="h-full w-full object-cover"
                                    src="{{ asset('storage/profile_images/' . $admin) }}" alt="Your avatar">
                            </button>

                            <div x-show="dropdownOpen" @click="dropdownOpen = false"
                                class="fixed inset-0 h-full w-full z-10" style="display: none;"></div>

                            <div x-show="dropdownOpen"
                                class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
                                style="display: none;">
                                <a href="/profile"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Profile</a>
                                <a href="/hotel_lists"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Hotel
                                    Lists</a>
                                <form method="post" action="{{ route('logout') }}">
                                    @csrf
                                    <input type="submit"
                                        class="block px-4 py-2 text-sm text-left hover:bg-indigo-600 hover:text-white cursor-pointer w-full text-gray-700 bg-transparent"
                                        value="Log Out">
                                </form>
                            </div>
                        </div>
                    </div>
                </header>

                @if ($errors->any())
                    <div id="NotifError" class="bg-red-50 border-l-8 border-red-900 mb-2">
                        <div class="flex items-center">
                            <div class="p-2">
                                <div class="flex items-center">
                                    <div class="ml-2">
                                        <svg id="closeError" class="h-8 w-8 text-red-900 mr-2 cursor-pointer"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <p class="px-6 py-4 text-red-900 font-semibold text-lg">Please fix the
                                        following
                                        errors.</p>
                                </div>
                                <div class="px-16 mb-4">
                                    {!! implode('', $errors->all('<li class="text-md font-bold text-red-500 text-sm">:message</li>')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if (session('success'))
                    <div id="NotifSuccess" class="p-5">
                        <div>
                            <div
                                class="flex justify-center items-center m-1 font-medium py-1 px-2 rounded-md text-yellow-700 bg-yellow-100 border border-yellow-300 ">
                                <div slot="avatar">
                                    <svg id="closeSuccess" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-info w-5 h-5 mx-2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="16" x2="12" y2="12"></line>
                                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                    </svg>
                                </div>
                                <div class="text-xl font-normal  max-w-full flex-initial">
                                    <div class="py-2">Sucess!!
                                        <div class="text-sm font-base">{{ session('success') }} </div>
                                    </div>
                                </div>
                                <div class="flex flex-auto flex-row-reverse">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-x cursor-pointer hover:text-yellow-400 rounded-full w-5 h-5 ml-2">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container mx-auto px-6 py-8">
                        <h3 class="text-gray-700 text-3xl font-medium">Dashboard</h3>

                        <div class="mt-4">
                            <div class="flex flex-wrap -mx-6">
                                <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                                    <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                                        <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                                            <svg class="h-8 w-8 text-white" viewBox="0 0 28 30" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18.2 9.08889C18.2 11.5373 16.3196 13.5222 14 13.5222C11.6804 13.5222 9.79999 11.5373 9.79999 9.08889C9.79999 6.64043 11.6804 4.65556 14 4.65556C16.3196 4.65556 18.2 6.64043 18.2 9.08889Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M25.2 12.0444C25.2 13.6768 23.9464 15 22.4 15C20.8536 15 19.6 13.6768 19.6 12.0444C19.6 10.4121 20.8536 9.08889 22.4 9.08889C23.9464 9.08889 25.2 10.4121 25.2 12.0444Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M19.6 22.3889C19.6 19.1243 17.0927 16.4778 14 16.4778C10.9072 16.4778 8.39999 19.1243 8.39999 22.3889V26.8222H19.6V22.3889Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M8.39999 12.0444C8.39999 13.6768 7.14639 15 5.59999 15C4.05359 15 2.79999 13.6768 2.79999 12.0444C2.79999 10.4121 4.05359 9.08889 5.59999 9.08889C7.14639 9.08889 8.39999 10.4121 8.39999 12.0444Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M22.4 26.8222V22.3889C22.4 20.8312 22.0195 19.3671 21.351 18.0949C21.6863 18.0039 22.0378 17.9556 22.4 17.9556C24.7197 17.9556 26.6 19.9404 26.6 22.3889V26.8222H22.4Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M6.64896 18.0949C5.98058 19.3671 5.59999 20.8312 5.59999 22.3889V26.8222H1.39999V22.3889C1.39999 19.9404 3.2804 17.9556 5.59999 17.9556C5.96219 17.9556 6.31367 18.0039 6.64896 18.0949Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </div>

                                        <div class="mx-5">
                                            <h4 class="text-2xl font-semibold text-gray-700">{{ $users->count() }}
                                            </h4>
                                            <div class="text-gray-500">Registered
                                                {{ Str::plural('User', $rooms->count()) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
                                    <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                                        <div class="p-3 rounded-full bg-orange-600 bg-opacity-75">
                                            <svg class="h-8 w-8 text-white" viewBox="0 0 28 28" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.19999 1.4C3.4268 1.4 2.79999 2.02681 2.79999 2.8C2.79999 3.57319 3.4268 4.2 4.19999 4.2H5.9069L6.33468 5.91114C6.33917 5.93092 6.34409 5.95055 6.34941 5.97001L8.24953 13.5705L6.99992 14.8201C5.23602 16.584 6.48528 19.6 8.97981 19.6H21C21.7731 19.6 22.4 18.9732 22.4 18.2C22.4 17.4268 21.7731 16.8 21 16.8H8.97983L10.3798 15.4H19.6C20.1303 15.4 20.615 15.1004 20.8521 14.6261L25.0521 6.22609C25.2691 5.79212 25.246 5.27673 24.991 4.86398C24.7357 4.45123 24.2852 4.2 23.8 4.2H8.79308L8.35818 2.46044C8.20238 1.83722 7.64241 1.4 6.99999 1.4H4.19999Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M22.4 23.1C22.4 24.2598 21.4598 25.2 20.3 25.2C19.1403 25.2 18.2 24.2598 18.2 23.1C18.2 21.9402 19.1403 21 20.3 21C21.4598 21 22.4 21.9402 22.4 23.1Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M9.1 25.2C10.2598 25.2 11.2 24.2598 11.2 23.1C11.2 21.9402 10.2598 21 9.1 21C7.9402 21 7 21.9402 7 23.1C7 24.2598 7.9402 25.2 9.1 25.2Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </div>

                                        <div class="mx-5">
                                            <h4 class="text-2xl font-semibold text-gray-700">
                                                {{ $transactions->count() }}</h4>
                                            <div class="text-gray-500">Total
                                                {{ Str::plural('Order', $transactions->count()) }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                                    <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                                        <div class="p-3 rounded-full bg-pink-600 bg-opacity-75">
                                            <svg class="h-8 w-8 text-white" viewBox="0 0 28 28" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.99998 11.2H21L22.4 23.8H5.59998L6.99998 11.2Z"
                                                    fill="currentColor" stroke="currentColor" stroke-width="2"
                                                    stroke-linejoin="round"></path>
                                                <path
                                                    d="M9.79999 8.4C9.79999 6.08041 11.6804 4.2 14 4.2C16.3196 4.2 18.2 6.08041 18.2 8.4V12.6C18.2 14.9197 16.3196 16.8 14 16.8C11.6804 16.8 9.79999 14.9197 9.79999 12.6V8.4Z"
                                                    stroke="currentColor" stroke-width="2"></path>
                                            </svg>
                                        </div>

                                        <div class="mx-5">
                                            <h4 class="text-2xl font-semibold text-gray-700">{{ $rooms->count() }}
                                            </h4>
                                            <div class="text-gray-500">Registered Hotel
                                                {{ Str::plural('Room', $rooms->count()) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8">

                        </div>

                        {{-- Start of Hotel Booking --}}
                        <div id="HotelAdmin" class="flex flex-col mt-8">
                            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                <h3 data-toggle="modal" data-target="#AddNewHotel"
                                    class="cursor-pointer px-4 pb-2 float-right font-bold text-blue-500 ">
                                    Add new Hotel</h3>


                                <div id="AddNewHotel" class="modal fade items-center" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title font-semibold">Add New Hotel
                                                </h3>
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body flex flex-col px-6 py-5 bg-gray-50">
                                                <form action="{{ route('admin.addHotel') }}" method="post">
                                                    @csrf

                                                    <pre><b>{{ str_pad('Hotel Name', 20, ' ') }}:</b>      <input class="bg-gray-200" type="text" name="AddHotelname"></pre>
                                                    <pre><b>{{ str_pad('Address', 20, ' ') }}:</b>      <input class="bg-gray-200" list="AddHoteladdress" name="AddHoteladdress"></pre>
                                                    <datalist id="AddHoteladdress">
                                                        <option value="Jakarta">
                                                        <option value="Surabaya">
                                                        <option value="Palembang">
                                                    </datalist>
                                                    <pre><b>{{ str_pad('Star', 20, ' ') }}:</b>      <input class="bg-gray-200" type="number" min="1" max="5" name="AddHotelstar"></pre>

                                                    <button
                                                        class="w-1/4 px-4 py-2 my-5 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                                        type="submit">
                                                        Add Hotel
                                                    </button>
                                                </form>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>



                                <div
                                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                                    <table class="min-w-full">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Name</th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Address</th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Hotel Star</th>
                                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                            </tr>
                                        </thead>

                                        @foreach ($hotels as $hotel)
                                            <tbody class="bg-white">
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                        <div class="flex items-center">

                                                            <div class="ml-4">
                                                                <div
                                                                    class="text-sm leading-5 font-medium text-gray-900">
                                                                    {{ $hotel->name }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td
                                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                                        {{ $hotel->address }}</td>

                                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $hotel->star }}</span>
                                                    </td>

                                                    <td
                                                        class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                                        <div data-toggle="modal"
                                                            data-target="{{ '#hotel_edit-' . $hotel->id }}"
                                                            class="cursor-pointer text-indigo-600 hover:text-indigo-900">
                                                            Edit
                                                        </div>
                                                        @can('delete', $hotel)
                                                            <form method="post"
                                                                action="{{ route('admin.deleteHotel', $hotel) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="submit"
                                                                    class="cursor-pointer text-red-600 font-semibold hover:text-red-900 bg-transparent"
                                                                    value="Delete">
                                                            </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <div id="{{ 'hotel_edit-' . $hotel->id }}"
                                                class="modal fade items-center" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title font-semibold">Hotel No.
                                                                {{ sprintf('%02s', $hotel->id) }}
                                                            </h3>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body flex flex-col px-6 py-5 bg-gray-50">
                                                            <form action="{{ route('admin.updateHotel') }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" value={{ $hotel->id }}
                                                                    name="updateHotelid">
                                                                <pre><b>{{ str_pad('Hotel Name', 20, ' ') }}:</b>      <input class="bg-gray-200" type="text" value="{{ $hotel->name }}" name="updateHotelname"></pre>
                                                                <pre><b>{{ str_pad('Address', 20, ' ') }}:</b>      <input class="bg-gray-200" list="address" value="{{ $hotel->address }}" name="updateHoteladdress"></pre>
                                                                <datalist id="address">
                                                                    <option value="Jakarta">
                                                                    <option value="Surabaya">
                                                                    <option value="Palembang">
                                                                </datalist>
                                                                <pre><b>{{ str_pad('Star', 20, ' ') }}:</b>      <input class="bg-gray-200" type="number" min="1" max="5" value="{{ $hotel->star }}" name="updateHotelstar"></pre>

                                                                <button
                                                                    class="w-1/4 px-4 py-2 my-5 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                                                    type="submit">
                                                                    Edit Hotel
                                                                </button>
                                                            </form>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- End of Hotel Edit --}}

                        {{-- Start of Room Edit --}}
                        <div id="RoomAdmin" class="flex flex-col mt-8">
                            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                <h3 data-toggle="modal" data-target="#AddNewRoom"
                                    class="cursor-pointer px-4 pb-2 float-right font-bold text-blue-500 ">
                                    Add new Room</h3>


                                <div id="AddNewRoom" class="modal fade items-center" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title font-semibold">Add New Room
                                                </h3>
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body flex flex-col px-6 py-5 bg-gray-50">
                                                <form action="{{ route('admin.addRoom') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf

                                                    <pre><b>{{ str_pad('Hotel ID', 20, ' ') }}:</b>      <input class="bg-gray-200" list="addRoomhotel_name" name="addRoomhotel_id"></pre>
                                                    <datalist id="addRoomhotel_name">
                                                        @foreach ($hotels as $hotel)
                                                            <option value="{{ $hotel->id }}">
                                                                {{ $hotel->name }}
                                                            </option>
                                                        @endforeach
                                                    </datalist>
                                                    <pre><b>{{ str_pad('Room Name', 20, ' ') }}:</b>      <input class="bg-gray-200" type="text" name="addRoomname"></pre>
                                                    <pre><b>{{ str_pad('Price', 20, ' ') }}:</b>      <input class="bg-gray-200" type="number" name="addRoomprice"></pre>
                                                    <pre><b>{{ str_pad('Number of Rooms', 20, ' ') }}:</b>      <input class="bg-gray-200" type="number" min="1" name="addRoomroom_total"></pre>
                                                    <pre><b>{{ str_pad('Facility', 20, ' ') }}:</b></pre>
                                                    <br>
                                                    <textarea name="addRoomfacility"
                                                        class="bg-gray-200 w-11/12"></textarea>

                                                    <pre><b>{{ str_pad('Image of Room', 20, ' ') }}:</b></pre>
                                                    <div class="h-32 w-32 border-4 md:box-content mb-2">
                                                        <img id="addRoomprev_image"
                                                            src='{{ asset('storage/hotel_rooms/noImage.jpg') }}'
                                                            class="object-scale-down w-full h-full">
                                                    </div>
                                                    <input id="addRoomroom_image" name="addRoomroom_image" type="file"
                                                        placeholder="Insert Image"
                                                        class="w-11/12 px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline
                                                                                                                                                                                                                                                            @error('profile_image') border-red-500 @enderror"
                                                        value="default.jpg">
                                                    <button
                                                        class="w-1/4 px-4 py-2 my-5 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                                        type="submit">
                                                        Add Room
                                                    </button>
                                                </form>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>



                                <div
                                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                                    <table class="min-w-full">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Room Name</th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Room Price</th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Total Room - Ordered Room</th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Facility Desciption</th>
                                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                            </tr>
                                        </thead>

                                        @foreach ($rooms as $room)
                                            <tbody class="bg-white">
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-10 w-10">
                                                                <img class="h-10 w-10 rounded-full"
                                                                    src="{{ asset('storage/hotel_rooms/' . $room->room_image) }}"
                                                                    alt="">
                                                            </div>
                                                            <input class="roomUpdateroom_image" type="hidden"
                                                                value="{{ asset('storage/hotel_rooms/' . $room->room_image) }}">
                                                            <input class="roomUpdateroom_id" type="hidden"
                                                                value="{{ $room->id }}">
                                                            <div class="ml-4">
                                                                <input class="roomUpdateName" type="hidden"
                                                                    value="{{ $room->name }}">
                                                                <div
                                                                    class="text-sm leading-5 font-medium text-gray-900">
                                                                    {{ $room->name }}
                                                                </div>
                                                                <input class="roomHotelUpdateID" type="hidden"
                                                                    value="{{ $room->hotel->id }}">
                                                                <div class="text-sm leading-5 text-gray-500">
                                                                    {{ $room->hotel->name }}</div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <input class="roomUpdatePrice" type="hidden"
                                                        value="{{ $room->price }}">
                                                    <td
                                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                                        {{ $room->convertedPrice($room->price) }}

                                                    </td>

                                                    <input class="roomUpdateRoomTotal" type="hidden"
                                                        value="{{ $room->room_total }}">
                                                    <input class="roomUpdateRoomOrdered" type="hidden"
                                                        value="{{ $room->room_ordered }}">
                                                    <td
                                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                                        {{ $room->room_total }} - {{ $room->room_ordered }}
                                                    </td>

                                                    <input class="roomUpdateFacility" type="hidden"
                                                        value="{{ $room->facility }}">
                                                    <td
                                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                                        {{ $room->facility }}
                                                    </td>

                                                    <td
                                                        class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                                        <div data-toggle="modal" data-target="#room_edit"
                                                            class="clicked cursor-pointer text-indigo-600 hover:text-indigo-900">
                                                            Edit
                                                        </div>
                                                        @can('delete', $room)
                                                            <form method="post"
                                                                action="{{ route('admin.deleteRoom', $room) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="submit"
                                                                    class="cursor-pointer text-red-600 font-semibold hover:text-red-900 bg-transparent"
                                                                    value="Delete">
                                                            </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                        <div id="{{ 'room_edit' }}" class="modal fade items-center" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title font-semibold">Room No.
                                                            {{ sprintf('%02s', $room->id) }}/{{ sprintf('%02s', $hotel->id) }}
                                                        </h3>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body flex flex-col px-6 py-5 bg-gray-50">
                                                        <form action="{{ route('admin.updateRoom') }}" method="post"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" value={{ $room->id }}
                                                                name="modalUpdateRoom_id">
                                                            <input type="hidden" value={{ $room->id }}
                                                                name="modalUpdateRoomroom_ordered">

                                                            <pre><b>{{ str_pad('Hotel ID', 20, ' ') }}:</b>      <input class="bg-gray-200" list="hotelUpdate_name" name="modalUpdatehotel_id" value="If you see this"></pre>
                                                            <datalist id="hotelUpdate_name">
                                                                @foreach ($hotels as $hotel)
                                                                    <option value="{{ $hotel->id }}">
                                                                        {{ $hotel->name }}
                                                                    </option>
                                                                @endforeach
                                                            </datalist>
                                                            <pre><b>{{ str_pad('Room Name', 20, ' ') }}:</b>      <input class="bg-gray-200" type="text" name="modalUpdatename" value="Please close the modal"></pre>
                                                            <pre><b>{{ str_pad('Price', 20, ' ') }}:</b>      <input class="bg-gray-200" type="number" name="modalUpdateprice" value="{{ $room->price }}"></pre>
                                                            <pre><b>{{ str_pad('Number of Rooms', 20, ' ') }}:</b>      <input class="bg-gray-200" type="number" min="1" name="modalUpdateroom_total" value="{{ $room->room_total }}"></pre>
                                                            <pre><b>{{ str_pad('Facility', 20, ' ') }}:</b></pre>
                                                            <br>
                                                            <textarea name="modalUpdatefacility"
                                                                class="bg-gray-200 w-11/12">and click edit again</textarea>

                                                            <pre><b>{{ str_pad('Image of Room', 20, ' ') }}:</b></pre>
                                                            <div class="h-32 w-32 border-4 md:box-content mb-2">
                                                                <img id="modalUpdateprev_image"
                                                                    name="modalUpdateprev_image"
                                                                    src='{{ asset('storage/hotel_rooms/noImage.jpg') }}'
                                                                    class="object-scale-down w-full h-full">
                                                            </div>
                                                            <input id="modalUpdateroom_image"
                                                                name="modalUpdateroom_image" type="file"
                                                                placeholder="Insert Image"
                                                                class="w-11/12 px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline
                                                                                                                                                                                                                                                            @error('profile_image') border-red-500 @enderror"
                                                                value="default.jpg">
                                                            <button
                                                                class="w-1/4 px-4 py-2 my-5 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                                                type="submit">
                                                                Edit Room
                                                            </button>
                                                        </form>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- End of Room Booking --}}

                        {{-- Start of Transaction Data --}}
                        <div id="TransactionAdmin" class="flex flex-col mt-8">
                            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                <h3 data-toggle="modal" data-target="#AddNewTransaction"
                                    class="cursor-pointer px-4 pb-2 float-right font-bold text-blue-500 ">
                                    Add new Transaction Data</h3>


                                <div id="AddNewTransaction" class="modal fade items-center" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title font-semibold">Add New Hotel
                                                </h3>
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body flex flex-col px-6 py-5 bg-gray-50">
                                                <form action="{{ route('admin.addTransaction') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf

                                                    <pre><b>{{ str_pad('User ID', 20, ' ') }}:</b>      <input class="bg-gray-200" list="addTransactionuser_name" name="addTransactionuser_id"></pre>
                                                    <datalist id="addTransactionuser_name">
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">
                                                                {{ $user->name }} - {{ $user->email }}
                                                            </option>
                                                        @endforeach
                                                    </datalist>
                                                    <pre><b>{{ str_pad('Room ID', 20, ' ') }}:</b>      <input class="bg-gray-200" list="addTransactionroom_name" name="addTransactionroom_id"></pre>
                                                    <datalist id="addTransactionroom_name">
                                                        @foreach ($rooms as $room)
                                                            <option value="{{ $room->id }}">
                                                                {{ $room->name }}
                                                            </option>
                                                        @endforeach
                                                    </datalist>
                                                    <pre><b>{{ str_pad('Orderer Name', 20, ' ') }}:</b>      <input class="bg-gray-200" type="text" name="addTransactionname"></pre>
                                                    <pre><b>{{ str_pad('Email', 20, ' ') }}:</b>      <input class="bg-gray-200" type="email" name="addTransactionemail"></pre>
                                                    <pre><b>{{ str_pad('Phone Number', 20, ' ') }}:</b>      <input class="bg-gray-200" type="text" name="addTransactionphone"></pre>
                                                    <pre><b>{{ str_pad('Room Ordered', 20, ' ') }}:</b>      <input class="bg-gray-200" type="number" min='1'
                                                        value="1" name="addTransactionroom_ordered"></pre>
                                                    <pre><b>{{ str_pad('Check-in Date', 20, ' ') }}:</b>      <input class="bg-gray-200" type="date"  name="addTransactioncheck_in"></pre>
                                                    <pre><b>{{ str_pad('Check-out Date', 20, ' ') }}:</b>      <input class="bg-gray-200" type="date"  name="addTransactioncheck_out"></pre>

                                                    <button
                                                        class="w-4/12 px-4 py-2 my-5 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                                        type="submit">
                                                        Add Transaction
                                                    </button>
                                                </form>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>



                                <div
                                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                                    <table class="min-w-full">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Name</th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    User Account</th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Room Ordered</th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Phone</th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    check-in & check-out</th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Total Price</th>
                                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                            </tr>
                                        </thead>

                                        @foreach ($transactions as $transaction)
                                            <tbody class="bg-white">
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                        <div class="flex items-center">
                                                            <div class="ml-4">
                                                                <div
                                                                    class="text-sm leading-5 font-medium text-gray-900">
                                                                    {{ $transaction->name }}
                                                                </div>
                                                                <div class="text-sm leading-5 text-gray-500">
                                                                    {{ $transaction->email }}</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                        <div class="flex items-center">
                                                            <div>
                                                                <div
                                                                    class="text-sm leading-5 font-medium text-gray-900">
                                                                    {{ $transaction->user->name }}
                                                                </div>
                                                                <div class="text-sm leading-5 text-gray-500">
                                                                    {{ $transaction->user->email }}</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                        <div class="flex items-center">
                                                            <div>
                                                                <div
                                                                    class="text-sm leading-5 font-medium text-gray-900">
                                                                    {{ $transaction->room->hotel->name }} -
                                                                    {{ $transaction->room->name }}
                                                                </div>
                                                                <div class="text-sm leading-5 text-gray-500">
                                                                    {{ $transaction->room_ordered }}
                                                                    {{ Str::plural('room', $transaction->room_ordered) }}
                                                                    ordered
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td
                                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                                        {{ $transaction->phone }}</td>
                                                    <td
                                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                                        {{ $transaction->check_in }} -
                                                        {{ $transaction->check_out }}
                                                    </td>

                                                    <td
                                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                                        {{ $transaction->convertedPrice($transaction->totalprice) }}
                                                    </td>


                                                    <td
                                                        class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                                        <div data-toggle="modal"
                                                            data-target="{{ '#transaction_edit-' . $transaction->id }}"
                                                            class="cursor-pointer text-indigo-600 hover:text-indigo-900">
                                                            Edit
                                                        </div>
                                                        @can('delete', $transaction)
                                                            <form method="post"
                                                                action="{{ route('admin.deleteTransaction', $transaction) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="submit"
                                                                    class="cursor-pointer text-red-600 font-semibold hover:text-red-900 bg-transparent"
                                                                    value="Delete">
                                                            </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <div id="{{ 'transaction_edit-' . $transaction->id }}"
                                                class="modal fade items-center" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title font-semibold">Transaction
                                                                No.
                                                                {{ sprintf('%02s', $transaction->id) }}-{{ sprintf('%02s', $transaction->user->id) }}/{{ sprintf('%04s', $transaction->room->id) }}
                                                            </h3>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body flex flex-col px-6 py-5 bg-gray-50">
                                                            <form action="{{ route('admin.updateTransaction') }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" value="{{ $transaction->id }}"
                                                                    name="updateTransactionid">
                                                                <pre><b>{{ str_pad('User ID', 20, ' ') }}:</b>      <input class="bg-gray-200" list="updateTransactionuser_name" name="updateTransactionuser_id" value="{{ $transaction->user_id }}"></pre>
                                                                <datalist id="updateTransactionuser_name">
                                                                    @foreach ($users as $user)
                                                                        <option value="{{ $user->id }}">
                                                                            {{ $user->name }} -
                                                                            {{ $user->email }}
                                                                        </option>
                                                                    @endforeach
                                                                </datalist>
                                                                <pre><b>{{ str_pad('Room ID', 20, ' ') }}:</b>      <input class="bg-gray-200" list="updateTransactionroom_name" name="updateTransactionroom_id" value="{{ $transaction->room_id }}"></pre>
                                                                <datalist id="updateTransactionroom_name">
                                                                    @foreach ($rooms as $room)
                                                                        <option value="{{ $room->id }}">
                                                                            {{ $room->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </datalist>
                                                                <pre><b>{{ str_pad('Orderer Name', 20, ' ') }}:</b>      <input class="bg-gray-200" type="text" name="updateTransactionname" value="{{ $transaction->name }}"></pre>
                                                                <pre><b>{{ str_pad('Email', 20, ' ') }}:</b>      <input class="bg-gray-200" type="email" name="updateTransactionemail" value="{{ $transaction->email }}"></pre>
                                                                <pre><b>{{ str_pad('Phone Number', 20, ' ') }}:</b>      <input class="bg-gray-200" type="text" name="updateTransactionphone" value="{{ $transaction->phone }}"></pre>
                                                                <pre><b>{{ str_pad('Room Ordered', 20, ' ') }}:</b>      <input class="bg-gray-200" type="number" min='1' value="{{ $transaction->room_ordered }}"
                                                                            value="1" name="updateTransactionroom_ordered"></pre>
                                                                <pre><b>{{ str_pad('Check-in Date', 20, ' ') }}:</b>      <input class="bg-gray-200" type="date"  name="updateTransactioncheck_in" value="{{ $transaction->check_in }}"></pre>
                                                                <pre><b>{{ str_pad('Check-out Date', 20, ' ') }}:</b>      <input class="bg-gray-200" type="date"  name="updateTransactioncheck_out" value="{{ $transaction->check_out }}"></pre>


                                                                <button
                                                                    class="w-4/12 px-4 py-2 my-5 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                                                    type="submit">
                                                                    Edit Transaction
                                                                </button>
                                                            </form>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- End of Transaction Data --}}

                    </div>
                </main>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function(e) {
        $('#clickAll').click(function() {
            $('#HotelAdmin').show();
            $('#RoomAdmin').show();
            $('#TransactionAdmin').show();
            $('#clickAll').addClass('bg-gray-700 bg-opacity-25 text-gray-100');
            $('#clickAll').removeClass(
                'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100');
            if ($('#clickHotel').hasClass('bg-gray-700 bg-opacity-25 text-gray-100')) {
                $('#clickHotel').removeClass('bg-gray-700 bg-opacity-25 text-gray-100')
                $('#clickHotel').addClass(
                    'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100')

            }
            if ($('#clickRoom').hasClass('bg-gray-700 bg-opacity-25 text-gray-100')) {
                $('#clickRoom').removeClass('bg-gray-700 bg-opacity-25 text-gray-100')
                $('#clickRoom').addClass(
                    'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100')

            }
            if ($('#clickTransaction').hasClass('bg-gray-700 bg-opacity-25 text-gray-100')) {
                $('#clickTransaction').removeClass('bg-gray-700 bg-opacity-25 text-gray-100')
                $('#clickTransaction').addClass(
                    'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100')

            }

        });
        $('#clickHotel').click(function() {
            $('#HotelAdmin').show();
            $('#RoomAdmin').hide();
            $('#TransactionAdmin').hide();
            $('#clickHotel').addClass('bg-gray-700 bg-opacity-25 text-gray-100');
            $('#clickHotel').removeClass(
                'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100');
            if ($('#clickAll').hasClass('bg-gray-700 bg-opacity-25 text-gray-100')) {
                $('#clickAll').removeClass('bg-gray-700 bg-opacity-25 text-gray-100')
                $('#clickAll').addClass(
                    'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100')

            }
            if ($('#clickRoom').hasClass('bg-gray-700 bg-opacity-25 text-gray-100')) {
                $('#clickRoom').removeClass('bg-gray-700 bg-opacity-25 text-gray-100')
                $('#clickRoom').addClass(
                    'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100')

            }
            if ($('#clickTransaction').hasClass('bg-gray-700 bg-opacity-25 text-gray-100')) {
                $('#clickTransaction').removeClass('bg-gray-700 bg-opacity-25 text-gray-100')
                $('#clickTransaction').addClass(
                    'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100')

            }
        });
        $('#clickRoom').click(function() {
            $('#HotelAdmin').hide();
            $('#RoomAdmin').show();
            $('#TransactionAdmin').hide();
            $('#clickRoom').addClass('bg-gray-700 bg-opacity-25 text-gray-100');
            $('#clickRoom').removeClass(
                'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100');
            if ($('#clickAll').hasClass('bg-gray-700 bg-opacity-25 text-gray-100')) {
                $('#clickAll').removeClass('bg-gray-700 bg-opacity-25 text-gray-100')
                $('#clickAll').addClass(
                    'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100')

            }
            if ($('#clickHotel').hasClass('bg-gray-700 bg-opacity-25 text-gray-100')) {
                $('#clickHotel').removeClass('bg-gray-700 bg-opacity-25 text-gray-100')
                $('#clickHotel').addClass(
                    'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100')

            }
            if ($('#clickTransaction').hasClass('bg-gray-700 bg-opacity-25 text-gray-100')) {
                $('#clickTransaction').removeClass('bg-gray-700 bg-opacity-25 text-gray-100')
                $('#clickTransaction').addClass(
                    'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100')

            }
        });
        $('#clickTransaction').click(function() {
            $('#HotelAdmin').hide();
            $('#RoomAdmin').hide();
            $('#TransactionAdmin').show();
            $('#clickTransaction').addClass('bg-gray-700 bg-opacity-25 text-gray-100');
            $('#clickTransaction').removeClass(
                'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100');
            if ($('#clickAll').hasClass('bg-gray-700 bg-opacity-25 text-gray-100')) {
                $('#clickAll').removeClass('bg-gray-700 bg-opacity-25 text-gray-100')
                $('#clickAll').addClass(
                    'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100')

            }
            if ($('#clickRoom').hasClass('bg-gray-700 bg-opacity-25 text-gray-100')) {
                $('#clickRoom').removeClass('bg-gray-700 bg-opacity-25 text-gray-100')
                $('#clickRoom').addClass(
                    'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100')

            }
            if ($('#clickHotel').hasClass('bg-gray-700 bg-opacity-25 text-gray-100')) {
                $('#clickHotel').removeClass('bg-gray-700 bg-opacity-25 text-gray-100')
                $('#clickHotel').addClass(
                    'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100')

            }
        });

        $('#closeError').click(function() {
            $('#NotifError').hide();
        });
        $('#closeSuccess').click(function() {
            $('#NotifSuccess').hide();
        });
        $('#addRoomroom_image').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#addRoomprev_image').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });
        $('#modalUpdateroom_image').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#modalUpdateprev_image').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });
        var elements = document.getElementsByClassName("clicked");

        var myFunction = function() {
            let id = $(this).closest("tr").find(".roomUpdateroom_id").val();
            let room_image = $(this).closest("tr").find(".roomUpdateroom_image").val();
            let name = $(this).closest("tr").find(".roomUpdateName").val();
            let hotel_id = $(this).closest("tr").find(".roomHotelUpdateID").val();
            let price = parseInt($(this).closest("tr").find(".roomUpdatePrice").val());
            let room_total = parseInt($(this).closest("tr").find(".roomUpdateRoomTotal").val());
            let room_ordered = parseInt($(this).closest("tr").find(".roomUpdateRoomOrdered").val());
            let facility = $(this).closest("tr").find(".roomUpdateFacility").val();


            $('input[name=modalUpdateRoom_id]').val(id);
            $('input[name=modalUpdatehotel_id]').val(hotel_id);
            $('input[name=modalUpdatename]').val(name);
            $('input[name=modalUpdateprice]').val(price);
            $('input[name=modalUpdateRoomroom_ordered]').val(room_ordered);
            $('input[name=modalUpdateroom_total]').val(room_total);
            $('textarea[name=modalUpdatefacility]').text(facility);
            $('img[name=modalUpdateprev_image]').attr('src', room_image);

        };
        for (var i = 0; i < elements.length; i++) {
            elements[i].addEventListener('click', myFunction, false);
        }
    });

</script>

</html>
