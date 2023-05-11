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

  // FIXME: fungsi ini malah mengembalikan data dari tabel pikr sebagai model Desa instead of Pikr
  public function pikrs()
  {
    return $this->desas()->join('pikrs', 'desas.id', '=', 'pikrs.desa_id')->select('*');
  }

  public function provinsi()
  {
    return $this->belongsTo(Provinsi::class);
  }
}
