<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopProduct extends Model
{
    use HasFactory;

    protected $fillable =
    [
       'discount',
       'quantity',
       'price',
        'priceRateCurrency',
        'shopId',
        'unitId'
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'productId');
    }
}
