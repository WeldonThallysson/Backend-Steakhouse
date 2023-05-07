<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mesa_id',
        'data',
        'hora'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function mesas()
    {
        return $this->belongsTo(Mesas::class,'mesa_id');
    }
}
