<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['userId','productId','productQty','quantity'];

    protected $append = ['session'];
    
    public function getSessionAttribute()
    {
        $carts = Session::get("cart", []);
        foreach($carts as $cart)
        {
            $cartsession = $this->productId == $cart['id'];
            if($this->productId == $cart['id'])
            {
                return $this->quantity + $cart['quantity'];
            }
        }
    }

    protected $appends = ['cartProd'];

    public function getcartProdAttribute()
    {
        $cartProd = Cart::where('userId', Auth::id())->get();
        foreach($cartProd as $cartPro)
        {
            $cartProd = $this->productId == $cartPro->id;
            if($this->productId == $cartPro->id)
            {
                return $this->quantity + $cartPro->quantity;
            }
        }
    }

    public function user () {
        return $this->belongsTo(User::class, 'userId');
    }
    public function product () {
        return $this->belongsTo(Product::class, 'productId');
    }
}
