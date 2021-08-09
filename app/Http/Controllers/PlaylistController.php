<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playlist = Playlist::latest()->get();
        $user = User::where('id', Auth::user()->id)->first();
        return view('utama.playlist.index', compact('playlist','user'));
        // sama aja ama yg di atas
        // return view('utama.playlist.index', ['playlist' => $playlist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('utama.playlist.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // store ini data yang tampil di tampilan index setelah input data
    public function store(Request $request)
    {
        $this->validate($request, [
            // Ini validasi, nama kategori=name, form di kategori create
            'judul_playlist' => 'required|min:4',
        ]);
            
        // Untuk Simpan Data Yang Telah Di Input
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul_playlist);
        $data['user_id'] = Auth::id();
        $data['gambar_playlist'] = $request->file('gambar_playlist')->store('playlist');

        Playlist::create($data);

        Alert::success('Berhasil', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->route('playlist.index');
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
        $playlist = Playlist::find($id);
        $user = User::where('id', Auth::user()->id)->first();
        return view('utama.playlist.edit', compact('playlist','user'));
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
        if (empty($request->file('gambar_playlist'))){
            $playlist = Playlist::find($id);
            $playlist->update([
                'judul_playlist' => $request->judul_playlist,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->judul_playlist),
                'is_active' => $request->is_active,
            ]);
            
            Alert::info('Updated', 'Data Berhasil Di Updated !!!');
            return redirect()->route('playlist.index');
        } else{
            $playlist = Playlist::find($id);
            // Storage::delete untuk mengahapus gambar yg telah di delete, karna biasanya tersimpan
            Storage::delete($playlist->gambar_playlist);
            $playlist->update([
                'judul_playlist' => $request->judul_playlist,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->judul_playlist),
                'is_active' => $request->is_active,
                'gambar_playlist' => $request->file('gambar_playlist')->store('playlist'),
            ]);

            Alert::info('Updated', 'Data Berhasil Di Updated !!!');
            return redirect()->route('playlist.index');
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
        $playlist = Playlist::find($id);

        // Storage::delete untuk mengahapus gambar yg telah di delete, karna biasanya tersimpan
        Storage::delete($playlist->gambar_playlist);
        $playlist->delete();

        Alert::error('Terhapus', 'Data Berhasil Di Hapus !!!');
        return redirect()->route('playlist.index');
    }
}
