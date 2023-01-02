<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pikr extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    protected $with = ["materi"];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function sk()
    {
        return $this->belongsTo(Sk::class);
    }

    public function pembina()
    {
        return $this->belongsTo(Pembina::class);
    }


    // ini function utk many to many pada tabel materi
    public function materi()
    {
        return $this->belongsToMany(Materi::class);
    }
}
