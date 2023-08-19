<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order->status='dibayar';
        $order->save();
        return redirect()->route('dibayar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function  pesanan_anda(){
       
        return view('order.pesanan_anda');
    }

    public function pending(){
        $pesanan=Order::where('status','pending')->where('user_id',Auth::id())->with('details','details.product')->withCount('details as total_products')->get();
        // return $pesanan;
        return view('order.pending',compact('pesanan'));
    }

    public function dibayar(){
        $pesanan=Order::where('status','dibayar')->where('user_id',Auth::id())->with('details','details.product')->withCount('details as total_products')->get();
        return view('order.dibayar',compact('pesanan'));
    }
    public function dipesankan(){
        $pesanan=Order::where('status','dipesankan')->where('user_id',Auth::id())->with('details','details.product')->withCount('details as total_products')->get();
        return view('order.dipesankan',compact('pesanan'));
    }
    public function dikirim(){
        $pesanan=Order::where('status','dikirim')->where('user_id',Auth::id())->with('details','details.product')->withCount('details as total_products')->get();
        return view('order.dikirim',compact('pesanan'));
    }
    public function diterima(){
        $pesanan=Order::where('status','sampai')->where('user_id',Auth::id())->with('details','details.product')->withCount('details as total_products')->get();
        return view('order.diterima',compact('pesanan'));
    }
    public function update_status(Request $request, Order $order){
        // return $order;
        $order->status='sampai';
        $order->save();
        return redirect()->route('diterima');
    }
}
