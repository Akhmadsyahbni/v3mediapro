<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Alat;
use App\Models\Order;

class LandingController extends Controller
{
    public function index(){
        $alats = Alat::all();
        return view('landing.index',[
            'alats' => $alats,
            'categories' => Category::all()
        ]);
    }
    public function detail($id) {
        $detail = Alat::with(['category'])->find($id);

        return view('landing.detail',[
            'detail' => $detail,
            'order' => Order::where('alat_id', $id)->where('status', 2)->get()
        ]);
    }
}
