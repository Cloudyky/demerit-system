<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offense extends Model
{
    //
    protected $fillable = [
        'id',
        'jenis_kesalahan',
        'demerit',
    ];
}
