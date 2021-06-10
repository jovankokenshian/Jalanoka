@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between" data-aos="fade-down" data-aos-offset="200" data-aos-delay="50"
        data-aos-duration="1000">
        <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
            Our Best Seller Hotel Rooms
        </div>

    </div>
    <section data-aos="fade-left" data-aos-offset="200" data-aos-delay="50" data-aos-duration="1000" class="bg-white">
        <div class="max-w-5xl px-6 py-16 mx-auto">
            <div class="items-center md:flex md:space-x-6">
                <div class="md:w-1/2">
                    <h3 class="text-2xl font-semibold text-gray-800">{{ $rooms[0]->hotel->name }} </h3><br>
                    <h4 class="font-light">{{ $rooms[0]->name }}</h4>

                    <p class="max-w-md mt-4 text-gray-600">Facility Included are: <br>{{ $rooms[0]->facility }}</p>
                </div>

                <div class="mt-8 md:mt-0 md:w-1/2">
                    <div class="flex items-center justify-center">
                        <div class="max-w-md">
                            <img class="object-cover object-center w-full rounded-md shadow" style="height: 500px;"
                                src="{{Storage::disk('s3')->url($rooms[0]->room_image) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section data-aos="fade-right" data-aos-offset="200" data-aos-delay="50" data-aos-duration="1000" class="bg-white">
        <div class="max-w-5xl px-6 py-16 mx-auto">
            <div class="items-center md:flex md:space-x-6">
                <div class="hidden md:block md:w-1/2">
                    <div class="flex items-center justify-center">
                        <div class="max-w-md">
                            <img class="object-cover object-center w-full rounded-md shadow" style="height: 500px;"
                                src="{{ Storage::disk('s3')->url($rooms[1]->room_image) }}">
                        </div>
                    </div>
                </div>

                <div class="mt-8 md:mt-0 md:w-1/2">
                    <h3 class="text-2xl font-semibold text-gray-800">{{ $rooms[1]->hotel->name }} </h3><br>
                    <h4 class="font-light">{{ $rooms[1]->name }}</h4>
                    </h3>
                    <p class="max-w-md mt-4 text-gray-600">Facility Included are:<br>{{ $rooms[1]->facility }}</p>
                </div>
                <div class="block md:hidden md:w-1/2">
                    <div class="flex items-center justify-center">
                        <div class="max-w-md">
                            <img class="object-cover object-center w-full rounded-md shadow" style="height: 500px;"
                                src="{{ Storage::disk('s3')->url($rooms[1]->room_image) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
