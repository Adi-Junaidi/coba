<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    protected $with = ["kabkota"];

    public function desa()
    {
        return $this->hasMany(Desa::class);
    }

    public function kabkota()
    {
        return $this->belongsTo(Kabkota::class);
    }
}
