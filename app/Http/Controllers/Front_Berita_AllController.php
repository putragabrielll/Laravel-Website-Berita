<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Artikel;
use App\Models\Playlist;
use App\Models\Materi;
use App\Models\Slide;
use App\Models\Iklan;

class Front_Berita_AllController extends Controller
{
    public function index()
    {
        $artikel = Artikel::latest()->where('is_active', 1)->simplePaginate(12);
        $kategori = Kategori::latest()->get()->random(5);
        $playlist = Playlist::latest()->get()->where('is_active', 1)->random(5);
        $iklan_a = Iklan::where('is_active', 1)->where('id', 3)->get();
        return view('front.artikel_all.index', compact(
            'artikel',
            'kategori',
            'playlist',
            'iklan_a'
        ));
    }
}
