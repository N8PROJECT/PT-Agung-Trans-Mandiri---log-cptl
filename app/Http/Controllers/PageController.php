<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Models\CapitalBranch;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function login_page(){
        return view('page.login');
    }

    public function admin_page(){
        $today = Carbon::now();
        $formattedDate = $today->format('l, d F Y');

        $activeUsersCount = User::where('status', 'active')->count();
        $inactiveUsersCount = User::where('status', 'inactive')->count();

        $totalDeliveriesThisMonth = Delivery::whereYear('tanggal_kirim', now()->year)
        ->whereMonth('tanggal_kirim', now()->month)
        ->count();

        $totalDeliveriesThisYear = Delivery::whereYear('tanggal_kirim', now()->year)
        ->count();

        return view('page.admin.admin_dashboard', [
            'activeUsersCount' => $activeUsersCount,
            'inactiveUsersCount' => $inactiveUsersCount,
            'totalDeliveriesThisMonth' => $totalDeliveriesThisMonth,
            'totalDeliveriesThisYear' => $totalDeliveriesThisYear,
            'formattedDate' => $formattedDate
        ]);
    }

    public function users(){
        $users = User::all();

        return view('page.admin.users', compact('users'));
    }

    public function capital_branch(){
        $capital_branches = CapitalBranch::all();

        return view('page.admin.capital_branch', compact('capital_branches'));
    }

    public function report_pengiriman(){
        $kurir = User::where('role', 'courier')->get();
        
        return view('page.admin.report-pengiriman', compact('kurir'));
    }

    public function courier_page(){
        $today = Carbon::now();
        $formattedDate = $today->format('l, d F Y');

        $totalDeliveriesThisMonth = Delivery::whereYear('tanggal_kirim', now()->year)
        ->whereMonth('tanggal_kirim', now()->month)
        ->where('user_id', Auth::id())
        ->count();

        $totalDeliveriesThisYear = Delivery::whereYear('tanggal_kirim', now()->year)
        ->where('user_id', Auth::id())
        ->count();

        return view('page.courier.courier_dashboard', compact('totalDeliveriesThisMonth', 'totalDeliveriesThisYear', 'formattedDate'));
    }

    public function document_delivery(){
        $deliveries = Delivery::where('user_id', Auth::id())->get();
        $branches = CapitalBranch::all();

        return view('page.courier.document_delivery', compact('deliveries', 'branches'));
    }

    public function rekap_pengiriman(){
        return view('page.courier.rekap_pengiriman');
    }
}
