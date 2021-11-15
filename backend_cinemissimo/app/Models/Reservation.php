<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function projection(){
        return $this->belongsTo(Projection::class);
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
