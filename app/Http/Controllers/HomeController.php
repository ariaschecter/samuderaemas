<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use App\Models\Kegiatan;
use App\Models\Staff;
use App\Models\Usaha;
use App\Models\Wisata;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController extends Controller
{
    public function index() {
        $kegiatans = Kegiatan::latest();
        $wisatas = Wisata::with('image')->get();
        $usahas = Usaha::with('image')->get();
        return view('frontend.index', compact('kegiatans', 'wisatas', 'usahas'));
    }

    public function detail_kegiatan(Kegiatan $kegiatan) {
        $kegiatan = Kegiatan::with('image')->findOrFail($kegiatan->id);
        return view('frontend.activity', compact('kegiatan'));
    }

    public function detail_wisata(Wisata $wisata) {
        $wisata = Wisata::with('image', 'tiket')->findOrFail($wisata->id);
        return view('frontend.destination', compact('wisata'));
    }

    public function staff() {
        $staffs = Staff::all();
        return view('frontend.staff', compact('staffs'));
    }

    public function dashboard() {
        $chart_options = [
            // 'chart_title' => 'Finance by months',
            // 'report_type' => 'group_by_date',
            // 'model' => 'App\Models\Finance',
            // 'group_by_field' => 'created_at',
            // 'group_by_period' => 'month',
            // 'chart_type' => 'line',
            'chart_title' => 'Transactions by dates',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Finance',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'nominal_finance',
            'chart_type' => 'line',
        ];
        $chart1 = new LaravelChart($chart_options);
        // dd($chart1);

        return view('admin.index', compact('chart1'));
    }
}
