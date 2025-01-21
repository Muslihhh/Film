<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    protected $fillable = ['tahun_rilis'];

    public function films(){
        return $this->hasMany(film::class, 'id_film');
    }
}
