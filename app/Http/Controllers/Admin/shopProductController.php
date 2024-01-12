<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shopProduct;

class shopProductController extends Controller
{
        public $columns =
        [
            [
                'name'  => 'discount',
                'type'  => 'double',
                'label' => 'Arzanlaşyk'
            ],
            [
                'name'  => 'quantity',
                'type'  => 'double',
                'label' => 'Harydyň sany',
            ],
            [
                'name'  => 'price',
                'type'  => 'double',
                'label' => 'Harydyň bahasy'
            ],
        ];
        
        public $showColumns =
        [
            [
                'name'  => 'discount',
                'type'  => 'double',
                'label' => 'Arzanlaşyk'
            ],
            [
                'name'  => 'quantity',
                'type'  => 'double',
                'label' => 'Harydyň sany',
            ],
            [
                'name'  => 'price',
                'type'  => 'double',
                'label' => 'Harydyň bahasy'
            ],
        ];

    public $name = 'shopProduct';
    public $searchColumns = ['discount','price','quantity'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new shopProduct();

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
    public function show($id)
    {
        return view('admin.crud.view')->with('name', $this->name)->with('data', shopProduct::find($id))->with('columns', $this->showColumns);
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
