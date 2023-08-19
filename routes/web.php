<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $product=Product::all();
    return view('welcome',compact('product'));
});
Route::get('/dashboard',[DashboardController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function(){
    Route::resource('jenis',JenisController::class);
    Route::resource('user',UserController::class);
    Route::resource('product',ProductController::class);
    Route::resource('cart',KeranjangController::class);
    Route::post('add_cart/{id}',[KeranjangController::class,'add_to_cart'])->name('add_cart');
    Route::post('tambah_qty/{id}',[KeranjangController::class,'tambah_qty_keranjang'])->name('tambah_qty');
    Route::post('kurang_qty/{id}',[KeranjangController::class,'kurang_qty_keranjang'])->name('kurang_qty');
    Route::get('load-keranjang',[KeranjangController::class,'load_keranjang'])->name('load-keranjang');
    Route::post('user/update_profile_photo',[UserController::class,'update_photo_profile'])->name('user.update_photo');
    Route::resource('order',OrderController::class);
    Route::get('pesanan/pesanan_anda',[OrderController::class,'pesanan_anda'])->name('pesanan_anda');
    Route::get('pesanan/pending',[OrderController::class,'pending'])->name('pending');
    Route::get('pesanan/dibayar',[OrderController::class,'dibayar'])->name('dibayar');
    Route::get('pesanan/dipesankan',[OrderController::class,'dipesankan'])->name('dipesankan');
    Route::get('pesanan/dikirim',[OrderController::class,'dikirim'])->name('dikirim');
    Route::get('pesanan/diterima',[OrderController::class,'diterima'])->name('diterima');
    Route::put('pesanan/diterima/{order}',[OrderController::class,'update_status'])->name('pesanan');
    Route::get('dashboard/order_masuk',[DashboardController::class,'order_masuk'])->name('dashboard.order_masuk');
    Route::get('dashboard/verifikasi_pembayaran',[DashboardController::class,'verifikasi_pembayaran'])->name('dashboard.verifikasi_pembayaran');
    Route::put('order/verifikasi_pembayaran/{order}',[DashboardController::class,'verifikasi'])->name('dashboard.verif_pembayaran');
    Route::get('dashboard/kirim_order',[DashboardController::class,'get_kirim_order'])->name('dashboard.kirim');
    Route::get('dashboard/proses_paket/{order}',[DashboardController::class,'proses_paket'])->name('dashboard.proses_paket');
    Route::put('dashboard/kirim-paket/{order}',[DashboardController::class,'kirim_paket'])->name('dashboard.kirim_paket');
    Route::get('dashboard/list-dikirim',[DashboardController::class,'list_dikirim'])->name('dashboard.list_dikirim');
    Route::get('dashboard/list-diterima',[DashboardController::class,'list_diterima'])->name('dashboard.list_diterima');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
