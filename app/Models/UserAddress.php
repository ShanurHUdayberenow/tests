<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;
    protected $fillable = ['userId','address'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
