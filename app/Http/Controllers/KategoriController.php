<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Index Utuk Nampilin Data
    public function index()
    {
        $kategori = Kategori::all();
        $user = User::where('id', Auth::user()->id)->first();
        return view('utama.kategori.index', compact('kategori','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Create Untuk Ke Halaman Nambah Data
    public function create()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('utama.kategori.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Store Untuk Simpan Data Yang Telah Di Tambahkan
    public function store(Request $request)
    {
        $this->validate($request, [
            // Ini validasi, nama kategori=name, form di kategori create
            'nama_kategori' => 'required|min:4',
        ]);
            
        // Untuk Simpan Data Yang Telah Di Input
        $kategori = kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori)
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->route('kategori.index');
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
        $kategori = Kategori::find($id);
        $user = User::where('id', Auth::user()->id)->first();
        return view('utama.kategori.edit', compact('kategori','user'));
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
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_kategori);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($data);

        Alert::info('Updated', 'Data Berhasil Di Updated !!!');
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);

        $kategori->delete();

        Alert::error('Terhapus', 'Data Berhasil Di Hapus !!!');
        return redirect()->route('kategori.index');
    }
}
