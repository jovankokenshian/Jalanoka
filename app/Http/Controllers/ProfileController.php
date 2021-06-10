<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Rules\PhoneNumber;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $user = Auth::user();
        $transactions = Transaction::whereRaw(Auth::id() . '=user_id')->with(['room.hotel'])->paginate(10);
        return view('users.profile.profile', [
            'user' => $user,
            'transactions' => $transactions,
        ]);
    }

    public function updateInfo(Request $request)
    {
        //Validation
        $this->validate($request, [
            'name' => 'required|max:255',
            'phone' => ['required', new PhoneNumber],
            'date_of_birth' => 'required|date',
        ]);
        //update User
        $user = User::where('id', Auth::user()->id)
            ->first(); // this point is the most important to change
        $user->name = $request['name'];
        $user->phone = $request['phone'];
        $user->date_of_birth = $request['date_of_birth'];
        $user->save();
        return back()->with('message', 'Profile Updated');
    }

    public function updateImage(Request $request)
    {
        //Validation
        $this->validate($request, [
            'profile_image'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        //store Image
        $user = User::where('id', Auth::user()->id)
            ->first(); // this point is the most important to change
        if ($request->hasFile('profile_image')) {
            $filename = Storage::disk('s3')->put('images/profile_images', $request->file('profile_image'), "public");
        }
        if ($user->profile_image != 'images/profile_images/default.jpg')
            Storage::disk('s3')->delete($request->file('profile_image'));
        $user->profile_image = $filename;
        $user->save();
        return back()->with('message', 'Profile Updated');
    }

    public function updatePassword(Request $request)
    {
        $user = User::where('id', Auth::user()->id)
            ->first(); // this point is the most important to change
        //Validation
        $this->validate($request, [
            'old_password' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('Your password was not updated, since the provided current password does not match.');
                    }
                }
            ],
            'password' => 'required|different:old_password',
            'password_confirmation' => 'required|same:password',
        ]);
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('message', 'Password Updated');
    }
}
