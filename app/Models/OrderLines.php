<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLines extends Model
{
    use HasFactory;
    protected $fillable = ['quantity','price','productId','orderId'];

    public function order() {
        return $this->belongsTo(Order::class, 'orderId');
    }
    public function product() {
        return $this->belongsTo(Product::class, 'productId', 'id');
    }
}
