<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if($request->remember){
            Cookie::queue('mycookie', $request->email, 15);
        } else{
            Cookie::queue(Cookie::forget('mycookie'));
        }
        if(Auth::attempt($credentials, true)){
            // dd(Auth::user());
            Session::put('mysession', Auth::user()->name);
            if(Auth::user()->role == 'admin') return redirect('/admin_dashboard');
            else if(Auth::user()->role == 'courier') return redirect('/courier_dashboard');
            return redirect('/');
        }
        return back()->withErrors("Not Registered", "login");
    }

    public function logout(){
        Auth::logout();
        Session::forget('mysession');
        return redirect('/');
    }
}
