<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Negara extends Model
{
    protected $table = 'negara';
    protected $fillable = ['nama_negara'];

    public function films(){
        return $this->hasMany(Film::class, 'id_film');
    }
}
