<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iklan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class IklanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iklan = Iklan::all();
        $user = User::where('id', Auth::user()->id)->first();
        return view('utama.iklan.index', compact('iklan','user'));
        // sama aja ama yg di atas
        // return view('utama.iklan.index', ['iklan' => $iklan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view ('utama.iklan.create', compact('user'));
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
            'judul_iklan' => 'required|min:4',
            'gambar_iklan' => 'mimes:png,jpg,jpeg,gif,bmp'
        ]);
            
        // Untuk Simpan Data Yang Telah Di Input
        if (empty($request->file('gambar_iklan'))) {
           $data = $request->all();
        //    Slide::create($data);

        Alert::success('Berhasil', 'Data Berhasil Di Tambahkan !!!');
            return redirect()->route('iklan.index');
        } else {
        $data = $request->all();
        $data['gambar_iklan'] = $request->file('gambar_iklan')->store('iklan');
        Iklan::create($data);

        Alert::success('Berhasil', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->route('iklan.index');
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
        $iklan = Iklan::find($id);
        $user = User::where('id', Auth::user()->id)->first();
        return view('utama.iklan.edit', compact('iklan','user'));
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
        if (empty($request->file('gambar_iklan'))){
            $iklan = Iklan::find($id);
            $iklan->update([
                'judul_iklan' => $request->judul_iklan,
                'link' => $request->link,
                'is_active' => $request->is_active,
            ]);
            
            Alert::info('Updated', 'Data Berhasil Di Updated !!!');
            return redirect()->route('iklan.index');
        } else{
            $iklan = Iklan::find($id);
            // Storage::delete untuk mengahapus gambar yg telah di delete, karna biasanya tersimpan
            Storage::delete($iklan->gambar_iklan);
            $iklan->update([
                'judul_iklan' => $request->judul_iklan,
                'link' => $request->link,
                'is_active' => $request->is_active,
                'gambar_iklan' => $request->file('gambar_iklan')->store('iklan'),
            ]);

            Alert::info('Updated', 'Data Berhasil Di Updated !!!');
            return redirect()->route('iklan.index');
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
        //
    }
}
