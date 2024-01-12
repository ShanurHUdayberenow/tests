<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use App\Models\VariationGroup;
use App\Models\Unit;
use App\Models\User;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
class Product extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name_ru',
        'name_tm',
        'name_en',
        'description_tm',
        'description_ru',
        'description_en',
        'images',
        'categoryId',
        'subcategoryId',
        'subsubcategoryId',
        'variationGroupId',
        'brandId',
        'pacetId',
        'unitId',
        'searchText',
        'slug',
        'price',
        'guestPrice',
        'guestDiscount',
        'discount',
        'isNew_tm',
        'isNew_ru',
        'isNew_en',
        'advice',
        'stock',
        'discount_price',
        'code',
        'variation_difference',
        'quantity',
        'status',
        'price_usd',
        'specificprice_tm',
        'specificprice_usd',
        'specificdiscount',
    ];
    protected $casts = [
        'images' => 'array'
    ];
    protected $primaryKey = 'id';
    protected $appendc = ['user_discount'];

    public function getUserDiscountAttribute()
    {
        if($userDiscount = $this->user_discounts->where('userId', auth()->id())->first())
        {
            return $userDiscount->discount;
        }

    }

    protected $append = ['user_discounted_price'];

    public function getUserDiscountedPriceAttribute()
    {
        if($this->user_discounts->where('userId', auth()->id())->first())
        {
        return $this->price - $this->user_discounts->where('userId', auth()->id())->first()->discount * $this->price / 100;
        }
    }

    protected $appendprice = ['all_price'];

    public function getAllPriceAttribute()
    {

    if(Auth::check()){
        if(Auth::user()->where('role', 'specific')->first())
        {
            
            if(Auth::user()->where('price_type', 'usd')->first()) {
                
                    return $this->specificprice_usd;
                
            } elseif(Auth::user()->where('price_type', 'tmt')->first())
            {
                
                    return $this->specificprice_tm;
                
            } 
        } elseif(Auth::user()->where('role', 'registered')->first()) {
            if(Auth::user()->where('price_type', 'usd')->first()) {
                
                    return $this->price_usd;
                
            }
            elseif(Auth::user()->where('price_type', 'tmt')->first())
            {
                
                return $this->price;
                
            }
        }
    }
    }

    protected $appendguestprice = ['guest_all_price'];

    public function getGuestAllPriceAttribute()
    {
        if($this->guestDiscount != null)
        {
            return $this->guestPrice - ($this->guestPrice * $this->guestDiscount) / 100;
        } else {
            return $this->guestPrice;
        }
    }

    protected $appent = ['discounted_price'];

    public function getDiscountedPriceAttribute()
    {

        return $this->price - ($this->price * $this->discount) / 100;
        
    }

    protected $appentdisc = ['discounted_prices'];

    public function getDiscountedPricesAttribute()
    {

        return $this->price - $this->discount * $this->price / 100;
        
    }

    protected $appenp = ['price_types'];

    public function getPriceTypesAttribute()
    {
        if($this->price_type == 'price_type1')
        {
            return round($this->price);
        }
        elseif($this->price_type == 'price_type2')
        {
            return number_format((float)($this->price), 2);
        }

        
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategoryId');
    }

    public function subsubcategory()
    {
        return $this->belongsTo(Subsubcategory::class, 'subsubcategoryId');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brandId');
    }

    public function pacet()
    {
        return $this->belongsTo(Pacet::class, 'pacetId');
    }

    public function variationGroup()
    {
        return $this->belongsTo(VariationGroup::class, 'variationGroupId');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unitId');
    }

    public function specifications () {
        return $this->hasMany(Specification::class, 'id');
    }

    public function shopProducts () {
        return $this->hasMany(ShopProduct::class, 'productId');
    }

    public function pacetProducts () {
        return $this->hasMany(PacetProduct::class, 'productId');
    }

    public function session () {
        return $this->hasMany(Session::class, 'productId');
    }

    public function carts () {
        return $this->hasMany(Cart::class, 'productId');
    }

    public function order_lines() {
        return $this->hasMany(OrderLines::class, 'productId');
    }

    public function user_discounts () {
        return $this->hasMany(UserDiscount::class, 'productId');
    }


    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}