<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    public function index()
    {
        return view('auth.login');
    }

    public function verifyLogin(Request $request)
    {
        //Validation
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required|captcha',
        ]);
        //Warning if login credential false
        if (!Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Invalid Login Details');
        }

        if (Auth::user()->email == "admin@admin.com") return redirect()->route('admin');
        else return redirect()->route('home');
    }
}
