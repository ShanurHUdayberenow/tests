<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacet extends Model
{
    use HasFactory;
    protected $fillable = ['name_tm','name_ru','name_en','description_tm','description_ru','description_en','image','file_name','slug','status'];

    public function pacetProducts () {
        return $this->hasMany(PacetProduct::class, 'pacetId');
    }
    
}
