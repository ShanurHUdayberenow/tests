<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','phoneNumber','status'];

    public function offer_lines() {
        return $this->hasMany(OfferLine::class, 'offerId');
    }
}
