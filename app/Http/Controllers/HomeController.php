<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
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
        dd($kegiatan);
        return view('frontend.activity', compact('kegiatan'));
    }
}
