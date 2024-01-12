<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\FooterLogo;
use App\Models\MagazineInformation;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Offer;
use App\Models\OfferLine;
use Illuminate\Support\Facades\Auth;
use Session;
use Carbon\Carbon;
use App\Models\ColorSetting;
use Mail;
class OfferController extends Controller
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
        $cartsessionProducts = Session::get('cart', []);
        $color_navbar = ColorSetting::first();

        return view('frontend.offer',compact('color_navbar','cartsessionProducts','totals','logo','footerlogo','maginformation','categories'))->with('locale',$locale);
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
        $offer = new Offer();
        $offer->name = $request->input('name');
        $offer->email = $request->input('email');
        $offer->phoneNumber = $request->input('phoneNumber');
        $offer->date = Carbon::now();
        $offer->save();

        $cartsessionitems = session()->get('cart', []);
        foreach($cartsessionitems as $item)
        {
            $itemc = Product::find($item['id']);
            $offer_line = new OfferLine();
            $offer_line->offerId = $offer->id;
            $offer_line->productId = $item['id'];
            $offer_line->quantity = $item['quantity'];
            $offer_line->price = $item['price'];
            $offer_line->code = $item['code'];

            $offer_line->save();
        }

        \Mail::send('frontend.email', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phoneNumber' => $request->get('phoneNumber'),
            'cartsessionitems' => session()->get('cart', []),
        ),
         function($message) use ($request){
            $message->from($request->email);
            $message->to('ddofistm@gmail.com', $request->get('name'))->subject($request->get('name'));
        });

        Session::forget('cart', []);
        Alert::success('Siziň teklibiňiz üstünlikli soraldy');
        return redirect()->route('index');
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
