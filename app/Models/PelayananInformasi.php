<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PelayananInformasi extends Model
{
  use HasFactory;

  protected $guarded = ["id"];

  public function materi()
  {
    return $this->belongsTo(Materi::class);
  }

  public function laporan()
  {
    return $this->belongsTo(Laporan::class);
  }

  public static function boot()
  {
    parent::boot();

    static::deleting(function ($pelayanan_informasi) {
      if (Storage::exists($pelayanan_informasi->dokumentasi))
        Storage::delete($pelayanan_informasi->dokumentasi);
    });
  }
}
