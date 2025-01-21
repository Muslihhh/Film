<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $fillable = ['komentar','rating','id_film', 'id_user'];

    public function film(){
        return $this->belongsTo(Film::class,'id_film');
    }

    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }
}
