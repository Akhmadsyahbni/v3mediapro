<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carts;
use App\Models\Order;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //

    public function show() {
        $payment = Payment::with(['user','order'])->where('user_id', Auth::id());
        return view('dashboard.user.transaksi',[
            'reservasi' => $payment->where('status','!=', 4)->orderBy('id','DESC')->get(),
            'riwayat' => Payment::with(['user','order'])->where('user_id', Auth::id())->where('status', 4)->orderBy('id','DESC')->get()
        ]);
    }

    public function create(Request $request) {
        $cart = Carts::where('user_id', Auth::id())->get();
        $pembayaran = new Payment();

        $pembayaran->no_invoice = Auth::id()."/".Carbon::now()->timestamp;
        $pembayaran->user_id = Auth::id();
        $pembayaran->total = $cart->sum('harga');
        // $pembayaran->status = 'pending';
        $pembayaran->save();
        

        foreach($cart as $c) {
            Order::create([
                'alat_id' => $c->alat_id,
                'user_id' => $c->user_id,
                'payment_id' => Payment::where('user_id',Auth::id())->orderBy('id','desc')->first()->id,
                'harga' => $c->harga,
            ]);
            $c->delete();
        }

        if($pembayaran){
            return redirect()->route('user.home.index')->with('success', 'Berhasil chekout');
        }else{
            return redirect()->back()->with('fail', 'Gagal Mendaftarkan');
        }

    }

    public function acc(Request $request, $paymentId) {
        $orders = $request->order;
        $payment = new Payment();

        // foreach($orders as $o) {
        //     Order::where('id', $o)->update(['status' => 2]);
        // }
        $payment->find($paymentId)->update(['status' => 3]);
        Order::where('payment_id', $paymentId)->where('status', 1)->update(['status' => 3]);
        $payment->where('id', $paymentId)->update(['total' => Order::where('payment_id', $paymentId)->where('status', 2)->sum('harga')]);
        return back();
    }
}
