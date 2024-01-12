<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
class ShopController extends Controller
{
        public $columns =
        [
            [
                'name'  => 'name',
                'type'  => 'text',
                'label' => 'Dükan Ady'
            ],
            [
                'name'  => 'status',
                'type'  => 'status',
                'label' => 'Status'
            ],
            [
                'name'  => 'status_switch',
                'type'  => 'switch',
                'label' => 'Tassyklamak',
                'request_url' => 'admin/shop/status'
            ]

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
    public $name = 'shop';
    public $searchColumns = ['name'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new Shop();
        
        return view('admin.crud.list')->with('columns', $this->columns)->with('name', $this->name)->with('data', $data)->with('searchColumns', $this->searchColumns);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.crud.view')->with('name', $this->name)->with('data', Shop::find($id))->with('columns', $this->showColumns);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return response()->json(['message' => 'Something went wrong!'], 500);
    }

    public function status(Request $request) {
        if ($request->status == 'true') {
            Shop::find($request->id)->update([
                'status' => 'approved'
            ]);
        } else {
            Shop::find($request->id)->update([
                'status' => 'unapproved'
            ]);
        }
        return response()->json([
            'message' => 'success'
        ],200);
    }
}
