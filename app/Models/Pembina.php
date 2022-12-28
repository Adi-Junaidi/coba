<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembina extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    protected $with = ["jabatan", "desa"];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
