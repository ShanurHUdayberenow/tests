<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable =
     [
         'name_tm',
         'name_ru',
         'name_en',
         'slug',
         'image',
         'file_name',
         'categoryId',
         'status'
     ];

     public function category()
     {
         return $this->belongsTo(Category::class, 'categoryId');
     }
     public function subsubcategories() {
         return $this->hasMany(Subsubcategory::class, 'subcategoryId');
     }
}
