<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Subcategory;

class Subsubcategory extends Model
{
    use HasFactory;
     protected $fillable =
     [
         'name_tm',
         'name_ru',
         'name_en',
         'name_tr',
         'slug',
         'image',
         'file_name',
         'categoryId',
         'subcategoryId'
     ];

     public function category()
     {
         return $this->belongsTo(Category::class, 'categoryId');
     }

     public function subcategory()
     {
         return $this->belongsTo(Subcategory::class, 'subcategoryId');
     }

     public function attributes () {
         return $this->hasMany(Attribute::class, 'subsubcategoryId');
     }
}
