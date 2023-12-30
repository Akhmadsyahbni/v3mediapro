<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alat;
use App\Models\Carts;

class CartController extends Controller
{
    public function store(Request $request, $id, $userId) {
        // dd($request->all());

        $cart = new Carts();
        $alat = Alat::find($id);

        if($request['btn'] == '24') {
            $harga = $alat->harga24;
        }
        
        $cart->user_id = $userId;
        $cart->alat_id = $alat->id;
        $cart->harga = $harga;
        $cart->durasi = $request['btn'];
        $cart->save();

        return back()->with('success', 'Berhasil ditambahkan ke keranjang');
    }

    public function destroy($id) {
        $alat = Carts::find($id);
        $alat->delete();

        return back();
    }
}
