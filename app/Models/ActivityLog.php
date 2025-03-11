<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_logs';
   protected $fillable = ['id_user', 'action', 'deskripsi'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
