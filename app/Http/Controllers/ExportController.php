<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Exports\DeliveriesExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DeliveriesExportAdmin;

class ExportController extends Controller
{
    public function export_deliveries_forcourier(Request $request){
        $userId = auth()->id();

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        
        return Excel::download(new DeliveriesExport($startDate, $endDate, $userId), 'rekap-pengiriman.xlsx');
    }
    public function export_deliveries_foradmin(Request $request){
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $kurir = $request->input('kurir');

        return Excel::download(new DeliveriesExportAdmin($startDate, $endDate, $kurir), 'rekap-pengiriman.xlsx');
    }
}
