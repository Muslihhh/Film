<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Film extends Model
{
    protected $table = 'film';
    protected $fillable = ['judul','slug', 'image', 'sinopsis', 'trailer', 'id_genre', 'id_negara', 'tahun_rilis','cast', 'age_category', 'durasi'];
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
    return $this->hasMany(Komentar::class, 'id_film')
        ->whereNotNull('rating')
        ->avg('rating');
}

public function watchlistedByUsers()
{
    return $this->hasMany(Watchlist::class);
}

protected static function boot()
    {
        parent::boot();

        static::creating(function ($film) {
            $film->slug = Str::slug($film->judul);
        });

        static::updating(function ($film) {
            if ($film->isDirty('judul')) { // Hanya ubah slug jika judul berubah
                $film->slug = Str::slug($film->judul);
            }
        });
    }

    public function getTrailerIdAttribute()
{
    if (strpos($this->trailer, 'watch?v=') !== false) {
        return substr(strrchr($this->trailer, "="), 1);
    } elseif (strpos($this->trailer, 'youtu.be/') !== false) {
        return substr(strrchr($this->trailer, "/"), 1);
    }
    return null;
}

    
}
