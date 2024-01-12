<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\FooterLogo;
use App\Models\MagazineInformation;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use DB;
use Session;
use Carbon\Carbon;
use App\Models\ColorSetting;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logo = Logo::take('1')->get();
        $footerlogo = FooterLogo::take('1')->get();
        $maginformation = MagazineInformation::take('1')->get();
        $categories = Category::orderBy('number','asc')->get();

        $locale = app()->getLocale();
        $totals = Cart::where('userId', Auth::id())->selectRaw('count(*) as total')->first();
        $cartProducts = Cart::where('userId', Auth::id())->get();
        $cartsessionProducts = Session::get('cart', []);
        $color_navbar = ColorSetting::first();


        return view('frontend.cart',compact('color_navbar','cartsessionProducts','cartProducts','totals','logo','footerlogo','maginformation','categories'))->with('locale',$locale);
    }

    public function addProduct(Request $request)
    {
        $productId = $request->input('productId');
        $productQty = $request->input('productQty');
        $productCode = $request->input('productCode');

       
        if(Auth::check())
        {
            $prodCheck = Product::where('id',$productId)->first();

            if($prodCheck)
            {

                if(Cart::where('productId',$productId)->where('userId',Auth::id())->exists())
                {
                   $cart = Cart::where('productId',$productId)->where('userId',Auth::id())->increment('quantity');

                   return response()->json(['status' => $prodCheck->name_tm." Already Added to cart"]);
                }
                else
              {
                $cartItem = new Cart();
                $cartItem->productId = $productId;
                $cartItem->UserId = Auth::id();
                $cartItem->quantity = $productQty;
                $cartItem->code = $productCode;


                $cartItem->save();

                return response()->json(['status'=> "Add to Cart"]);
              }
            }
        }
        else
        {
            $prodCheck = Product::findOrFail($productId);
            
            $cart = session()->get('cart', []);

            if(isset($cart[$productId])) {
                $cart[$productId]['quantity']++;
            } else {
                $cart[$productId] = [
                    'id'=>$prodCheck->id,
                    'name'=>$prodCheck->name_tm,
                    'quantity'=>1,
                    'code'=>$prodCheck->code,
                    'price'=>$prodCheck->guestPrice,
                    'discount'=>$prodCheck->guestDiscount,
                    'discount_price'=>(float)$prodCheck->guestPrice - (float)$prodCheck->guestPrice * (float)$prodCheck->guestDiscount / 100,
                    'images' => $prodCheck->images,
                    'date' => Carbon::now(),
                    'status' => 'pending',
                ];
            }
            session()->put('cart', $cart);

                return \Response::json(['card_count'=>count($cart)]);


        }
    }

    public function updatecart(Request $request)
    {
        $productId = $request->input('productId');
        $productQty = $request->input('productQty');

        if(Auth::check())
        {
            if(Cart::where('userId', Auth::id())->findOrFail($productId))
            {
                
                $cart = Cart::where('userId', Auth::id())->findOrFail($productId);
                $cart->quantity = $productQty;

                $cart->update();
                return response()->json(['status'=> "Quantity update"]);
                
            }
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cartProduct = Cart::find($id);
        $cartProduct->delete();
        return response()->json(['status'=>'Haryt üstünlikli öçürildi']);
    }

    public function delete(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart', []);
            
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function updatecartsession(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart', []);
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
}
