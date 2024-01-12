<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subsubcategory;

class Attribute extends Model
{
    use HasFactory;
    protected $fillable =
     [
         'name_tm',
         'name_ru',
         'name_en',
         'name_tr',
         'categoryId',
         'subcategoryId',
         'subsubcategoryId',
         'brandId'
     ];

     public function category()
     {
         return $this->belongsTo(Category::class, 'categoryId');
     }

     public function subcategory()
     {
         return $this->belongsTo(Subcategory::class, 'subcategoryId');
     }

     public function subsubcategory()
     {
         return $this->belongsTo(Subsubcategory::class, 'subsubcategoryId');
     }
     public function values () {
         return $this->hasMany(AttributeValue::class, 'attributeId');
     }
     public function specifications () {
         return $this->hasMany(Specification::class, 'attributeId');
     }
     public function attributeValue () {
        return $this->hasMany(AttributeValue::class, 'attributeId');
    }
}
