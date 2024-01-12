<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'name_tm',
        'name_ru',
        'name_en',
        'name_tr',
        'shortName_tm',
        'shortName_ru',
        'shortName_en',
        'shortName_tr',
    ];
}
