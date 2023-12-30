<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AlatController;
use App\Http\Controllers\Admin\RentController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\LandingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\LandingController@index')->name('index');
Route::get('/detail/{id}',[LandingController::class, 'detail'])->name('home.detail');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function(){
  
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.user.login')->name('login');
          Route::view('/register','dashboard.user.register')->name('register');
          Route::post('/create',[UserController::class,'create'])->name('create');
          Route::post('/check',[UserController::class,'check'])->name('check');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
          Route::get('/home',[HomeController::class, 'index'])->name('home.index');
          Route::post('/order/{id}/{userId}',[CartController::class,'store'])->name('cart.store');
          Route::get('/reservasi',[OrderController::class,'show'])->name('order.show');
          Route::delete('/delete/{id}',[CartController::class,'destroy'])->name('cart.destroy');
          Route::post('/checkout',[OrderController::class,'create'])->name('order.create');
          Route::post('/logout',[UserController::class,'logout'])->name('logout');
    });

});

Route::prefix('admin')->name('admin.')->group(function(){
       
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.admin.login')->name('login');
        Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::get('/home',[DashboardController::class, 'index'])->name('home.index');
        Route::get('/kategori',[CategoriesController::class,'index'])->name('kategori.index');
        Route::post('/kategori',[CategoriesController::class,'store'])->name('kategori.store');
        Route::get('kategori/{id}/edit',[CategoriesController::class,'edit'])->name('kategori.edit');
        Route::patch('kategori/{id}',[CategoriesController::class,'update'])->name('kategori.update');
        Route::delete('kategori/{id}',[CategoriesController::class,'destroy'])->name('kategori.destroy');
        Route::get('/alat/{id?}',[AlatController::class, 'index'])->name('alat.index');
        Route::get('/alat/{id}/detail',[AlatController::class,'edit'])->name('alat.edit');
        Route::patch('/alat/{id}/detail',[AlatController::class,'update'])->name('alat.update');
        Route::delete('/alat/{id}/detail',[AlatController::class,'destroy'])->name('alat.destroy');
        Route::post('/alat',[AlatController::class, 'store'])->name('alat.store');
        Route::get('/penyewaan',[RentController::class, 'index'])->name('penyewaan.index');
        Route::get('/penyewaan/detail/{id}',[RentController::class, 'detail'])->name('penyewaan.detail');
        Route::patch('/acc/{paymentId}',[OrderController::class,'acc'])->name('acc');
        Route::delete('cancel/{id}',[RentController::class,'destroy'])->name('admin.penyewaan.cancel');
        Route::get('/riwayat',[RentController::class,'riwayat'])->name('riwayat-reservasi');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });

});
