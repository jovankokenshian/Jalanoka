<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::with(['hotel'])->orderBy('room_ordered', 'desc')->limit(1)->paginate(1);
        $rooms2 = Room::with(['hotel'])->orderBy('room_ordered', 'desc')->offset(1)->limit(1)->paginate(1);
        return view("home", [
            'rooms' => $rooms,
            'rooms2' => $rooms2
        ]);
    }
}
