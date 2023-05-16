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

  public function pikrs()
  {
    return $this->hasManyThrough(Pikr::class, Desa::class);
  }

  public function pikr()
  {
    return $this->hasMany(Pikr::class);
  }

  public function pembinas()
  {
    return $this->hasManyThrough(Pembina::class, Desa::class);
  }

  public function kabkota()
  {
    return $this->belongsTo(Kabkota::class);
  }

  // ==== Accessor ====
  public function getParsedNamaAttribute()
  {
    return str_replace('KECAMATAN ', '', strtoupper($this->nama));
  }

  // ==== Custom Method ====
  public function getNomorUrutPembina()
  {
    $lastNomorUrut = $this->pembinas->reduce(fn ($max, $pembina) => (int)$pembina->no_urut > (int)$max ? $pembina->no_urut : $max, "00");
    $nomorUrut = (int)$lastNomorUrut + 1;
    if ($nomorUrut < 10) {
      $nomorUrut = "0$nomorUrut";
    }
    return $nomorUrut;
  }
  public function getNomorUrutPikr()
  {
    $lastNomorUrut = $this->pikrs->reduce(fn ($max, $pikr) => (int)$pikr->no_urut > (int)$max ? $pikr->no_urut : $max, "00");
    $nomorUrut = (int)$lastNomorUrut + 1;
    if ($nomorUrut < 100) {
      $nomorUrut = "0$nomorUrut";

      if ($nomorUrut < 10) {
        $nomorUrut = "0$nomorUrut";
      }
    }

    return $nomorUrut;
  }
}
