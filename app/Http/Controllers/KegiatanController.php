<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KegiatanController extends Controller
{
    public function index() {
        $kegiatans = Kegiatan::with('image')->get();
        return view('admin.kegiatan.index', compact('kegiatans'));
    }

    public function create() {
        return view('admin.kegiatan.create');
    }

    public function show(Kegiatan $kegiatan) {
        return view('admin.kegiatan.show', compact('kegiatan'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'judul_kegiatan' => 'required',
            'tempat_kegiatan' => 'required',
            'deskripsi_kegiatan' => 'required',
            'gambar_kegiatan' => 'required|file|image|max:5120',
        ]);

        $image = $request->file('gambar_kegiatan')->store('image/kegiatan');
        $validated['slug_kegiatan'] = Str::slug($request->judul_kegiatan);

        $kegiatan = Kegiatan::create($validated);
        Image::create([
            'kegiatan_id' => $kegiatan->id,
            'gambar' => $image,
        ]);

        $notification = [
            'message' => 'Kegiatan Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.kegiatan.index')->with($notification);
    }

    public function edit(Kegiatan $kegiatan) {
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan) {
        $validated = $request->validate([
            'judul_kegiatan' => 'required',
            'tempat_kegiatan' => 'required',
            'deskripsi_kegiatan' => 'required',
        ]);

        $validated['slug_kegiatan'] = Str::slug($request->judul_kegiatan);
        $kegiatan->update($validated);

        $notification = [
            'message' => 'Kegiatan Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.kegiatan.index')->with($notification);
    }

    public function destroy(Kegiatan $kegiatan) {
        $kegiatan->delete();

        $notification = [
            'message' => 'Kegiatan Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
