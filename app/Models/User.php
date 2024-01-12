<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'avatar',
        'phoneNumber',
        'filename',
        'address',
        'address2',
        'role',
        'price_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function carts () {
        return $this->hasMany(Cart::class, 'userId');
    }
    public function user_addresses () {
        return $this->hasMany(UserAddress::class, 'userId');
    }
    public function user_discounts () {
        return $this->hasMany(UserDiscount::class, 'userId');
    }
    public function order_lines () {
        return $this->hasMany(OrderLines::class, 'userId');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

}
