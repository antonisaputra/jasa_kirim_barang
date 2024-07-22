<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    //

    public function index(){
        return view('auth');
    }
    public function authenticate(Request $request){
        $credential = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('LoginError','Login Filed !');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
