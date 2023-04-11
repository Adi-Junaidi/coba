<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pikr extends Model
{
  use HasFactory;

  protected $guarded = ["id"];

  // protected $with = ["materi"];

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

  // ini function utk many to many pada tabel materi
  public function materi()
  {
    return $this->belongsToMany(Materi::class);
  }

  public function sarana()
  {
    return $this->belongsToMany(Sarana::class);
  }

  public function mitra()
  {
    return $this->belongsToMany(Mitra::class);
  }

  public static function boot()
  {
    parent::boot();

    // after create() method call this
    static::created(function ($pikr) {
      Stepper::create([
        'pikr_id' => $pikr->user->id,
        'step_1' => true,
        'current_step' => 'step_1',
      ]);
    });
  }
}
