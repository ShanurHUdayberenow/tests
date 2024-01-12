<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\FooterLogo;
use App\Models\MagazineInformation;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Pacet;
use App\Models\PacetProduct;
use App\Models\Cart;
use Session;
use App\Models\ColorSetting;
use Illuminate\Support\Facades\Auth;
class IndexController extends Controller
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

        $subcategories = Subcategory::get();

       
        $categories = Category::orderBy('number','asc')->get();
    

        $locale = app()->getLocale();
        $banners = Banner::get();
        $pacets = Pacet::get();
        $totals = Cart::where('userId', Auth::id())->selectRaw('count(*) as total')->first();
        $color_navbar = ColorSetting::first();

        $pacetProducts = PacetProduct::take('5')->get();
        Session::forget('order_sessions', []);




        return view('frontend.index',compact('subcategories','color_navbar','totals','logo','footerlogo','maginformation','categories','banners','pacetProducts','pacets'))->with('locale',$locale);
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
    
}
