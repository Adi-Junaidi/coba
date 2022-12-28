<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sk extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    protected $with = ["pikr"];

    public function pikr()
    {
        return $this->hasOne(Pikr::class);
    }
}
