<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis=Jenis::all();
        return view('jenis.index',['title'=>'List Jenis'],compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis.create',['title'=>'Create Jenis']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        Jenis::create($request->all());
        return redirect()->route('jenis.index')->with('success','Jenis hasbeen added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jenis=Jenis::findOrFail($id);
        return view('jenis.show',compact('jenis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenis=Jenis::findOrFail($id);
        return view('jenis.edit',['title'=>'Edit Jenis'],compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $jenis=Jenis::findOrFail($id);
        $jenis->update($request->all());

        return redirect()->route('jenis.index')->with('success', 'Jenis has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $jenis=Jenis::findOrFail($id);
        $jenis->delete();
        return redirect()->route('jenis.index')->with('success','Jenis hasbeen deleted');
    }
}
