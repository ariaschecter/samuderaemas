<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Images;

class WisataController extends Controller
{
    public function index() {
        $wisatas = Wisata::with('image')->get();
        return view('admin.wisata.index', compact('wisatas'));
    }

    public function create() {
        return view('admin.wisata.create');
    }

    public function show(Wisata $wisata) {
        $wisata = Wisata::with('image', 'tiket')->findOrFail($wisata->id);
        return view('admin.wisata.show', compact('wisata'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'judul_wisata' => 'required',
            'lokasi_wisata' => 'required',
            'link_lokasi_wisata' => 'required',
            'deskripsi_wisata' => 'required',
            'gambar_wisata' => 'required|file|image|max:5120',
        ]);

        $image = $request->file('gambar_wisata');
        $name_gen = time() . hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_url = 'image/' . $name_gen;
        Images::make($image)->save($save_url);

        $validated['slug_wisata'] = Str::slug($request->judul_wisata);
        $wisata = Wisata::create($validated);

        Image::create([
            'wisata_id' => $wisata->id,
            'gambar' => $save_url,
        ]);

        $notification = [
            'message' => 'Wisata Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.wisata.index')->with($notification);
    }

    public function edit(Wisata $wisata) {
        return view('admin.wisata.edit', compact('wisata'));
    }

    public function update(Request $request, Wisata $wisata) {
        $validated = $request->validate([
            'judul_wisata' => 'required',
            'lokasi_wisata' => 'required',
            'link_lokasi_wisata' => 'required',
            'deskripsi_wisata' => 'required',
        ]);
        $validated['slug_wisata'] = Str::slug($request->judul_wisata);
        $wisata->update($validated);

        $notification = [
            'message' => 'Wisata Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.wisata.index')->with($notification);
    }

    public function destroy(Wisata $wisata) {
        $wisata->delete();

        $notification = [
            'message' => 'Wisata Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
