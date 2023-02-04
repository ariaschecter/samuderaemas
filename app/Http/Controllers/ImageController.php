<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Kegiatan;
use App\Models\Usaha;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function create_kegiatan(Kegiatan $kegiatan) {
        return view('admin.kegiatan.gambar.create', compact('kegiatan'));
    }

    public function create_wisata(Wisata $wisata) {
        return view('admin.wisata.gambar.create', compact('wisata'));
    }

    public function create_usaha(Usaha $usaha) {
        return view('admin.usaha.gambar.create', compact('usaha'));
    }

    public function store(Request $request) {
        $request->validate([
            'gambar' => 'required|file|image|max:5120',
        ]);

        $validated = $request->except('_token');
        if ($request->kegiatan_id) {
            $image = $request->file('gambar')->store('image/kegiatan');
        } else if ($request->wisata_id){
            $image = $request->file('gambar')->store('image/wisata');
        } else if ($request->usaha_id){
            $image = $request->file('gambar')->store('image/usaha');
        }
        $validated['gambar'] = $image;

        Image::create($validated);

        $notification = [
            'message' => 'Gambar Inserted Successfully',
            'alert-type' => 'success',
        ];

        if ($request->kegiatan_id) {
            return redirect()->route('admin.kegiatan.show', $request->kegiatan_id)->with($notification);
        } else if ($request->wisata_id){
            return redirect()->route('admin.wisata.show', $request->wisata_id)->with($notification);
        } else if ($request->usaha_id){
            return redirect()->route('admin.usaha.show', $request->usaha_id)->with($notification);
        }
    }

    public function edit(Image $gambar) {
        return view('admin.image.edit', compact('gambar'));
    }

    public function update(Request $request, Image $gambar) {
        $request->validate([
            'gambar' => 'required|file|image|max:5120',
        ]);
        Storage::delete($gambar->gambar);
        if ($request->kegiatan_id) {
            $image = $request->file('gambar')->store('image/kegiatan');
        } else if($request->wisata_id) {
            $image = $request->file('gambar')->store('image/wisata');
        } else {
            $image = $request->file('gambar')->store('image/usaha');
        }
        $validated['gambar'] = $image;

        $gambar->update($validated);

        $notification = [
            'message' => 'Gambar Updated Successfully',
            'alert-type' => 'success',
        ];

        if ($gambar->kegiatan_id) {
            return redirect()->route('admin.kegiatan.show', $gambar->kegiatan_id)->with($notification);
        } else if ($gambar->wisata_id){
            return redirect()->route('admin.wisata.show', $gambar->wisata_id)->with($notification);
        } else if ($gambar->usaha_id){
            return redirect()->route('admin.usaha.show', $gambar->usaha_id)->with($notification);
        }
    }

    public function destroy(Image $gambar) {
        Storage::delete($gambar->gambar);
        $gambar->delete();

        $notification = [
            'message' => 'Gambar Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
