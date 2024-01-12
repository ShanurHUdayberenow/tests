<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserDiscountRequest;
use App\Models\UserDiscount;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use DB;
use Session;
class UserDiscountController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        $searchs = Product::get();
        
        return view('admin.user_discount.userdiscountlist', compact('users','searchs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user_discount.userdiscountcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserDiscountRequest $request)
    {

        foreach($request->checkbox as $key=>$name){
            $item = User::find($request->checkbox[$key]);

            $insert = session()->get('userdisc', []);
            $insert[] = [
                'userId' => $request->checkbox[$key],
                'name' => $item->name,
                'surname' => $item->surname,
            ];
            session()->put('userdisc', $insert);
        }
        return redirect()->back()->with(['card_count'=>count($insert)]);
    }

    public function save_data(Request $request)
    {

        $checked_array = $request->prodId;
        foreach($request->prodId as $key=>$value){

            $itemc = Product::find($request->prodId[$key]);

            $inserts = session()->get('userdiscprod', []);
            $inserts[] = [
                'prodId' => $request->prodId[$key],
                'id' => $itemc->id,
                'name' => $itemc->name_tm,
                'price' => $itemc->price,
                'discount' => $itemc->discount,
                'userDiscount' => 10,
            ];
            session()->put('userdiscprod', $inserts);
        }
        return response()->json(['success' => 'Data inserted']);
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
        $locale = app()->getLocale();
        $listproductedit = UserDiscount::where('userId',$id)->get();
        $searchs = Product::get();
        $inserts = session()->get('userdiscprod', []);

        $selectusers = User::find($id);

        return view('admin.user_discount.listproductedit',compact('listproductedit','searchs','inserts','selectusers'))->with(['locale' => $locale]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $productId = $request->input('productId');
        
        $productDiscountEdit = $request->input('productDiscountEdit');

            if(UserDiscount::findOrfail($productId))
            {
                $userdiscountedit = UserDiscount::findOrfail($productId);
                $userdiscountedit->discount = $productDiscountEdit;
                
                $userdiscountedit->update();
                return response()->json(['status'=> "Quantity update"]);
            }
    }

    public function userDiscountUpdate(Request $request)
    {
        $selectdiscounts = UserDiscount::where('created_at', UserDiscount::max('created_at'))->get();

        foreach($selectdiscounts as $selectdiscount)
        {

            $selectdiscount->update([
                'discount' => $request->discount,
            ]);
        }
    
        return redirect()->back();
    }

    public function updatediscount(Request $request)
    {
        $productId = $request->input('productId');
        $productDiscount = $request->input('productDiscount');

            if(UserDiscount::findOrFail($productId))
            {
                $userdiscount = UserDiscount::findOrFail($productId);
                $userdiscount->discount = $productDiscount;
                
                $userdiscount->update();
                return response()->json(['status'=> "Quantity update"]);
            }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
    
        return redirect('/admin/userDiscount');
    }

    public function listproduct(Request $request)
    {
        $counts = UserDiscount::take('1')->get();
        $searchs = Product::get();
        $locale = app()->getLocale();

        $inserts = session()->get('userdiscprod', []);

        $selectedusers = UserDiscount::select('userId')->where('created_at', UserDiscount::max('created_at'))->orderBy('created_at','asc')->get();

        $selectedproducts = UserDiscount::where('created_at', UserDiscount::max('created_at'))->orderBy('created_at','asc')->get();

        $selectusers = session()->get('userdisc', []);

      
        return view('admin.user_discount.listproduct', compact('inserts','counts','selectusers','searchs','selectedusers','selectedproducts'))->with(['locale' => $locale]);
    }


    /*User Filter start*/
    public function discountedusers()
    {
        
        $userdiscounts = User::join('user_discounts', 'user_discounts.userId', '=', 'users.id')->get(['users.name']);
        
        return view('admin.user_discount.userdiscountlist', compact('users'));
    }



    public function dontdiscountedusers()
    {

        $users = User::join('user_discounts', 'user_discounts.userId', '=', 'users.id')->get(['users.name']);

        return view('admin.user_discount.userdiscountlist', compact('users'));
    }
    /* End filter */


    public function productsearch(Request $request)
    {

        $searchs = Product::where('name_tm', 'like', '%' . $request->get('searchQuest') . '%' )->get();

        return json_encode( $searchs );
    }

    public function usersearch(Request $request)
    {

        $users = User::where('name', 'like', '%' . $request->get('searchQuest') . '%' )->get();

        return json_encode( $users );
    }

    public function productstore(Request $request)
    {
    $selectedusers = UserDiscount::select('userId')->where('created_at', UserDiscount::max('created_at'))->get();

    $selectusers = session()->get('userdisc', []);
    $selectproducts = session()->get('userdiscprod', []);



    $data = array();
    foreach($selectusers as $selectuser){

        foreach($selectproducts as $key => $selectproduct){

            $item['userId'] = $selectuser['userId'];
            $item['productId'] = $selectproduct['prodId'];
            $item['discount'] = $request->discountProd[$key];
            $item['created_at'] = date('Y-m-d H:i');
            $item['updated_at'] = date('Y-m-d H:i');

            UserDiscount::insert($item);

        }

    }



    Session::forget('userdisc', []);
    Session::forget('userdiscprod', []);

    return redirect()->route('userDiscount.index');
    }

    public function productupdate(Request $request, $id)
    {
    $selectedusers = UserDiscount::select('userId')->where('created_at', UserDiscount::max('created_at'))->get();

    $selectusers = User::find($id);
    
    $selectproducts = session()->get('userdiscprod', []);

    if($selectproducts != null){
        foreach($selectproducts as $key => $selectproduct){
                   
            $item['userId'] = $selectusers['id'];
            $item['productId'] = $selectproduct['prodId'];
            $item['discount'] = $request->discount[$key];
            $item['created_at'] = date('Y-m-d H:i');
            $item['updated_at'] = date('Y-m-d H:i');
    
            UserDiscount::create($item);
        }
    }

    $prods = UserDiscount::where('userId',$selectusers->id)->get();

    foreach($prods as $key => $item){
    
        $itemc = UserDiscount::find($item->productId);

        if($itemc != null){
            $itemc->update([        
                'discount' => $request->discount[$key],
                'updated_at' => date('Y-m-d H:i'),
            ]);
        }

    }

        
    
    Session::forget('userdiscprod', []);

    return redirect()->route('userDiscount.index');
    }

    public function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $searchs = Product::paginate(5);
            return view('admin.user_discount.listproductpagination', compact('searchs'))->render();
        }
    }

    public function sessionforget(Request $request)
    {
     Session::forget('userdisc', []);
     Session::forget('userdiscprod', []);

        return redirect('/admin/userDiscount')->withSuccess('Ustunlikli');
    }

    public function user_discount_delete($id)
    {
        $list = UserDiscount::findOrFail($id);
        $list->delete();
        return redirect()->back();
    }

    public function userdiscdelete($id)
    {
        $list = UserDiscount::find($id);
        $list->delete();
        return response()->json(
            [
                'message'=> trans('message.successfully_deleted')
            ]
        );
    }

    public function proddelete(Request $request)
    {
        if($request->id) {
            $cart = session()->get('userdiscprod', []);
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
