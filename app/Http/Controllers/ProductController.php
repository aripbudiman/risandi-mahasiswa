<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product=Product::with('jenis')->get();
      
        return view('product.index',compact('product'),['title'=>'List Barang']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis=Jenis::all();
        return view('product.create',compact('jenis'),['title'=>'Create Barang']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'jenis_id'=>'required|numeric',
            'harga'=>'required|numeric',
            'foto'=>'required|image|mimes:jpeg,png,jpg'
        ]);
        $product = Product::create($request->except('foto'));
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('public/images', $fileName);
            $product->foto = $filePath;
            $product->save();
        }

        return redirect()->route('product.index')->with('success','Product hasbeen successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product=Product::findOrFail($id);
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product=Product::findOrFail($id);
        $jenis=Jenis::all();
        return view('product.edit',compact('product','jenis'),['title'=>'Edit Barang']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'jenis_id' => 'required|numeric',
            'harga' => 'required|numeric',
            'foto' => 'mimes:jpeg,png,jpg'
        ]);
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->jenis_id = $request->input('jenis_id');
        $product->harga = $request->input('harga');

        if ($request->hasFile('foto')) {
            if ($product->foto && Storage::exists($product->foto)) {
                Storage::delete($product->foto);
            }
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('public/images', $fileName);
            $product->foto = $filePath;
        }else{
            $product->foto = $product->foto;
        }
        $product->save();
        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->foto && Storage::exists($product->foto)) {
            Storage::delete($product->foto);
        }
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }
}
