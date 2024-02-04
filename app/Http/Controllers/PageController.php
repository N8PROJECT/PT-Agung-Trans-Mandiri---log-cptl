<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login_page(){
        return view('page.login');
    }

    public function admin_page(){
        return view('page.admin.admin_dashboard');
    }

    public function courier_page(){
        return view('page.courier.courier_dashboard');
    }
}
