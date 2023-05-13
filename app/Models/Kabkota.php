<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabkota extends Model
{
  use HasFactory;

  protected $guarded = ["id"];
  protected $with = ["provinsi"];

  public function kecamatan()
  {
    return $this->hasMany(Kecamatan::class);
  }

  public function desas()
  {
    return $this->hasManyThrough(Desa::class, Kecamatan::class);
  }

  public function provinsi()
  {
    return $this->belongsTo(Provinsi::class);
  }

  // ==== Accessor ====
  public function getParsedNamaAttribute()
  {
    return str_replace('KABUPATEN ', '', strtoupper($this->nama));
  }
  // accessor alternatif untuk relasi One to Many Kabupaten dan PIK-R
  public function getPikrsAttribute()
  {
    return $this->kecamatan->flatMap(fn ($kecamatan) => $kecamatan->pikrs);
  }
}
