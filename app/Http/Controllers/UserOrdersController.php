<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\FooterLogo;
use App\Models\MagazineInformation;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use App\Models\ColorSetting;
use Illuminate\Support\Facades\Auth;
class UserOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $logo = Logo::take('1')->get();
        $footerlogo = FooterLogo::take('1')->get();
        $maginformation = MagazineInformation::take('1')->get();
        $categories = Category::orderBy('number','asc')->get();

        $locale = app()->getLocale();
        $totals = Cart::where('userId', Auth::id())->selectRaw('count(*) as total')->first();
        $orders = Order::where('id',$id)->where('userId', Auth::id())->get();
        $orderses = Order::where('id',$id)->where('userId', Auth::id())->first();

        $color_navbar = ColorSetting::first();

        return view('frontend.order-view',compact('color_navbar','orders','orderses','totals','logo','footerlogo','maginformation','categories'))->with('locale',$locale);
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
        $orderses = Order::where('id',$id)->where('userId', Auth::id())->get();
                    $data = array();
                    
                    foreach($orderses as $order)
                    {
                        foreach($order->order_lines as $index)
                        {
                            $item = array(
                                'productId' => $index->productId,
                                'userId' => Auth::id(),
                                'quantity' => $index->quantity,
                                'code' => $index->code,
                            );
                            array_push($data,$item);
                        }
                    }

        
        Cart::insert($data);
        return redirect()->route('cart');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
