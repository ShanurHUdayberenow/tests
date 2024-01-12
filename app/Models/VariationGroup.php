<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationGroup extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'variationName_tm',
        'variationName_ru',
    ];

    public function products() {
        return $this->hasMany(Product::class, 'variationGroupId');
    }
}
