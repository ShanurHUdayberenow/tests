<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;
    protected $table = 'attribute_values';
    protected $fillable = [
        'value_tm',
        'value_ru',
        'value_en',
        'value_tr',
        'attributeId'
    ];

    public function specifications() {
        return $this->hasMany(Specification::class, 'attributeValueId');
    }

    public function attributeValue()
    {
        return $this->belongsTo(Attribute::class, 'attributeId');
    }
}
