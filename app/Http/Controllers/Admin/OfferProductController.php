<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OfferLine;
use App\Models\Offer;
use App\Models\Product;
use App\Exports\ProductOfferExport;
use Maatwebsite\Excel\Facades\Excel;
class OfferProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $columns =
    [
        [
            'name'  => 'name',
            'type'  => 'text',
            'label' => 'Ady'
        ],
        [
            'name'  => 'date',
            'type'  => 'text',
            'label' => 'Sene'
        ],
        [
            'name'  => 'status_switch',
            'type'  => 'switch',
            'label' => 'Sargydy Tassyklamak',
            'request_url' => 'admin/offerProduct/status'
        ],


    ];
        public $showColumns =
    [
        [
            'name'  => 'image',
            'type'  => 'image',
            'label' => 'Surat'
        ],
        [
            'name'  => 'name',
            'type'  => 'text',
            'label' => 'Dükan ady'
        ],
        [
            'name'  => 'slug',
            'type'  => 'text',
            'label' => 'Slug'
        ],
        [
            'name'  => 'description',
            'type'  => 'textarea',
            'label' => 'Dükan barada'
        ],
        [
            'name'  => 'address',
            'type'  => 'text',
            'label' => 'Dükan salgysy'
        ],
        [
            'name'  => 'phoneNumber',
            'type'  => 'double',
            'label' => 'Telefon belgisi',
        ],
        [
            'name'  => 'email',
            'type'  => 'text',
            'label' => 'Email salgysy'
        ]
    ];
public $name = 'offerProduct';
public $searchColumns = ['name'];

    public function index()
    {
        $data = new Offer();
        
        return view('admin.crud.list')->with('columns', $this->columns)->with('name', $this->name)->with('data', $data)->with('searchColumns', $this->searchColumns)->with('export', 'offerProduct.export');
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
    public function show(Request $request, $id)
    {
        
        $locale = app()->getLocale();
        $offers = Offer::where('id',$id)->get();

        return view('admin.offer.offer_view',compact('offers'))->with('locale', $locale);
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
        $offer = Offer::findOrFail($id);
        $offer->delete();


        return response()->json(
            [
                'message'=> trans('message.successfully_deleted', ['name' => trans('message.'.$this->name)])
            ]
        );
    }

    public function export () {
        return Excel::download(new ProductOfferExport, 'offerproducts.xlsx');
    }

    public function status(Request $request) {
        if ($request->status == 'true') {
            Offer::find($request->id)->update([
                'status' => 'approved'
            ]);
        } else {
            Offer::find($request->id)->update([
                'status' => 'unapproved'
            ]);
        }
        return response()->json([
            'message' => 'success'
        ],200);
    }

    public function pendingswitch(Request $request) {
        if ($request->pendingswitch == 'true') {
            offer::find($request->id)->update([
                'pendingswitch' => 'approveds'
            ]);
        } else {
            offer::find($request->id)->update([
                'pendingswitch' => 'pending'
            ]);
        }
        return response()->json([
            'message' => 'success'
        ],200);
    }
}
