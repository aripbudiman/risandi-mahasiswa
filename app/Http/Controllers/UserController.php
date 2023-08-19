<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=User::all();
        return view('account.index',['title'=>'List Account'],compact('user'));
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
    public function edit(User $user)
    {
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->name=$request->fullname;
        $user->age=$request->age;
        $user->address=$request->address;
        $user->gender=$request->gender;
        $user->phone_number=$request->phone_number;
        $user->save();
        return back()->with('success','Profile hasbeen updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function update_photo_profile(Request $request){
        $request->validate([
            'profile_photo' => 'required|image',
            'crop_ratio' => 'required|in:1:1,16:9',
        ]);

        $user =User::find(Auth::id()) ;
        $image = $request->file('profile_photo');

        // Menggunakan intervention/image untuk crop dan resize gambar
        $imagePath = $image->store('public/images');
        $imageFullPath = Storage::path($imagePath);
        $cropRatio = $request->crop_ratio;

        $croppedImage = Image::make($imageFullPath)->fit(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        });

        if ($cropRatio === '16:9') {
            $croppedImage->crop(300, 169);
        }
        $croppedImage->save();
        $user->photo_profile = $imagePath;
        $user->save();
        return back();
    }
}
