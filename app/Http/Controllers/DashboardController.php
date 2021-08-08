<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Artikel;
use App\Models\Playlist;
use App\Models\Materi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Dashboard Untuk Admin dan count itu untuk mentotalkan semua data 
        $user_total = User::count();
        $artikel_total = Artikel::where('is_active', 1)->count();
        $kategori_total = Kategori::count();
        $vidio = Materi::count();
        // Untuk menampilkan data saja di dashboard
        $materi = Materi::all();
        $playlist = Playlist::all();
        $artikel = Artikel::where('is_active', 0)->get();
        $last_artikel = Artikel::latest()->simplePaginate(10);
        $terbaru_artikel = Artikel::where('is_active', 1)->simplePaginate(10);
        $user = User::where('id', Auth::user()->id)->first();
        return view('utama.dashboard', compact(
            'user_total',
            'artikel_total',
            'kategori_total',
            'vidio',
            'materi',
            'playlist',
            'artikel',
            'last_artikel',
            'terbaru_artikel',
            'user'
        ));
        // return view('layouts.default');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
