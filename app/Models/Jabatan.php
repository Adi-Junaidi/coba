<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function pembina()
    {
        return $this->hasMany(Pembina::class);
    }

    public function pikr()
    {
        return $this->hasMany(Pikr::class);
    }
}
