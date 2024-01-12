<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\FooterLogo;
use App\Models\MagazineInformation;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\ColorSetting;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        return $this->search($request);


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

    public function search(Request $request){
        $logo = Logo::take('1')->get();
        $footerlogo = FooterLogo::take('1')->get();
        $maginformation = MagazineInformation::take('1')->get();
        $categories = Category::orderBy('number','asc')->get();

        $locale = app()->getLocale();
        $brands = Brand::get();
        $totals = Cart::where('userId', Auth::id())->selectRaw('count(*) as total')->first();



        $sort_by = $request->sort_by;
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $query = $request->q;

        $categoryId = (Category::where('slug', $request->category)->first() != null) ? Category::where('slug', $request->category)->first()->id : null;

        $subcategoryId = (Subcategory::where('slug', $request->subcategory)->first() != null) ? Subcategory::where('slug', $request->subcategory)->first()->id : null;

        $brandId = (Brand::where('slug', $request->brand)->first() != null) ? Brand::where('slug', $request->brand)->first()->id : null;

        $conditions = [];

        if($categoryId != null){
            $conditions = array_merge($conditions, ['categoryId' => $categoryId]);
        }

        if($subcategoryId != null){
            $conditions = array_merge($conditions, ['subcategoryId' => $subcategoryId]);
        }

        if($brandId != null){
            $conditions = array_merge($conditions, ['brandId' => $brandId]);
        }


        $products = Product::where('status','approved')->where($conditions);

        if(Auth::check()){
            if(Auth::user()->where('role', 'specific')->first())
            {
                if(Auth::user()->where('price_type', 'usd')->first()) {
                    if($sort_by != null){
                        switch ($sort_by) {
                            case '1':
                                $products = $products->orderBy('created_at', 'desc');
                                break;
                            case '2':
                                $products = $products->orderBy('created_at', 'asc');
                                break;
                            case '3':
                                $products = $products->orderBy('specificprice_usd', 'desc');
                             
                                break;
                            case '4':
                                $products = $products->orderBy('specificprice_usd', 'asc');
                                break;
                            default:
                                // code...
                                break;
                        }
                    }
                } elseif(Auth::user()->where('price_type', 'tmt')->first()) {
                    if($sort_by != null){
                        switch ($sort_by) {
                            case '1':
                                $products = $products->orderBy('created_at', 'desc');
                                break;
                            case '2':
                                $products = $products->orderBy('created_at', 'asc');
                                break;
                            case '3':
                                $products = $products->orderBy('specificprice_tm', 'desc');
                             
                                break;
                            case '4':
                                $products = $products->orderBy('specificprice_tm', 'asc');
                                break;
                            default:
                                // code...
                                break;
                        }
                    }
                }
                
            } elseif(Auth::user()->where('role', 'registered')->first()) {
                if(Auth::user()->where('price_type', 'usd')->first()) {
                    if($sort_by != null){
                        switch ($sort_by) {
                            case '1':
                                $products = $products->orderBy('created_at', 'desc');
                                break;
                            case '2':
                                $products = $products->orderBy('created_at', 'asc');
                                break;
                            case '3':
                                $products = $products->orderBy('price_usd', 'desc');
                             
                                break;
                            case '4':
                                $products = $products->orderBy('price_usd', 'asc');
                                break;
                            default:
                                // code...
                                break;
                        }
                    }
                } elseif(Auth::user()->where('price_type', 'tmt')->first()) {
                    if($sort_by != null){
                        switch ($sort_by) {
                            case '1':
                                $products = $products->orderBy('created_at', 'desc');
                                break;
                            case '2':
                                $products = $products->orderBy('created_at', 'asc');
                                break;
                            case '3':
                                $products = $products->orderBy('price', 'desc');
                             
                                break;
                            case '4':
                                $products = $products->orderBy('price', 'asc');
                                break;
                            default:
                                // code...
                                break;
                        }
                    }
                }
            }
        }
        

        if(Auth::check()){
            if(Auth::user()->where('role', 'specific')->first()){
                if(Auth::user()->where('price_type', 'usd')->first()){
                    if($min_price != null && $max_price != null){
                        $products = $products->where('specificprice_usd', '>=', $min_price)->where('specificprice_usd', '<=', $max_price);
                    }
                } elseif(Auth::user()->where('price_type', 'tmt')->first()){
                    if($min_price != null && $max_price != null){
                        $products = $products->where('specificprice_tm', '>=', $min_price)->where('specificprice_tm', '<=', $max_price);
                    }
                }
            }elseif(Auth::user()->where('role', 'registered')->first()){
                if(Auth::user()->where('price_type', 'usd')->first()){
                    if($min_price != null && $max_price != null){
                        $products = $products->where('price_usd', '>=', $min_price)->where('price_usd', '<=', $max_price);
                    }
                } elseif(Auth::user()->where('price_type', 'tmt')->first()){
                    if($min_price != null && $max_price != null){
                        $products = $products->where('price', '>=', $min_price)->where('price', '<=', $max_price);
                    }
                }
            }
        }
        

        $products = $products->where('status','approved')->orderBy('created_at', 'desc')->paginate(20, ['*'], 'published')->appends(request()->query());
        $color_navbar = ColorSetting::first();

        return view('frontend.products', compact('color_navbar','totals','logo','footerlogo','maginformation','categories','products','brands','sort_by','categoryId','query','min_price','max_price','brandId','subcategoryId'))->with('locale',$locale);
    }

    public function search2(Request $request) {
        $logo = Logo::take('1')->get();
        $footerlogo = FooterLogo::take('1')->get();
        $maginformation = MagazineInformation::take('1')->get();
        $categories = Category::orderBy('number','asc')->get();
        $locale = app()->getLocale();
        $brands = Brand::get();
        $totals = Cart::where('userId', Auth::id())->selectRaw('count(*) as total')->first();

        $products = Product::where('name_tm', 'LIKE', '%' . $request->search . '%')->orWhere('name_ru', 'LIKE', '%' . $request->search . '%')->where('name_en', 'LIKE', '%' . $request->search . '%')->paginate('16');
        $color_navbar = ColorSetting::first();


        return view('frontend.products', compact('color_navbar','totals','logo','footerlogo','maginformation','categories','products','brands'))->with(['locale' => $locale]);
    }
}
