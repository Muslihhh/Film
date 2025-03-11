<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genre';
    protected $fillable = ['nama_genre'];

    public function films(){
        return $this->belongsToMany(Film::class, 'film_genre', 'film_id','genre_id');
    }
}
