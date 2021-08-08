<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $table = 'playlist';
    protected $fillable = [
        'judul_playlist', 'slug', 'deskripsi', 'user_id', 'gambar_playlist', 'is_active'
    ];
    protected $hidden = [];

    // berelasi dengan tabel users_id
    // user_id itu adalah foregn key yg mau di ambil, id adalah primary key dari tabel user
    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function materi(){
        return $this->hasMany('App\Models\Materi', 'playlist_id', 'id');
    }

    public function getRouteKeyName(){
        return 'slug';
    }

}
