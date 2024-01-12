<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacetProduct extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'productId',
        'attributeId',
        'pacetId',
        'quantity',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }

    public function pacet()
    {
        return $this->belongsTo(Pacet::class, 'pacetId');
    }
}
