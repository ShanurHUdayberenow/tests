<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferLine extends Model
{
    use HasFactory;
    protected $fillable = ['quantity','price','productId','offerId'];

    public function offer() {
        return $this->belongsTo(Offer::class, 'offerId');
    }
    public function product() {
        return $this->belongsTo(Product::class, 'productId', 'id');
    }

}
