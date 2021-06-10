<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //Validation
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'phone' => ['required', new PhoneNumber],
            'profile_image'     =>  'image|mimes:jpeg,png,jpg,gif|max:2048',
            'date_of_birth' => 'required|date',
        ]);
        //store User
        $filename = "default.jpg";
        if ($request->hasFile('profile_image')) {
            $profile_image = $request->file('profile_image');
            $filename = time() . '.' . $profile_image->getClientOriginalExtension();
            Image::make($profile_image)->resize(300, 300)->save(public_path('storage\profile_images\\' . $filename));
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'profile_image' => $filename,
            'date_of_birth' => Carbon::parse($request->date_of_birth)->format('Y-m-d'),
            /*laravel uses bcrypt which means that the  
                salt and cost are embedded into the hash and 
                so can be easily parsed out into individual 
                components for reconstruction/verification */
            'password' => Hash::make($request->password),
        ]);
        //Redirect User
        return back()->with('success', 'Register Successful! Press here to go to Login page');
    }
}
