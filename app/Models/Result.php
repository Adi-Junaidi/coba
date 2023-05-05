<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $guarded = ['id'];

    public function pikr()
    {
        return $this->belongsTo(Pikr::class);
    }
}
