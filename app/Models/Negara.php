<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Negara extends Model
{
    protected $table = ['nama_negara'];

    public function films(){
        return $this->hasMany(film::class, 'id_film');
    }
}
