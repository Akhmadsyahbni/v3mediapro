<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carts;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Category;
use App\Models\Alat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.admin.home',[
            'total_alat' => Alat::count(),
            'total_kategori' => Category::count(),
            'total_penyewaan' => Payment::count(),
        ]);
    }
}
