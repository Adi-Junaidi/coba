<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{

    protected $guarded = ['id'];

    public function pikr()
    {
        return $this->belongsTo(Pikr::class);
    }

    public function pelayananInformasi()
    {
        return $this->hasMany(PelayananInformasi::class);
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
