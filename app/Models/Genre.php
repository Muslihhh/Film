<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['nama_genre'];

    public function films(){
        return $this->hasMany(film::class, 'id_film');
    }
}
