<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class RentController extends Controller
{
    public function index() {
        return view('dashboard.admin.penyewaan',[
            'penyewaan' => Payment::with(['user','order'])->where('status', '!=', 4)->orderBy('id','DESC')->get(),
        ]);
    }

    public function destroy($id) {
        $payment = Payment::find($id);

        $payment->delete();

        return redirect(route('admin.penyewaan.index'));
    }


    public function detail($id) {
        $detail = Order::with(['user','payment','alat'])->where('payment_id', $id)->get();
        $payment = Payment::find($id);

        return view('dashboard.admin.penyewaandetail',[
            'detail' => $detail,
            'total' => $payment->total,
            'status' => $payment->status,
        ]);
    }
    public function riwayat() {
        $totalHargaPerUser = Order::with('user')
        ->select('user_id', DB::raw('SUM(harga) as total_harga'))
        ->groupBy('user_id')
        ->get();
        

         // Mengambil hanya total_harga dari hasil query
    $totalHarga = $totalHargaPerUser->pluck('total_harga');
        // dd($totalHargaPerUser);

        return view('dashboard.admin.riwayat',[
            'penyewaan' => Payment::with('user')->where('status', '=', 3)->get(),
            'total' => $totalHarga,
        ]);
    }
}
