<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Film extends Model
{
    protected $table = 'film';
    protected $fillable = ['judul', 'image', 'sinopsis', 'trailer', 'id_genre', 'id_negara', 'tahun_rilis', 'age_category', 'durasi'];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function genres(){
        return $this->belongsToMany(Genre::class, 'film_genre', 'film_id', 'genre_id');
    }
    public function komentar(){
        return $this->hasMany(Komentar::class,  'id_film');
    }

    public function negara(){
        return $this->belongsTo(Negara::class, 'id_negara', 'id');
    }

    public function tahun(){
        return $this->belongsTo(Tahun::class, 'tahun_rilis', 'id');
    }

    public function averageRating()
{
    return $this->komentar()->avg('rating');
}

}
