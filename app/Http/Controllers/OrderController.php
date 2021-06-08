<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Rules\checkOut;
use App\Rules\ValidRoom;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function OrderRoom(Room $room)
    {
        return view('hotel.order', [
            'room' => $room,
        ]);
    }

    public function storeTransaction(Room $room, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => ['required', new PhoneNumber],
            'room_ordered' => ['required', new ValidRoom($room->room_total, $room->room_ordered)],
            'check_in' => 'required|date|after_or_equal:' . Carbon::now()->toDateString(),
            'check_out' => ['required', 'date', new checkOut($request->check_in)]
        ]);
        $check_in = Carbon::parse($request->check_in);
        $check_out = Carbon::parse($request->check_out);
        $totalDays = $check_in->diffInDays($check_out);
        $totalprice = (($totalDays * $request->room_ordered) * $room->price);

        $request->user()->transactions()->create([
            'room_id' => $room->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'room_ordered' => $request->room_ordered,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'totalprice' => $totalprice
        ]);


        $room->room_ordered = $request->room_ordered;
        $room->save();

        return back()->with('success', 'Order Successful! Click here to see your ordered list in profile page!');
    }
}
