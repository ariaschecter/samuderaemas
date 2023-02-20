<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Usaha;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Images;
class UsahaController extends Controller
{
    public function index() {
        $usahas = Usaha::with('image')->get();
        return view('admin.usaha.index', compact('usahas'));
    }

    public function create() {
        return view('admin.usaha.create');
    }

    public function show(Usaha $usaha) {
        return view('admin.usaha.show', compact('usaha'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama_usaha' => 'required',
            'lokasi_usaha' => 'required',
            'link_lokasi_usaha' => 'required',
            'deskripsi_usaha' => 'required',
            'harga_usaha' => 'required',
            'satuan_usaha' => 'required',
            'cp_usaha' => 'required',
            'gambar_usaha' => 'required|file|image|max:5120',
        ]);

        $image = $request->file('gambar_usaha');
        $name_gen = time() . hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_url = 'image/' . $name_gen;
        Images::make($image)->save($save_url);

        $validated['usaha_slug'] = Str::slug($request->nama_usaha);
        $usaha = Usaha::create($validated);
        Image::create([
            'usaha_id' => $usaha->id,
            'gambar' => $save_url,
        ]);

        $notification = [
            'message' => 'Usaha Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.usaha.index')->with($notification);
    }

    public function edit(Usaha $usaha) {
        return view('admin.usaha.edit', compact('usaha'));
    }

    public function update(Request $request, Usaha $usaha) {
        $validated = $request->validate([
            'nama_usaha' => 'required',
            'lokasi_usaha' => 'required',
            'link_lokasi_usaha' => 'required',
            'deskripsi_usaha' => 'required',
            'harga_usaha' => 'required',
            'satuan_usaha' => 'required',
            'cp_usaha' => 'required',
        ]);
        $validated['usaha_slug'] = Str::slug($request->nama_usaha);
        $usaha->update($validated);

        $notification = [
            'message' => 'Usaha Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.usaha.index')->with($notification);
    }

    public function destroy(Usaha $usaha) {
        $usaha->delete();

        $notification = [
            'message' => 'Usaha Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
