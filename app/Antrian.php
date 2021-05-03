<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Antrian extends Model
{

    use SoftDeletes;
    //
    protected $table = "antrean";

   // public $timestamps = true;

    protected $fillable = [
        'no_antrean',
        'keperluan',
        'status',

    ];

}
