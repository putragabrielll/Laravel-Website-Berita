<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = Slide::all();
        $user = User::where('id', Auth::user()->id)->first();
        return view('utama.slide.index', compact('slide','user'));
        // sama aja ama yg di atas
        // return view('utama.slide.index', ['slide' => $slide]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view ('utama.slide.create', compact('user'));
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
            'judul_slide' => 'required|min:4',
            'gambar_slide' => 'mimes:png,jpg,jpeg,gif,bmp'
        ]);
            
        // Untuk Simpan Data Yang Telah Di Input
        if (empty($request->file('gambar_slide'))) {
           $data = $request->all();
        //    Slide::create($data);

            Alert::success('Berhasil', 'Data Berhasil Di Tambahkan !!!');
            return redirect()->route('slide.index');
        } else {
        $data = $request->all();
        $data['gambar_slide'] = $request->file('gambar_slide')->store('slide');
        Slide::create($data);

        Alert::success('Berhasil', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->route('slide.index');
        }
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
        $slide = Slide::find($id);
        $user = User::where('id', Auth::user()->id)->first();
        return view('utama.slide.edit', compact('slide','user'));
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
        if (empty($request->file('gambar_slide'))){
            $slide = Slide::find($id);
            $slide->update([
                'judul_slide' => $request->judul_slide,
                'link' => $request->link,
                'is_active' => $request->is_active,
            ]);
            
            Alert::info('Updated', 'Data Berhasil Di Updated !!!');
            return redirect()->route('slide.index');
        } else{
            $slide = Slide::find($id);
            // Storage::delete untuk mengahapus gambar yg telah di delete, karna biasanya tersimpan
            Storage::delete($slide->gambar_slide);
            $slide->update([
                'judul_slide' => $request->judul_slide,
                'link' => $request->link,
                'is_active' => $request->is_active,
                'gambar_slide' => $request->file('gambar_slide')->store('slide'),
            ]);

            Alert::info('Updated', 'Data Berhasil Di Updated !!!');
            return redirect()->route('slide.index');
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
        $slide = Slide::find($id);

        // Storage::delete untuk mengahapus gambar yg telah di delete, karna biasanya tersimpan
        Storage::delete($slide->gambar_slide);
        $slide->delete();

        Alert::error('Terhapus', 'Data Berhasil Di Hapus !!!');
        return redirect()->route('slide.index');
    }
}
