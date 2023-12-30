<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Alat;
use App\Models\Category;
use App\Models\Carts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $alat = Alat::with(['category'])->get();
        $carts = Carts::where('user_id','=',Auth::id());
        // dd($alats);
        if(request('search')) {
            $key = request('search');
            $alats =  Alat::with(['category'])->where('nama_alat','LIKE','%'.$key.'%')->get();
        }
        if(request('kategori')) {
            $alats = Alat::with(['category'])->where('kategori_id','=',request('kategori'))->get();
        }
        return view('dashboard.user.home',[
            'alat' => $alat,
            'carts' => $carts->get(),
            'total' => $carts->sum('harga'),
            'categories' => Category::all()
        ]);
    }
}
