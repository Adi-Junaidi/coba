<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    // ini many to many juga untuk terhubung dengan table pikr
    public function pikr()
    {
        return $this->belongsToMany(Pikr::class);
    }
}
