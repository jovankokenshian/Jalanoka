<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertRoomsToRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('rooms')->insert([
            [
                'hotel_id' => '1',
                'name' => 'Twin Bed Room',
                'price' => '1200000',
                'facility' => '2 separated normal-sized bed and 1 bathroom',
                'room_total' => '5',
                'room_image' => 'images/hotel_rooms/placeholder1.jpg'
            ],
            [
                'hotel_id' => '1',
                'name' => 'Queen Bed Room',
                'price' => '1400000',
                'facility' => '1 queen-sized bed and 1 bathroom',
                'room_total' => '9',
                'room_image' => 'images/hotel_rooms/placeholder2.jpg'
            ],
            [
                'hotel_id' => '2',
                'name' => 'Suite',
                'price' => '2100000',
                'facility' => '2 queen-sized bed, 2 bathrooms, and 1 sauna',
                'room_total' => '2',
                'room_image' => 'images/hotel_rooms/placeholder3.jpg'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('rooms')->where(function ($query) {
            $query->where('id', '=', '1')
                ->orWhere('id', '=', '2')
                ->orWhere('id', '=', '3');
        })->delete();
    }
}
