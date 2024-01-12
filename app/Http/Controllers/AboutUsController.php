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
use App\Models\AboutUs;
class AboutUsController extends Controller
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
        $about = AboutUs::first();

        return view('frontend.about_us',compact('about','color_navbar','orders','totals','logo','footerlogo','maginformation','categories'))->with('locale',$locale);
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
