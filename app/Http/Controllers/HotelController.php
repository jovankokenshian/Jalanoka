<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use Akaunting\Money\Money;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class HotelController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['OrderRoom']);
    }

    public function index()
    {
        $rooms = Room::whereRaw('room_total!=room_ordered')->with(['hotel'])->paginate(12);
        return view("hotel.index", [
            'rooms' => $rooms,
        ]);
    }

    public function OrderRoom(Room $room)
    {
        debug_to_console($room);
        return view('hotel.order', [
            'room' => $room,
        ]);
    }
}
