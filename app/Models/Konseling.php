<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Konseling extends Model
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

    static::deleting(function ($konseling) {
      if (Storage::exists($konseling->dokumentasi))
        Storage::delete($konseling->dokumentasi);
    });
  }
}
