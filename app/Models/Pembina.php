<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Pembina extends Model
{
  use HasFactory;

  protected $guarded = ["id"];
  protected $with = ["jabatan", "desa", "pikr"];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function desa()
  {
    return $this->belongsTo(Desa::class);
  }

  public function jabatan()
  {
    return $this->belongsTo(Jabatan::class);
  }

  public function pikr()
  {
    return $this->hasMany(Pikr::class);
  }

  public function pelayananInformasi()
  {
    return $this->hasMany(PelayananInformasi::class);
  }

  // ==== Accessor ====
  public function getKecamatanAttribute()
  {
    return $this->desa->kecamatan;
  }
  public function getKabkotaAttribute()
  {
    return $this->kecamatan->kabkota;
  }
  public function getProvinsiAttribute()
  {
    return $this->kabkota->provinsi;
  }

  public static function boot()
  {
    parent::boot();

    // secara otomatis men-generate nomor urut dan nomor registrasi untuk setiap pembina yang baru dibuat
    static::created(function ($pembina) {
      $desa = $pembina->desa;
      $kecamatan = $desa->kecamatan;
      $kabkota = $kecamatan->kabkota;
      $provinsi = $kabkota->provinsi;

      $kodeJabatan = $pembina->jabatan->kode;
      $kodeProvinsi = $provinsi->kode;
      $kodeKabKot = $kabkota->kode;
      $kodeKecamatan = $kecamatan->kode;
      $nomorUrut = $kecamatan->getNomorUrutPembina();

      $noRegister = $kodeProvinsi . $kodeKabKot . $kodeKecamatan . $kodeJabatan . $nomorUrut;

      $pembina->update([
        'no_urut' => $nomorUrut,
        'no_register' => $noRegister,
      ]);
    });
  }
}
