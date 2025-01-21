<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Film extends Model
{
    protected $fillable = ['judul', 'gambar', 'trailer', 'genre_film', 'negara_film', 'tahun_film'];

    public function genre(){
        return $this->hasMany(Genre::class, 'genre_film', 'id');
    }
    public function komen(){
        return $this->hasMany(Komentar::class, 'komentar', 'id');
    }

    public function negara(){
        return $this->belongsTo(Negara::class, 'negara_film', 'id');
    }

    public function tahun(){
        return $this->belongsTo(Tahun::class, 'tahun_film', 'id');
    }


}
