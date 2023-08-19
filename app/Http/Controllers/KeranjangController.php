<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Order;
use App\Models\Order_details;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart=Keranjang::where('user_id',Auth::id())->where('status','pending')->with('product','product.jenis','user')->get();
        if($cart->isEmpty()){
            return back()->with('pesan','keranjang kosong, silahkan pesan barang terlebih dahulu');
        };
        return view('keranjang.keranjang',compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('keranjang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $parts = explode(",", $request->shipping);
        $nominalShipping = trim(str_replace("'", "", $parts[0]));
        $shipping = trim(str_replace("'", "", $parts[1]));
        $qty=$request->qty;
        $product_id=$request->product_id;
        $keranjang_id=$request->keranjang_id;

        DB::beginTransaction();
        try {
            $order=Order::create([
                'user_id'=>Auth::id(),
                'kode'=>time(),
                'shipping'=>$shipping,
                'total_shipping'=>$nominalShipping,
                'total_bayar'=>$request->total_bayar,
                'metode_pembayaran'=>$request->metode_pembayaran,
                'deskripsi_pengiriman'=>$request->deskripsi_pengiriman
            ]);
           
            $orderDetails = [];
            for ($i = 0; $i < count($qty); $i++) {
                $orderDetails[] = [
                    'order_id' => $order->id,
                    'qty' => $qty[$i],
                    'product_id' => $product_id[$i]
                ];
                $keranjang=Keranjang::find($keranjang_id[$i]);
                $keranjang->status='checkout';
                $keranjang->save();
            }
            Order_details::insert($orderDetails);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return with('error','Pesanan gagal dibuat');
        }
        if($request->metode_pembayaran == 'COD'){
            $order->status='dipesankan';
            $order->save();
            return redirect()->route('dipesankan');
        }else{
            return redirect()->route('pending');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('keranjang.keranjang');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keranjang $cart)
    {
        $cart->delete();
        return response()->json('sukses');
    }

    public function add_to_cart(Request $request, String $id){
        Keranjang::create([
            'product_id'=>$id,
            'user_id'=>Auth::id(),
            'qty'=>1
        ]);

        return back()->with('success','Product telah ditambahkan ke keranjang');
    }

    public function tambah_qty_keranjang(String $id){
        $keranjang=Keranjang::findOrFail($id);
        $keranjang->qty+=1;
        $keranjang->save();
        return response()->json('sukses');
    }
    
    public function kurang_qty_keranjang(String $id){
        $keranjang=Keranjang::findOrFail($id);
        if($keranjang->qty ==1){
        $keranjang->qty=1;
        }else{
            $keranjang->qty-=1;
            $keranjang->save();
        }
        return response()->json('sukses');
    }

    public function load_keranjang(){
        $cart=Keranjang::where('user_id',Auth::id())->where('status','pending')->with('product','product.jenis','user')->get();
        return view('keranjang.load-keranjang',compact('cart'));
    }

}
