<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertHotelsToHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('hotels')->insert([
            [
                'name' => 'Hotel Placeholder',
                'address' => 'Jakarta',
                'star' => '4'
            ],
            [
                'name' => 'Hotel PemWeb makan kebanyakan waktu',
                'address' => 'Surabaya',
                'rating' => '1'
            ],
            [
                'name' => 'Hotel Android Studio Capek',
                'address' => 'Palembang',
                'rating' => '3'
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
        DB::table('hotels')->where(function ($query) {
            $query->where('id', '=', '1')
                ->orWhere('id', '=', '2')
                ->orWhere('id', '=', '3');
        })->delete();
    }
}
