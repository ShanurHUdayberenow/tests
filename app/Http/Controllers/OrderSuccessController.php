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
use PDF;
class OrderSuccessController extends Controller
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
        $orderprint = session()->get('orderNo_sessions', []);

        return view('frontend.order-success',compact('color_navbar','orders','totals','logo','footerlogo','maginformation','categories','orderprint'))->with('locale',$locale);
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
        //
    }

    public function order_successes()
    {
        $logo = Logo::take('1')->get();
        $footerlogo = FooterLogo::take('1')->get();
        $maginformation = MagazineInformation::take('1')->get();
        $categories = Category::orderBy('number','asc')->get();
        
        $locale = app()->getLocale();
        $totals = Cart::where('userId', Auth::id())->selectRaw('count(*) as total')->first();
        $orders = Order::where('userId', Auth::id())->get();
        $color_navbar = ColorSetting::first();
        $orderprint = session()->get('orderNo_sessions', []);

        return view('frontend.order-successes',compact('color_navbar','orders','totals','logo','footerlogo','maginformation','categories','orderprint'))->with('locale',$locale);
    }

    public function download_pdf_guest(){
        $locale = app()->getLocale();
        $orderprint = session()->get('orderNo_sessions', []);
        $orderc = Order::where('orderNo',$orderprint)->first();
        $orders = Order::where('orderNo',$orderprint)->get();
        
        $pdf = PDF::loadView('frontend/download-pdf', ['orderc'=>$orderc,'orders'=>$orders,'orderprint'=>$orderprint,'locale'=>$locale])->setPaper('a4', 'portrait');
    
        return $pdf->stream('download.pdf');
    }

    public function download_pdf_registered(){
        $locale = app()->getLocale();
        $orderprint = session()->get('orderNo_sessions', []);
        $orderc = Order::where('orderNo',$orderprint)->first();
        $orders = Order::where('orderNo',$orderprint)->get();
        
        $pdf = PDF::loadView('frontend/download-pdf-registered', ['orderc'=>$orderc,'orders'=>$orders,'orderprint'=>$orderprint,'locale'=>$locale])->setPaper('a4', 'portrait');
    
        return $pdf->stream('download.pdf');
    }
}
