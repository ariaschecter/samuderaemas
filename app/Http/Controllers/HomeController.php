<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Staff;
use App\Models\Wisata;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $kegiatans = Kegiatan::latest();
        $wisatas = Wisata::with('image')->get();
        return view('frontend.index', compact('kegiatans', 'wisatas'));
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
}
