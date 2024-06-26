<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DeliveryController extends Controller
{
    public function add_data(Request $request){
        $rules = [
            'area' => 'required',
            'tanggal_kirim' => 'required',
            'pengirim' => 'required',
            'cabang_pengirim' => 'required',
            'tujuan_dokumen' => 'required',
            'cabangtujuan' => 'required',
            'nomor_segel' => 'required|regex:/^0*\d+$/',
            'kota' => 'required',
            'jenis_kiriman' => 'required',
            'nama_penerima' => 'required',
            'tanggal_terima' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        $tanggal_kirim = Carbon::parse($request->tanggal_kirim);
        $tanggal_terima = Carbon::parse($request->tanggal_terima);

        $tanggal_hari_ini = Carbon::today();
        $tanggal_maksimum = $tanggal_hari_ini->subDays(1); // H-1

        if ($tanggal_kirim->greaterThanOrEqualTo($tanggal_maksimum) && $tanggal_terima->greaterThanOrEqualTo($tanggal_kirim)) {
            $delivery = new Delivery();
            $delivery->area = $request->area;
            $delivery->tanggal_kirim = $request->tanggal_kirim;
            $delivery->pengirim = $request->pengirim;
            $delivery->cabang_pengirim = $request->cabang_pengirim;
            $delivery->tujuan = $request->tujuan;
            $delivery->capital_branch_id = $request->cabangtujuan;
            $delivery->nomor_segel = $request->nomor_segel;
            $delivery->kota = $request->kota;
            $delivery->jenis_kiriman = $request->jenis_kiriman;
            $delivery->jumlah = $request->jumlah;
            $delivery->nama_penerima = $request->nama_penerima;
            $delivery->tanggal_terima = $request->tanggal_terima;
            $delivery->user_id = Auth::id();
    
            $delivery->save();
    
            return redirect()->back();
        } 
        else {
            if ($tanggal_kirim->lessThan($tanggal_maksimum)) {
                $validator->errors()->add('tanggal_kirim', 'Tanggal kirim tidak boleh lebih dari H-1.');
                return redirect()
                ->back()
                ->withErrors($validator);
            }
            else if ($tanggal_terima->lessThan($tanggal_kirim)) {
                $validator->errors()->add('tanggal_terima', 'Tanggal terima harus lebih lebih dari tanggal kirim.');
                return redirect()
                ->back()
                ->withErrors($validator);
            }
        }
    }

    public function edit_delivery(Request $request){
        $delivery = Delivery::find($request->id);
        $delivery->area = $request->area != null ? $request->area : $delivery->area;
        $delivery->tanggal_kirim = $request->tanggal_kirim != null ? $request->tanggal_kirim : $delivery->tanggal_kirim;
        $delivery->pengirim = $request->pengirim != null ? $request->pengirim : $delivery->pengirim;
        $delivery->cabang_pengirim = $request->cabang_pengirim != null ? $request->cabang_pengirim : $delivery->cabang_pengirim;
        $delivery->tujuan = $request->tujuan != null ? $request->tujuan : $delivery->tujuan;
        $delivery->capital_branch_id = $request->cabangtujuan != null ? $request->cabangtujuan : $delivery->capital_branch_id;
        $delivery->nomor_segel = $request->nomor_segel != null ? $request->nomor_segel : $delivery->nomor_segel;
        $delivery->kota = $request->kota != null ? $request->kota : $delivery->kota;
        $delivery->jenis_kiriman = $request->jenis_kiriman != null ? $request->jenis_kiriman : $delivery->jenis_kiriman;
        $delivery->jumlah = $request->jumlah != null ? $request->jumlah : $delivery->jumlah;
        $delivery->nama_penerima = $request->nama_penerima != null ? $request->nama_penerima : $delivery->nama_penerima;
        $delivery->tanggal_terima = $request->tanggal_terima != null ? $request->tanggal_terima : $delivery->tanggal_terima;
        $delivery->user_id = $request->namakurir != null ? $request->namakurir : $delivery->user_id;
    
        $delivery->save();
    
        return redirect()->back();
    }
    public function delete_delivery($id){
        $delivery = Delivery::find($id);
        $delivery->delete();

        return redirect()->back();
    }
}