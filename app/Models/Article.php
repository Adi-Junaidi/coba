<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
  protected $guarded = ['id'];

  use Sluggable;

  public function getRouteKeyName(): string
  {
    return 'slug';
  }

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'title'
      ]
    ];
  }

  public function pikr(): BelongsTo
  {
    return $this->belongsTo(Pikr::class);
  }
}
