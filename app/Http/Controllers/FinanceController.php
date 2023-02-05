<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index() {
        $finances = Finance::all();
        return view('admin.finance.index', compact('finances'));
    }

    public function create() {
        return view('admin.finance.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'type_finance' => 'required',
            'nominal_finance' => 'required',
            'deskripsi_finance' => 'required',
        ]);

        if ($request->type_finance == 'PENGELUARAN') {
            $validated['nominal_finance'] *= -1;
        }

        Finance::create($validated);

        $notification = [
            'message' => 'Finance Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.finance.index')->with($notification);
    }

    public function edit(Finance $finance) {
        return view('admin.finance.edit', compact('finance'));
    }

    public function update(Request $request, Finance $finance) {
        $validated = $request->validate([
            'type_finance' => 'required',
            'nominal_finance' => 'required',
            'deskripsi_finance' => 'required',
        ]);

        if ($request->type_finance == 'PENGELUARAN') {
            $validated['nominal_finance'] *= -1;
        }
        
        $finance->update($validated);

        $notification = [
            'message' => 'Finance Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.finance.index')->with($notification);
    }

    public function destroy(Finance $finance) {
        $finance->delete();

        $notification = [
            'message' => 'Finance Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
