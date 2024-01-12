<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_tm',
        'name_ru',
        'name_en',
        'name_tr',
        'slug',
        'images',
        'file_name',
        'status',
        'number',
    ];
    protected $casts = [
        'images' => 'array'
    ];
    public function subcategories() {
        return $this->hasMany(Subcategory::class, 'categoryId');
    }
    public function subsubcategories () {
        return $this->hasMany(Subsubcategory::class, 'categoryId');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'categoryId');
    }

}
