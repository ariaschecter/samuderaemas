<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class FinanceController extends Controller
{
    public function index() {
        $finances = Finance::latest()->get();
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


    public function graph(Request $request) {
        $string = Carbon::parse($request->date_start)->format('d M Y') . ' - ' . Carbon::parse($request->date_end)->format('d M Y');
        $chart_options = [
            'chart_title' => 'Finance By Month',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Finance',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'filter_field' => 'created_at',
            'date_format' => 'd M Y',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'nominal_finance',
            'chart_type' => 'line',
            'range_date_start' => Carbon::parse($request->date_start),
            'range_date_end' => Carbon::parse($request->date_end),
            'chart_color' => '255,215,0',
            // 'continuous_time' => true,
        ];
        $chart1 = new LaravelChart($chart_options);
        return view('admin.finance.graph', compact('chart1', 'string'));
    }
}
