<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sk extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    // untuk $with sy comment karena biasanya error, jadi sy juga masih kurang paham dengan penggunaan $with itu sendiri
    // protected $with = ["pikr"];

    public function pikr()
    {
        return $this->hasOne(Pikr::class);
    }
}
