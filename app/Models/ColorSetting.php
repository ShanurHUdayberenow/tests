<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorSetting extends Model
{
    use HasFactory;
    protected $fillable = ['color_navbar','color_product','color_category_menu','color_category1','color_category2','color_search1','color_search2','color_cart','color_footer'];
}
