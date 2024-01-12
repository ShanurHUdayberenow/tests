<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'description',
        'slug',
        'images',
        'phoneNumber',
        'address',
        'email',
        'status',
        'searchText',
        'shopOwnerName',
        'shopOwnerPhone'
    ];

    public function categories () {
        return $this->hasMany(ShopCategory::class, 'shopId');
    }

    public function user() {
        return $this->belongsTo(User::class, 'userId');
    }
}
