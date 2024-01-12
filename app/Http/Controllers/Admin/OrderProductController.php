<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderLines;
use App\Models\Order;
use App\Models\Product;
use App\Exports\OrderProductExport;
use App\Exports\OrderViewExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
class OrderProductController extends Controller
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
            'request_url' => 'admin/orderProduct/status'
        ],
        [
            'name'  => 'price',
            'type'  => 'text',
            'label' => 'Bahasy'
        ],
        [
            'name'  => 'download_pdf',
            'type'  => 'download_pdf',
            'label' => 'Download PDF',
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
public $name = 'orderProduct';
public $searchColumns = ['name'];

    public function index()
    {
        $data = new Order();
        
        return view('admin.crud.list')->with('columns', $this->columns)->with('name', $this->name)->with('data', $data)->with('searchColumns', $this->searchColumns);
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
        $orders = Order::where('id',$id)->get();
        
        return view('admin.order.order_view',compact('orders'))->with('locale', $locale);
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
        $order = Order::findOrFail($id);
        $order->delete();


        return response()->json(
            [
                'message'=> trans('message.successfully_deleted', ['name' => trans('message.'.$this->name)])
            ]
        );
    }

    public function export () {
        return Excel::download(new OrderProductExport, 'orderproducts.xlsx');
    }

    public function exports ($id) {
        return Excel::download(new OrderViewExport, 'orderviewproducts.xlsx');
    }
    public function status(Request $request) {
        if ($request->status == 'true') {
            Order::find($request->id)->update([
                'status' => 'approved'
            ]);
        } else {
            Order::find($request->id)->update([
                'status' => 'unapproved'
            ]);
        }
        return response()->json([
            'message' => 'success'
        ],200);
    }

    public function pendingswitch(Request $request) {
        if ($request->pendingswitch == 'true') {
            Order::find($request->id)->update([
                'pendingswitch' => 'approveds'
            ]);
        } else {
            Order::find($request->id)->update([
                'pendingswitch' => 'pending'
            ]);
        }
        return response()->json([
            'message' => 'success'
        ],200);
    }

    public function download_pdf($id)
    {
        $orders = Order::where('id',$id)->get();
        $orderc = Order::where('id',$id)->first();

        $locale = app()->getLocale();

        $pdf = PDF::loadView('admin/download-pdf', ['orders'=>$orders, 'locale'=>$locale, 'orderc'=>$orderc])->setPaper('a4', 'portrait');

        return $pdf->stream('order.pdf');
    }
}