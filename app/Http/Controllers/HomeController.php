<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::with(['hotel'])->take(2)->get();
        return view("home", [
            'rooms' => $rooms,
        ]);
    }
}
