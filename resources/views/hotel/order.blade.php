@extends('layouts.app')

@section('content')
    <section class="flex flex-col md:flex-row h-screen items-center">
        <div class=" bg-cover w-full px-8 h-screen justify-center"
            style="background-image: url('../images/bg/order_image.jpg');">
            <div
                class="w-full md:max-w-md lg:max-w-full md:mx-auto md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    flex items-center justify-center">
                <form class="max-w-xl m-4 p-10 bg-white rounded shadow-2xl" method="POST"
                    action="{{ route('orderRoom', $room) }}">
                    @csrf
                    <p class="text-gray-800 font-medium">Customer information</p>
                    <div class="">
                        <label class="block text-sm text-gray-600" for="cus_name">Hotel Choice</label>
                        <input class="w-full px-5 py-2 text-gray-500 bg-gray-200 rounded" type="text"
                            placeholder="Your Name" aria-label="Name"
                            value="{{ $room->hotel->name }} - {{ $room->name }}" disabled>
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="gname">Guest Full Name</label>
                        <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text"
                            placeholder="Name used for order" aria-label="name" @error('name') border-red-500 @enderror">
                        @error('name')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label class=" block text-sm text-gray-600" for="gphone">Guest Phone Number </label>
                        <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="phone" name="phone"
                            type="text" placeholder="Phone Number used for order" aria-label="phone" @error('phone')
                            border-red-500 @enderror">
                        @error('phone')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="gemail">Guest Email</label>
                        <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 roundedd" id="email" name="email"
                            type="email" placeholder="Email used for order" aria-label="email" @error('email')
                            border-red-500 @enderror">
                        @error('email')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <p class="mt-4 text-gray-800 font-medium">Payment information</p>
                    <div class="">
                        <label class="block text-sm text-gray-600" for="groom">Total Room Ordered</label>
                        <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="room_ordered"
                            name="room_ordered" type="number" min='1' max="{{ $room->room_total - $room->room_ordered }}"
                            value="1" aria-label="room_ordered" placeholder="Number of Ordered Rooms" @error('room_ordered')
                            border-red-500 @enderror">
                        @error('room_ordered')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="2xl:inline-block mt-2 -mx-1 2xl:pl-1 2xl:w-1/2">
                        <label class="block text-sm text-gray-600" for="gcheckin">Check-In Date</label>
                        <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="check_in" name="check_in"
                            type="date" aria-label="check_in" @error('check_in') border-red-500 @enderror"
                            value="<?php echo date('Y-m-d'); ?>">
                        @error('check_in')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="2xl:inline-block mt-2 -mx-1 2xl:ml-1 2xl:pl-1 2xl:w-1/2">
                        <label class="block text-sm text-gray-600" for="gcheckout">Check-Out Date</label>
                        <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="check_out" name="check_out"
                            type="date" aria-label="check_out" @error('check_out') border-red-500 @enderror">
                        @error('check_out')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <hr>
                    @if (session('success'))
                        <div class="text-center">
                            <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                href="{{ route('profile') }}">
                                {{ session('success') }}
                            </a>
                        </div>
                    @endif
                    <div class="mt-4">
                        <input value="{{ $room->convertedPrice($room->price) }}" id="lulz"
                            class="cursor-pointer px-4 py-2 text-white font-light tracking-wider bg-gray-900 rounded hover:scale-105 ease-out transition duration-300 transform hover:bg-gray-700 hover:shadow-xl"
                            type="submit">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        var value = "<?php print $room->price; ?>";

        $(document).ready(function() {
            $("#room_ordered, #check_in, #check_out").on("change", function() {
                var room = $("#room_ordered").val()
                var startDate = $('#check_in').val();
                var endDate = $('#check_out').val();

                var start = new Date(startDate);
                var end = new Date(endDate);

                var diffDate = (end - start) / (1000 * 60 * 60 * 24);
                var days = Math.round(diffDate);

                var totalPrice = days * value * room
                var conv = "Rp. " + totalPrice.toFixed(2).replace(".", ",").replace(
                    /(\d)(?=(\d{3})+(?!\d))/g,
                    "$1.");
                $("#lulz").val(conv);
            });
        });

    </script>
@endsection
