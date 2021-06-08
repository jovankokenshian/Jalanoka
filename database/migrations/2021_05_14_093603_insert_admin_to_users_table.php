<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertAdminToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert(
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$cdPDAgchej78MIXFZRJs5O/3jpMHz62.TgLwmsScHucg1pm6DFP4i', //admin
                'phone' => '044444444444',
                'date_of_birth' => '1882-06-17',
                'profile_image' => '1620985584.jpg',
                'created_at' => '1970-12-12 00:00:02',
                'updated_at' => '1970-12-12 00:00:02',
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->where('email', '=', 'admin@admin.com')->delete();
    }
}
