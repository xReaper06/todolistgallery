<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $gallerys = $user->gallerys;
        return view('gallery.index', compact('gallerys'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Example validation rules
        ]);
        $user = Auth::user();

        $imagePath = $request->file('image')->store('images', 'public'); // Store the image in the "public/images" directory

        $user->gallerys()->create([
            'imagepath' => $imagePath,
        ]);

        return back()->with('success', 'Image uploaded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $gallery = $user->gallerys()->find($id);
        if(!$gallery){
            return redirect()->route('gallery.index')->with('error', 'Gallery not found');
        }
        Storage::disk('public')->delete('images/' . $gallery->imagepath);
        $gallery->delete();
        return redirect()->route('gallery.index')->with('success', 'Gallery deleted successfully');

    }
}
