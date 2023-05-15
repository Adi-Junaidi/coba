<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pikr extends Model
{
  use HasFactory;

  protected $guarded = ["id"];

  // protected $with = ["materi"];

  public function materi()
  {
    return $this->hasOne(MateriPikr::class);
  }

  public function result()
  {
    return $this->hasOne(Result::class);
  }

  public function stepper()
  {
    return $this->hasOne(Stepper::class);
  }

  public function sarana()
  {
    return $this->hasOne(PikrSarana::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function desa()
  {
    return $this->belongsTo(Desa::class);
  }

  public function sk()
  {
    return $this->belongsTo(Sk::class);
  }

  public function pembina()
  {
    return $this->belongsTo(Pembina::class);
  }

  public function jabatan()
  {
    return $this->belongsTo(Jabatan::class);
  }

  public function laporan()
  {
    return $this->hasMany(Laporan::class);
  }

  public function pengurus()
  {
    return $this->hasMany(Pengurus::class);
  }

  public function articles()
  {
    return $this->hasMany(Article::class);
  }

  // ini function utk many to many pada tabel materi

  public function mitra()
  {
    return $this->hasMany(MitraPikr::class);
  }

  // ==== Accessor ====
  public function getVerifiedLaporansAttribute()
  {
    return $this->laporan->filter(fn ($laporan) => $laporan->status === "Verified");
  }

  // ==== Custom Method ====
  public function createdAfter($year)
  {
    return $this->created_at->lte(Carbon::createFromFormat('Y', $year));
  }

  public static function boot()
  {
    parent::boot();

    // after create() method call this
    static::created(function ($pikr) {
      Stepper::create([
        'pikr_id' => $pikr->id,
        'identitas' => true,
      ]);
    });
  }
}
