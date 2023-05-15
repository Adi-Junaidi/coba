<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $guarded = ['id'];

    public function point()
    {
        return $this->hasMany(Point::class);
    }
}