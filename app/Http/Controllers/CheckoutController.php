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
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Order;
use App\Models\OrderLines;
use Carbon\Carbon;
use App\Models\ColorSetting;
use Session;
use PDF;
use Haruncpi\LaravelIdGenerator\IdGenerator;
class CheckoutController extends Controller
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
        $color_navbar = ColorSetting::first();

        return view('frontend.checkout',compact('color_navbar','cartProducts','totals','logo','footerlogo','maginformation','categories'))->with('locale',$locale);

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
        $order = new Order();
        $order->userId = Auth::id();
        $order->name = $request->input('name');
        $order->surname = $request->input('surname');
        $order->email = $request->input('email');
        $order->phoneNumber = $request->input('phoneNumber');
        $order->date = Carbon::now();
        $order->address = $request->input('address');
        $order->address2 = $request->input('address2');
        $order->description = $request->input('description');
        $order->status = 'unapproved';
        $latestOrder = Order::orderBy('created_at','DESC')->first();
        if(Order::orderBy('created_at','DESC')->first() == null){
            $order->orderNo = '#OS000001';
        } else {
            $order->orderNo = '#OS'.str_pad($latestOrder->id + 1, 6, "0", STR_PAD_LEFT);
        }
        $total = 0;
        $totals = 0;
        $cartitems_total = Cart::where('userId', Auth::id())->get();
        
        foreach($cartitems_total as $prod)
        {

            if($prod->quantity > $prod->product->quantity){
                Alert::error('Sargyt eden harydyňyzyň mukdary köp');
                return redirect()->back(); 
            }
            else{
                number_format((float)($total += (float)$prod->product->all_price * (float)$prod->quantity), 2);
            }

        }

        $orderNo_sessions[] = [
            'orderNo' =>$order->orderNo,
        ];
        session()->put('orderNo_sessions', $orderNo_sessions);

        $order->price = $total;

 
            
        session()->put('order', $order);
        
        $order->save();


        $cartitems = Cart::where('userId', Auth::id())->get();
        foreach($cartitems as $key=>$item)
        {
            $order_lines = new OrderLines();
            $order_lines->orderId = $order->id;
            $order_lines->productId = $item->productId;
            $order_lines->quantity = $item->quantity;
            $order_lines->code = $item->code;

            $prodCheck = Product::findOrFail($item->productId);
            $order_sessions[$item->productId] = [
                'code' =>$prodCheck->code,
                'name_tm' =>$prodCheck->name_tm,
                'quantity' =>$item->quantity,
                'price' =>$prodCheck->all_price,
                'discount' =>$prodCheck->discount,
                'discount_price' =>number_format((float)$prodCheck->all_price - (float)$prodCheck->all_price * (float)$prodCheck->discount / 100, 2),
                'total_price' =>number_format((float)((float)$prodCheck->all_price - (float)$prodCheck->all_price * (float)$prodCheck->discount / 100) * (float)$item->quantity, 2),
                'total' =>number_format($total, 2),
                'created_at' => new \DateTime(),
            ];
            session()->put('order_sessions', $order_sessions);
            
            number_format((float)($order_lines->price = $item->product->all_price));
            session()->put('order', $order_lines);
            
            $order_lines->save();
        
                
                    $itemc = Product::find($item->productId);
                
                    $itemc->update([
                        $itemc->quantity = $itemc->quantity - $item->quantity,
                        
                    ]); 
                
                
            
            
        }

        

        Alert::success('Haryt üstünlikli sargyt edildi');

        $cartitems = Cart::where('userId', Auth::id())->get();
        Cart::destroy($cartitems);
        

        return redirect()->route('order-successes');
    }

    public function stores(Request $request)
    {
        $order = new Order();
        $order->userId = Auth::id();
        $order->name = $request->input('name');
        $order->surname = $request->input('surname');
        $order->email = $request->input('email');
        $order->phoneNumber = $request->input('phoneNumber');
        $order->date = Carbon::now();
        $order->address = $request->input('address');
        $order->address2 = $request->input('address2');
        $order->description = $request->input('description');
        $order->status = 'unapproved';
        $latestOrder = Order::orderBy('created_at','DESC')->first();
        if(Order::orderBy('created_at','DESC')->first() == null){
            $order->orderNo = '#OS000001';
        } else {
            $order->orderNo = '#OS'.str_pad($latestOrder->id + 1, 6, "0", STR_PAD_LEFT);
        }
        $total = 0;
        $totals = 0;
        $cartsessionitems = session()->get('cart', []);
        foreach($cartsessionitems as $item)
        {
            if($item['discount'] == null){
                number_format((float)($totals += (float)$item['price'] * (float)$item['quantity']), 2);
            }
            else{
                number_format((float)($totals += (float)$item['discount_price'] * (float)$item['quantity']), 2);
            }

        }

        $orderNo_sessions[] = [
            'orderNo' =>$order->orderNo,
        ];
        session()->put('orderNo_sessions', $orderNo_sessions);

        $order->price = $total;

 
            
        session()->put('order', $order);
        
        $order->save();

        $cartsessionitems = session()->get('cart', []);
        foreach($cartsessionitems as $session_lines)
        {
            $itemc = Product::find($session_lines['id']);
            
            if($session_lines['quantity'] > $itemc->quantity)
            {
                Alert::error('Sargyt eden harydyňyzyň mukdary köp');
                return redirect()->back(); 
            }
            else{
            $order_line = new OrderLines();
            $order_line->orderId = $order->id;
            $order_line->productId = $session_lines['id'];
            $order_line->quantity = $session_lines['quantity'];
            $order_line->code = $session_lines['code'];
            $order_line->price = $session_lines['price'];


            if($session_lines['discount_price'] != null)
            {
                number_format((float)($order_line->price = $session_lines['discount_price']));
            }
            else
            {
                number_format((float)($order_line->price = $session_lines['price']));
            }
            session()->put('order', $order_line);

            $order_line->save();

            $itemc = Product::find($session_lines['id']);
                
            $itemc->update([
                'quantity' => $itemc->quantity - $session_lines['quantity'],
                
            ]);
            }
        }

        Alert::success('Haryt üstünlikli sargyt edildi');

        
        Session::forget('cart', []);
        

        return redirect()->route('order-success');
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
        //
    }

}
