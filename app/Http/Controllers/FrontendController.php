<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Artikel;
use App\Models\Playlist;
use App\Models\Materi;
use App\Models\Slide;
use App\Models\Iklan;

class FrontendController extends Controller
{
    public function index()
    {
        // Bagian Home
        $kategori = Kategori::withCount('Artikel')->get()->random(5);
        $playlist = Playlist::latest()->get()->where('is_active', 1)->random(2);
        $slide = Slide::where('is_active', 1)->get();
        $artikel = Artikel::latest()->get()->where('is_active', 1)->random(6);
        $materi = Materi::latest()->paginate(1);
        $iklan_a = Iklan::where('is_active', 1)->where('id', 3)->get();
        return view('front.home', compact(
            'kategori',
            'playlist',
            'slide',
            'artikel',
            'materi',
            'iklan_a'
        ));
        // sama aja ama yg di atas
        // return view('front.home', compact('kategori'));
    }

    // Bagian Detail Artikel
    public function detail($slug)
    {
        // $kategori = Kategori::latest()->get()->random(5);
        $kategori = Kategori::withCount('Artikel')->get();
        $playlist = Playlist::latest()->get()->where('is_active', 1)->random(2);
        $artikel = Artikel::where('slug', $slug)->first();
        $iklan_a = Iklan::where('is_active', 1)->where('id', 3)->get();
        $iklan_b = Iklan::where('is_active', 1)->where('id', 4)->get();
        $recent_post = Artikel::latest()->get()->where('is_active', 1)->random(5);
        return view('front.detail_artikel.index', compact(
            'kategori',
            'playlist',
            'artikel',
            'recent_post',
            'iklan_a',
            'iklan_b'
        ));
    }

    // Bagian manggil Artikel Berdasarkan Kategori
    public function artikel_kategori(Kategori $kategori)
    {
        // Memanggil artikel berdasarkan Kategori
        $artikelall = $kategori->artikel()->where('is_active', 1)->simplePaginate(8);
        $putra_sihombing = $kategori;
        $kategori = Kategori::withCount('Artikel')->get();
        $playlist = Playlist::latest()->get()->where('is_active', 1)->random(2);
        $recent_post = Artikel::latest()->get()->where('is_active', 1)->random(5);
        $iklan_a = Iklan::where('is_active', 1)->where('id', 3)->get();
        $iklan_b = Iklan::where('is_active', 1)->where('id', 4)->get();

        // dd ($artikelall);
        return view('front.artikel_kategori.index', compact(
            'artikelall',
            'putra_sihombing',
            'kategori',
            'playlist',
            'recent_post',
            'iklan_a',
            'iklan_b'
        ));
    }

    // Bagian Manggil Materi Vidio Berdasarkan Playlist
    public function materi_playlist(Playlist $playlist)
    {
        $playlist_materi = $playlist->materi()->where('is_active', 1)->simplePaginate(12);
        $putra_sihombing = $playlist;
        $kategori = Kategori::withCount('Artikel')->get();
        $playlist = Playlist::latest()->get()->where('is_active', 1)->random(2);
        $iklan_a = Iklan::where('is_active', 1)->where('id', 3)->get();

        return view('front.playlist.index', compact(
            'playlist_materi',
            'putra_sihombing',
            'kategori',
            'playlist',
            'iklan_a'
        ));
    }

    // Bagian Detail Materi Vidio
    public function vidio($slug)
    {
        $kategori = Kategori::withCount('Artikel')->get();
        $playlist = Playlist::latest()->get()->where('is_active', 1)->random(2);
        $materi = Materi::where('slug', $slug)->first();
        $iklan_a = Iklan::where('is_active', 1)->where('id', 3)->get();
        $iklan_b = Iklan::where('is_active', 1)->where('id', 4)->get();
        $recent_post = Artikel::latest()->get()->where('is_active', 1)->random(5);
        return view('front.materi_vidio.index', compact(
            'kategori',
            'playlist',
            'materi',
            'iklan_a',
            'iklan_b',
            'recent_post'
        ));
    }
    
}
