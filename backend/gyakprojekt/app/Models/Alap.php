<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Alap extends Model
{
    protected $table = 'alap';  
    protected $fillable = [
        'cim',
        'desc',
    ];
}
