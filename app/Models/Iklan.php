<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    use HasFactory;

    protected $table = 'iklan';
    protected $fillable = [
        'judul_iklan', 'link', 'is_active', 'gambar_iklan'
    ];
    protected $hidden = [];

}
