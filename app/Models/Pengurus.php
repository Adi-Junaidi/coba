<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pikr()
    {
        return $this->belongsTo(Pikr::class);
    }

    public function konseling()
    {
        return $this->hasMany(Konseling::class);
    }

    public function konselingKelompok()
    {
        return $this->hasMany(KonselingKelompok::class);
    }
}
