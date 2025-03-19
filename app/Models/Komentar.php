<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar';
    protected $fillable = ['isi_komentar','rating','id_film', 'id_user', 'parent_id'];

    public function film(){
        return $this->belongsTo(Film::class,'id_film');
    }

    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }

    public function replies()
    {
        return $this->hasMany(Komentar::class, 'parent_id');
    }
    public static function userHasCommented($id_film, $id_user)
    {
        return self::where('id_film', $id_film)
            ->where('id_user', $id_user)
            ->whereNull('parent_id')
            ->exists();
    }
}
