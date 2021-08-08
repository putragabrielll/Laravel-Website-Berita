<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi';
    protected $fillable = [
        'judul_materi', 'slug', 'link', 'deskripsi', 'playlist_id', 'is_active', 'gambar_materi'
    ];
    protected $hidden = [];

    // berelasi dengan tabel playlist
    // playlist_id itu adalah foregn key yg mau di ambil, id adalah primary key dari tabel playlist
    public function playlist(){
        return $this->belongsTo(Playlist::class, 'playlist_id', 'id');
    }

}
