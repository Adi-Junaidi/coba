<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Point extends Model
{

    protected $guarded = ['id'];

    public function laporan(): HasOne
    {
        return $this->hasOne(Laporan::class);
    }
}
