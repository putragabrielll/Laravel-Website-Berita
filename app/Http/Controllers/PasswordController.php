<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PasswordController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('utama.password.edit', compact('user'));
        // dd ('sampe sini');
    }

    public function update()
    {
        request()->validate([
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        // dd ('change');

        $currentpassword = auth()->user()->password;
        $old_password = request('old_password');

        if (Hash::check($old_password, $currentpassword)){
            auth()->user()->update([
                'password' => bcrypt(request('password')),
            ]);
            return back()->with('success', 'Password Berhasil di Ubah.');
        } else{
            return back()->withErrors(['old_password' => 'You Have to fall your old password']);
        }
    }
}
