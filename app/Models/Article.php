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

  public function getTruncatedBody($length = 150, $append = "&hellip;")
  {
    $string = trim($this->body);

    if (strlen($string) > $length) {
      $string = wordwrap($string, $length);
      $string = explode('\n', $string, 2);
      $string = $string[0] . $append;
    }

    return $string;
  }
}
