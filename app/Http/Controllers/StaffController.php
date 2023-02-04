<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function index() {
        $staffs = Staff::all();
        return view('admin.staff.index', compact('staffs'));
    }

    public function create() {
        return view('admin.staff.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama_staff' => 'required',
            'jabatan_staff' => 'required',
            'motivasi_staff' => 'required',
            'bio_staff' => 'required',
            'gambar_staff' => 'required|file|image|max:5120',
        ]);

        $validated['gambar_staff'] = $request->file('gambar_staff')->store('image/staff');

        Staff::create($validated);

        $notification = [
            'message' => 'Staff Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.staff.index')->with($notification);
    }

    public function edit(Staff $staff) {
        return view('admin.staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff) {
        $validated = $request->validate([
            'nama_staff' => 'required',
            'jabatan_staff' => 'required',
            'motivasi_staff' => 'required',
            'bio_staff' => 'required',
            'gambar_staff' => 'file|image|max:5120',
        ]);

        if ($request->gambar_staff) {
            Storage::delete($staff->gambar_staff);
            $validated['gambar_staff'] = $request->file('gambar_staff')->store('image/staff');
        }

        $staff->update($validated);

        $notification = [
            'message' => 'Staff Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.staff.index')->with($notification);
    }

    public function destroy(Staff $staff) {
        $staff->delete();

        $notification = [
            'message' => 'Staff Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
