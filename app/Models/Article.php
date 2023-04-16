<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

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

  public function getExcerpt($length = 150, $append = '…')
  {
    $string = trim(strip_tags($this->body));

    if (strlen($string) > $length) {
      $string = wordwrap($string, $length); // wrap the $string to $length character
      $string = explode("\n", $string, 2)[0]; // get the first line
      $string = preg_replace('/\W$/', '', $string); // remove any non word character in the end of $string
      $string .= $append; // append ellipsis or $append to the end of $string;
    }

    return $string;
  }
}
