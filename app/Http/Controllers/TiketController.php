<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Wisata;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function create(Wisata $wisata) {
        return view('admin.tiket.create', compact('wisata'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'wisata_id' => 'required',
            'hari_tiket' => 'required',
            'orang_tiket' => 'required',
            'motor_tiket' => 'required',
            'mobil_tiket' => 'required',
        ]);

        Tiket::create($validated);

        $notification = [
            'message' => 'Tiket Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.wisata.show', $request->wisata_id)->with($notification);
    }

    public function edit(Tiket $tiket) {
        return view('admin.tiket.edit', compact('tiket'));
    }

    public function update(Request $request, Tiket $tiket) {
        $validated = $request->validate([
            'hari_tiket' => 'required',
            'orang_tiket' => 'required',
            'motor_tiket' => 'required',
            'mobil_tiket' => 'required',
        ]);

        $tiket->update($validated);

        $notification = [
            'message' => 'Tiket Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.wisata.show', $tiket->wisata_id)->with($notification);
    }

    public function destroy(Tiket $tiket) {
        $tiket->delete();

        $notification = [
            'message' => 'Tiket Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}

