@extends('layouts.app')

@section('content')

    <div x-data="{ cartOpen: false , isOpen: false }" class="bg-white">
        <header>
            <div class="container mx-auto px-6 py-3">
                <div class="flex items-center justify-between">
                    <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
                        Jalanoka Hotel Lists
                    </div>

                </div>
                {{-- Search Bar --}}
                <div class="relative mt-6 max-w-lg mx-auto">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                        <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>

                    <input
                        class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline"
                        type="text" placeholder="Search for Hotel Name" id="searcher">
                </div>
                <div class="flex flex-col md:flex-row justify-center pt-5">
                    <div class="pt-6 md:pt-0 md:pl-6">
                        <select id="loc_filter" class="border p-2 rounded">
                            <option value="-1">Filter by Location: </option>
                            <option value="palembang">Palembang</option>
                            <option value="surabaya">Surabaya</option>
                            <option value="jakarta">Jakarta</option>
                        </select>
                    </div>
                    <div class="pt-6 md:pt-0 md:pl-6">
                        <select id="loc_star" class="border p-2 rounded">
                            <option value="-1">Filter by Hotel Star: </option>
                            <option value="1">1 star</option>
                            <option value="2">2 stars</option>
                            <option value="3">3 stars</option>
                            <option value="4">4 stars</option>
                            <option value="5">5 stars</option>
                        </select>
                    </div>
                    <div class="pt-6 md:pt-0 md:pl-6">
                        <select id="loc_price" class="border p-2 rounded">
                            <option value="-1">Filter by Price: </option>
                            <option value="0_500000">&ltRp.500,000</option>
                            <option value="500000_1000000">Rp.500,000- Rp.1,000,000</option>
                            <option value="1000000_1000000000">Rp.1,000,000++</option>
                        </select>
                    </div>
                </div>
            </div>
        </header>
        <main class="my-8">
            <div class="container mx-auto px-6">
                <h3 class="text-gray-700 text-2xl font-medium">All Hotel Lists</h3>
                <span class="mt-3 text-sm text-gray-500">{{ $rooms->count() }}
                    {{ Str::plural('room', $rooms->count()) }} available!</span>
                @if ($rooms->count())
                    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6" id="entryDiv">
                        @foreach ($rooms as $room)
                            <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden" id="secDiv">
                                <div class="flex items-end justify-end h-56 w-full bg-cover"
                                    style="background-image: url('{{ asset('uploads/hotel_rooms/' . $room->room_image) }}')">
                                    <a href="{{ route('orderRoom', $room) }}" name="order_room"
                                        class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                            <path
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="px-5 py-3 container mx-auto">
                                    <h3 class="font-bold text-gray-700 name">{{ $room->hotel->name }}</h3>
                                </div>
                                <div class="px-5 py-3">
                                    <h4 class="text-gray-700 ">{{ $room->name }}</h4>
                                    <p class="text-gray-400 italic address">{{ $room->hotel->address }}</p>
                                    <input type="hidden" value={{ $room->price }} class="price">
                                    <span class="text-gray-500 mt-2 HELLO">
                                        {{ $room->convertedPrice($room->price) }}/day</span>
                                </div>
                                <div class="float-right pr-3 pb-4">
                                    <p class="float-left inline star">{{ $room->hotel->star }}</p>
                                    <svg class="mx-1 w-4 h-4 fill-current text-yellow-500 relative inline float-left mt-1"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                    </svg>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-12">
                        {{ $rooms->links() }}
                    </div>
                @else
                    <p>No hotels are listed right now!</p>
                @endif
            </div>
        </main>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            var location = "-1";
            var search = "";
            var star = "-1"
            var price = [-1, -1];
            $("#searcher").on("keyup", function() {
                search = $(this).val().toLowerCase();
                $.fn.endCheck();
            });
            $("#loc_filter,#loc_star,#loc_price").on("change", function() {
                location = $("#loc_filter").val().toLowerCase();
                star = $("#loc_star").val().toLowerCase();
                price = $("#loc_price").val().split('_').map(Number);
                $.fn.endCheck();
            });

            $.fn.endCheck = function() {
                $("#entryDiv #secDiv").filter(function() {
                    let curr_price = parseInt($(this).find('.price').val(), 10);
                    let checkPrice = (curr_price >= price[0] && curr_price <= price[1]);
                    let checkStar = ($(this).find('.star').text().toLowerCase().indexOf(
                        star) > -1)
                    let checkAddress = ($(this).find('.address').text().toLowerCase()
                        .indexOf(location) > -1);
                    let checkSearch = ($(this).find('.name').text().toLowerCase().indexOf(search) >
                        -1)

                    console.log(checkSearch);
                    let check = true;
                    if (price[0] != -1) {
                        check = check && checkPrice;
                    }
                    if (star != "-1") {
                        check = check && checkStar;
                    }
                    if (location != "-1") {
                        check = check && checkAddress;
                    }
                    if (search != "-1") {
                        check = check && checkSearch;
                    }
                    $(this).toggle(check);
                });
            }

        });

    </script>

@endsection
