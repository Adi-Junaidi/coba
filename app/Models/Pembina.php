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
}
