<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class KonselingKelompok extends Model
{
  use HasFactory;

  protected $guarded = ["id"];

  public function materi()
  {
    return $this->belongsTo(Materi::class);
  }

  public function pengurus()
  {
    return $this->belongsTo(Pengurus::class);
  }

  public function laporan()
  {
    return $this->belongsTo(Laporan::class);
  }

  public static function boot()
  {
    parent::boot();

    static::deleting(function ($konseling_kelompok) {
      if (Storage::exists($konseling_kelompok->dokumentasi))
        Storage::delete($konseling_kelompok->dokumentasi);
    });
  }
}
