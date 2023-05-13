<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    protected $with = ["kecamatan"];

    public function pembina()
    {
        return $this->hasMany(Pembina::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function pikrs()
    {
        return $this->hasMany(Pikr::class);
    }

  // ==== Accessor ====
  public function getParsedNamaAttribute()
  {
    return str_replace('DESA ', '', strtoupper($this->nama));
  }
}
