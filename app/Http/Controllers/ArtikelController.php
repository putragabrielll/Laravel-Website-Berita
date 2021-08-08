<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::latest()->get();
        $user = User::where('id', Auth::user()->id)->first();
        return view('utama.artikel.index', compact('artikel','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $user = User::where('id', Auth::user()->id)->first();
        return view ('utama.artikel.create', compact('kategori','user'));
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
            'judul' => 'required|min:4',
        ]);
            
        // Untuk Simpan Data Yang Telah Di Input
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['user_id'] = Auth::id();
        $data['views'] = 0;
        $data['gambar_artikel'] = $request->file('gambar_artikel')->store('artikel');

        Artikel::create($data);

        Alert::success('Berhasil', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->route('artikel.index');
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
        $artikel = Artikel::find($id);
        $kategori = Kategori::all();
        $user = User::where('id', Auth::user()->id)->first();
        return view('utama.artikel.edit', compact('artikel', 'kategori', 'user'));
        // sama aja yg di atas ama yg d bawah
        // return view('utama.artikel.edit', ['artikel' => $artikel, 'kategori' => $kategori, 'user' => $user]);
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
        if (empty($request->file('gambar_artikel'))){
            $artikel = Artikel::find($id);
            $artikel->update([
                'judul' => $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                'kategori_id' => $request->kategori_id,
                'is_active' => $request->is_active,
            ]);
            
            Alert::info('Updated', 'Data Berhasil Di Updated !!!');
            return redirect()->route('artikel.index');
        } else{
            $artikel = Artikel::find($id);
            // Storage::delete untuk mengahapus gambar yg telah di delete, karna biasanya tersimpan
            Storage::delete($artikel->gambar_artikel);
            $artikel->update([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'body' => $request->body,
                'kategori_id' => $request->kategori_id,
                'is_active' => $request->is_active,
                'gambar_artikel' => $request->file('gambar_artikel')->store('artikel'),
            ]);

            Alert::info('Updated', 'Data Berhasil Di Updated !!!');
            return redirect()->route('artikel.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::find($id);

        // Storage::delete untuk mengahapus gambar yg telah di delete, karna biasanya tersimpan
        Storage::delete($artikel->gambar_artikel);
        $artikel->delete();

        Alert::error('Terhapus', 'Data Berhasil Di Hapus !!!');
        return redirect()->route('artikel.index');
    }
}
