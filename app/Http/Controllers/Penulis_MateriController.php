<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Playlist;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class Penulis_MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materi = Materi::latest()->where('user_id', Auth::user()->id)->get();
        $user = User::where('id', Auth::user()->id)->first();
        return view('penulis.materi.index', compact('materi','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $playlist = Playlist::where('is_active', 1)->get();
        $user = User::where('id', Auth::user()->id)->first();
        return view ('penulis.materi.create', compact('playlist','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // Ini validasi
            'judul_materi' => 'required|min:4',
        ]);
            
        // Untuk Simpan Data Yang Telah Di Input
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul_materi);
        $data['user_id'] = Auth::id();
        $data['gambar_materi'] = $request->file('gambar_materi')->store('materi');

        Materi::create($data);

        Alert::success('Berhasil', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->route('penulis_materi.index');
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
        $materi = Materi::find($id);
        $playlist = Playlist::where('is_active', 1)->get();
        $user = User::where('id', Auth::user()->id)->first();
        return view('penulis.materi.edit', compact('materi', 'playlist','user'));
        // sama aja yg di atas ama yg d bawah
        // return view('penulis.materi.edit', ['materi' => $materi, 'playlist' => $playlist]);
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
        $this->validate($request, [
            // Ini validasi
            'judul_materi' => 'required|min:4',
        ]);

        if (empty($request->file('gambar_materi'))){
            $materi = Materi::find($id);
            $materi->update([
                'judul_materi' => $request->judul_materi,
                'link' => $request->link,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->judul_materi),
                'playlist_id' => $request->playlist_id,
                'is_active' => $request->is_active,
            ]);
            
            Alert::info('Updated', 'Data Berhasil Di Updated !!!');
            return redirect()->route('materi.index');
        } else{
            $materi = Materi::find($id);
            // Storage::delete untuk mengahapus gambar yg telah di delete, karna biasanya tersimpan
            Storage::delete($materi->gambar_materi);
            $materi->update([
                'judul_materi' => $request->judul_materi,
                'link' => $request->link,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->judul_materi),
                'playlist_id' => $request->playlist_id,
                'is_active' => $request->is_active,
                'gambar_materi' => $request->file('gambar_materi')->store('materi'),
            ]);

            Alert::info('Updated', 'Data Berhasil Di Updated !!!');
            return redirect()->route('penulis_materi.index');
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
        $materi = Materi::find($id);

        // Storage::delete untuk mengahapus gambar yg telah di delete, karna biasanya tersimpan
        Storage::delete($materi->gambar_materi);
        $materi->delete();

        Alert::error('Terhapus', 'Data Berhasil Di Hapus !!!');
        return redirect()->route('penulis_materi.index');
    }
}
