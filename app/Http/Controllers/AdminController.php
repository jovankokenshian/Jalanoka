<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Hotel;
use App\Rules\aboveOne;
use App\Rules\checkOut;
use App\Rules\ValidRoom;
use App\Rules\PhoneNumber;
use App\Rules\verifyHotel;
use App\Models\Transaction;
use App\Rules\locationCheck;
use Illuminate\Http\Request;
use App\Rules\checkRoomUpdate;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin']);
    }

    public function index()
    {
        $admin = Auth::user()->profile_image;
        $user = User::paginate(10);
        $hotels = Hotel::paginate(10);
        $rooms = Room::with(['hotel'])->paginate(10);
        $transactions = Transaction::with(['room.hotel'])->with(['user'])->paginate(10);

        return view('layouts.admin', [
            'admin' => $admin,
            'users' => $user,
            'rooms' => $rooms,
            'hotels' => $hotels,
            'transactions' => $transactions
        ]);
    }

    public function updateHotel(Request $request)
    {
        //Validation
        $data  =  $request->except(array('_token'));
        $hotel = Hotel::where('id', $request['updateHotelid'])
            ->first(); // this point is the most important to change
        $validator = Validator::make($data, [
            'updateHotelname' => ['required', 'max:255', new verifyHotel($hotel)],
            'updateHotelstar' => ['required', new ValidRoom(5, 0)],
            'updateHoteladdress' => ['required', new locationCheck()]
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        //update User
        $pastname = $hotel->name;
        $hotel->name = $request['updateHotelname'];
        $hotel->address = $request['updateHoteladdress'];
        $hotel->star = $request['updateHotelstar'];
        $hotel->save();
        return back()->with('success', 'Hotel ' . $pastname . ' successfully updated');
    }

    public function addHotel(Request $request)
    {
        //Validation
        $data  =  $request->except(array('_token'));
        $validator = Validator::make($data, [
            'AddHotelname' => 'required|max:255|unique:hotels,name',
            'AddHotelstar' => ['required', new ValidRoom(5, 0)],
            'AddHoteladdress' => ['required', new locationCheck()]
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        Hotel::create([
            'name' => $request['AddHotelname'],
            'address' => $request['AddHoteladdress'],
            'star' => $request['AddHotelstar']
        ]);
        return back()->with('success', 'Hotel ' . $request['address'] . ' Successfully added');
    }

    public function deleteHotel(Hotel $hotel)
    {
        $this->authorize('delete', $hotel);
        $name = $hotel->name;

        $hotel->delete();

        return back()->with('success', 'Hotel ' . $name . ' Successfully deleted');;
    }

    public function addRoom(Request $request)
    {
        //Validation
        $data  =  $request->except(array('_token'));
        $validator = Validator::make($data, [
            'addRoomhotel_id'  => 'required',
            'addRoomname' => 'required|max:255',
            'addRoomprice' => ['required', new aboveOne()],
            'addRoomroom_total' => ['required', new aboveOne()],
            'addRoomfacility' => 'required|max:255',
            'addRoomroom_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        //store User
        $filename = Storage::disk('s3')->put('images/hotel_rooms', $request->file('addRoomroom_image'), "public");

        Room::create([
            'hotel_id'  => $request['addRoomhotel_id'],
            'name' => $request['addRoomname'],
            'price' => $request['addRoomprice'],
            'room_total' => $request['addRoomroom_total'],
            'facility' => $request['addRoomfacility'],
            'room_image' => $filename,
        ]);
        return back()->with('success', 'Room ' . $request['addRoomname'] . ' Successfully added');
    }

    public function updateRoom(Request $request)
    {
        //Validation
        $data  =  $request->except(array('_token'));
        $validator = Validator::make($data, [
            'modalUpdatehotel_id'  => 'required',
            'modalUpdatename' => 'required|max:255',
            'modalUpdateprice' => ['required', new aboveOne()],
            'modalUpdateroom_total' => ['required', new checkRoomUpdate($request['modalUpdateRoomroom_ordered'])],
            'modalUpdatefacility' => 'required|max:255',
            'modalUpdateroom_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $room = Room::where('id', $request['modalUpdateRoom_id'])
            ->first(); // this point is the most important to change
        $room_image = $request->file('modalUpdateroom_image');
        $filename = time() . '.' . $room_image->getClientOriginalExtension();
        $filename = Storage::disk('s3')->put('images/hotel_rooms', $request->file('modalUpdateroom_image'), "public");
        Storage::disk('s3')->delete($room->room_image);
        //update User
        $pastname = $room->name;
        $room->hotel_id = $request['modalUpdatehotel_id'];
        $room->name = $request['modalUpdatename'];
        $room->price = $request['modalUpdateprice'];
        $room->room_total = $request['modalUpdateroom_total'];
        $room->facility = $request['modalUpdatefacility'];
        $room->room_image = $filename;
        $room->save();
        return back()->with('success', 'Room ' . $pastname . ' successfully updated');
    }


    public function deleteRoom(Room $room)
    {
        $this->authorize('delete', $room);
        $name = $room->name;

        Storage::disk('s3')->delete($room->room_image);
        $room->delete();

        return back()->with('success', 'Room ' . $name . ' Successfully deleted');;
    }

    public function addTransaction(Request $request)
    {
        $room = Room::where('id', $request['addTransactionroom_id'])
            ->first();
        $data  =  $request->except(array('_token'));
        $validator = Validator::make($data, [
            'addTransactionroom_id' => 'required',
            'addTransactionuser_id' => 'required',
            'addTransactionname' => 'required',
            'addTransactionemail' => 'required|email',
            'addTransactionphone' => ['required', new PhoneNumber],
            'addTransactionroom_ordered' => ['required', new ValidRoom($room['room_total'], $room['room_ordered'])],
            'addTransactioncheck_in' => 'required|date|after_or_equal:' . Carbon::now()->toDateString(),
            'addTransactioncheck_out' => ['required', 'date', new checkOut($request['addTransactioncheck_in'])]
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $check_in = Carbon::parse($request['addTransactioncheck_in']);
        $check_out = Carbon::parse($request['addTransactioncheck_out']);
        $totalDays = $check_in->diffInDays($check_out);
        $totalprice = (($totalDays * $request['addTransactionroom_ordered']) * $room['price']);
        Transaction::create([
            'room_id' => $request['addTransactionroom_id'],
            'user_id'  => $request['addTransactionuser_id'],
            'name' => $request['addTransactionname'],
            'email' => $request['addTransactionemail'],
            'phone' => $request['addTransactionphone'],
            'room_ordered' => $request['addTransactionroom_ordered'],
            'check_in' => $request['addTransactioncheck_in'],
            'check_out' => $request['addTransactioncheck_out'],
            'totalprice' => $totalprice,
        ]);

        $room['room_ordered'] += $request['room_ordered'];
        $room->save();

        return back()->with('success', 'Transaction by the name of ' . $request['addTransactionname'] . ' Successfully added');
    }

    public function updateTransaction(Request $request)
    {
        //Validation
        $room = Room::where('id', $request['updateTransactionroom_id'])
            ->first();
        $data  =  $request->except(array('_token'));
        $validator = Validator::make($data, [
            'updateTransactionroom_id' => 'required',
            'updateTransactionuser_id' => 'required',
            'updateTransactionname' => 'required',
            'updateTransactionemail' => 'required|email',
            'updateTransactionphone' => ['required', new PhoneNumber],
            'updateTransactionroom_ordered' => ['required', new ValidRoom($room['room_total'], $room['room_ordered'])],
            'updateTransactioncheck_in' => 'required|date|after_or_equal:' . Carbon::now()->toDateString(),
            'updateTransactioncheck_out' => ['required', 'date', new checkOut($request['updateTransactioncheck_in'])]
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $transaction = Transaction::where('id', $request['updateTransactionid'])
            ->first();
        $check_in = Carbon::parse($request['updateTransactioncheck_in']);
        $check_out = Carbon::parse($request['updateTransactioncheck_out']);
        $totalDays = $check_in->diffInDays($check_out);
        $totalprice = (($totalDays * $request['updateTransactionroom_ordered']) * $room['price']);

        //update User
        $invid = $transaction->id . "-" . $transaction->room->id . "/" . $transaction->room->hotel->id;
        if ($transaction->room->id == $request['updateTransactionroom_id']) {
            $diffOrderedRoom = $request['updateTransactionroom_ordered'] - $transaction['room_ordered'];
            $room['room_ordered'] += $diffOrderedRoom;
        } else {
            $room['room_ordered'] += $request['updateTransactionroom_ordered'];
            if ($room['room_ordered'] < 0) $room['room_ordered'] = 0;
            $roomtemp = Room::where('id', $transaction->room->id)
                ->first();
            $roomtemp['room_ordered'] -= $transaction['room_ordered'];
            $roomtemp->save();
        }
        $transaction->room_id = $request['updateTransactionroom_id'];
        $transaction->user_id = $request['updateTransactionuser_id'];
        $transaction->name = $request['updateTransactionname'];
        $transaction->email = $request['updateTransactionemail'];
        $transaction->phone = $request['updateTransactionphone'];
        $transaction->room_ordered = $request['updateTransactionroom_ordered'];
        $transaction->check_in = $request['updateTransactioncheck_in'];
        $transaction->check_out = $request['updateTransactioncheck_out'];
        $transaction->totalprice = $totalprice;

        $room->save();

        $transaction->save();
        return back()->with('success', 'Transaction with Invoice No.' . $invid . ' successfully updated');
    }

    public function deleteTransaction(Transaction $transaction)
    {
        $this->authorize('delete', $transaction);
        $invid = $transaction->id . "-" . $transaction->room->id . "/" . $transaction->room->hotel->id;
        $room = Room::where('id', $transaction['room_id'])
            ->first();

        $room['room_ordered'] -= $transaction['room_ordered'];
        $room->save();


        $transaction->delete();

        return back()->with('success', 'Transaction with invoice ' . $invid . ' Successfully deleted');;
    }
}
