<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = ['name_tm','name_ru','name_en','image','file_name','slug','status','description_tm','description_en','description_ru'];
    public function products()
    {
        return $this->hasMany(Product::class, 'categoryId');
    }
}
