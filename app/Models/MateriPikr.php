<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriPikr extends Model
{
    protected $guarded = ['id'];

    public function pikr()
    {
        return $this->belongsTo(Pikr::class);
    }
}
