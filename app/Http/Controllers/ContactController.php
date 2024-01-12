<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\FooterLogo;
use App\Models\MagazineInformation;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use App\Models\ColorSetting;
use Illuminate\Support\Facades\Auth;
use App\Models\FeedBack;
use App\Models\Map;
class ContactController extends Controller
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
        $orders = Order::where('userId', Auth::id())->get();
        $color_navbar = ColorSetting::first();
        return view('frontend.contacts',compact('color_navbar','orders','totals','logo','footerlogo','maginformation','categories'))->with('locale',$locale);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $logo = Logo::take('1')->get();
        $footerlogo = FooterLogo::take('1')->get();
        $maginformation = MagazineInformation::take('1')->get();
        $categories = Category::get();
        $locale = app()->getLocale();
        $totals = Cart::where('userId', Auth::id())->selectRaw('count(*) as total')->first();
        $orders = Order::where('userId', Auth::id())->get();
        $color_navbar = ColorSetting::first();
        $maps = Map::get();
        
        return view('frontend.map',compact('maps','color_navbar','orders','totals','logo','footerlogo','maginformation','categories'))->with('locale',$locale);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FeedBack::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        return redirect()->back()->with('message', 'Üstünlikli ugradyldy');
        
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
