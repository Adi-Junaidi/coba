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

  // custom method
  public function getParsedNamaAttribute()
  {
    return str_replace('KABUPATEN ', '', strtoupper($this->nama));
  }

  public static function withPikrs()
  {
    $kabkotas = Kabkota::all();
    // this is a ✨MAGIC✨ that groups PIK-R by KabKota
    // It works, don't 🚫 touch it
    $kabkotaPikrs = $kabkotas->mapWithKeys(fn ($kabkota) => [
      $kabkota->id => $kabkota->kecamatan->flatMap(fn ($kecamatan) => $kecamatan->pikrs)
    ]);

    $kabkotas->each(function ($kabkota) use ($kabkotaPikrs) {
      $kabkota->pikrs = $kabkotaPikrs[$kabkota->id];
    });

    return $kabkotas;
  }
}
