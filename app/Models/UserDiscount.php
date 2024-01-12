<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDiscount extends Model
{
    protected $fillable = ['userId','productId','discount'];
    use HasFactory;
    
    protected $table = 'user_discounts';

    protected $primaryKey ='id';

    protected $appends = ['user_discount'];

    public function getDiscountedPriceAttribute()
    {
        return $this->discount; // Here just the example, add your logic to calculate the price.
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }
}