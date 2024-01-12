<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    use HasFactory;

    protected $fillable = [
        'attributeId',
        'attributeValueId',
        'productId'
    ];

    public function attribute () {
        return $this->belongsTo(Attribute::class, 'attributeId');
    }
    public function attributeValue () {
        return $this->belongsTo(AttributeValue::class, 'attributeValueId');
    }
}
