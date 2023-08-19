<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function dashboard(){
        $product=Product::count();
        $user=User::count();
        $sales=Order::sum('total_bayar');
        $order=Order::count();
        $dikirim=Order::where('status','dikirim')->count();
        $sampai=Order::where('status','sampai')->count();
        return view('dashboard.dashboard',compact('product','user','sales','order','dikirim','sampai'));
    }

    public function order_masuk(){ 
        $order=Order::with('details','user')->withCount('details as total_product')->get();
        return view('dashboard.order_masuk',compact('order'));
    }

    public function verifikasi_pembayaran(){
        $order=Order::with('details','user')->where('status','dibayar')->get();
        return view('dashboard.verifikasi_pembayaran',compact('order'));
    }

    public function verifikasi(Order $order){
        $order->status='dipesankan';
        $order->save();
        return back()->with('success','Pembayaran berhasil diverifikasi');
    }

    
    public function get_kirim_order(){
        $order=Order::with('details','user')->where('status','dipesankan')->get();
        return view('dashboard.kirim_order',compact('order'));
    }

    public function proses_paket(String $id){
        $order=Order::with('details.product','user')->where('status','dipesankan')->where('id',$id)->get();
        return view('dashboard.proses_paket',compact('order'));
    }

    public function kirim_paket(Request $request, Order $order){
        $request->validate([
            'no_resi'=>'required'
        ]);
        $order->no_resi=$request->no_resi;
        $order->status='dikirim';
        $order->save();
        return redirect()->route('dashboard.kirim')->with('success','Paket telah dikirim');
     }

     public function list_dikirim(){ 
        $order=Order::with('details','user')->where('status','dikirim')->get();
        return view('dashboard.list_dikirim',compact('order'));
     }
     public function list_diterima(){ 
        $order=Order::with('details','user')->where('status','sampai')->get();
        return view('dashboard.list_diterima',compact('order'));
     }
}
