<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PacetRequest;
use App\Models\Pacet;
use App\Models\Product;
use App\Models\PacetProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PacetController extends Controller
{
    public $columns =
        [
            [
                'name'  => 'image',
                'type'  => 'image',
                'label' => 'Surat'
            ],
            [
                'name'  => 'name_tm',
                'type'  => 'text',
                'label' => 'Pacet Ady Tm'
            ],
            [
                'name'  => 'status_switch',
                'type'  => 'switch',
                'label' => 'Tassyklamak',
                'request_url' => 'admin/pacet/activation'
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
                'name'  => 'name_tm',
                'type'  => 'text',
                'label' => 'Pacet ady Tm'
            ],
            [
                'name'  => 'name_ru',
                'type'  => 'text',
                'label' => 'Pacet ady Ru'
            ],
            [
                'name'  => 'name_en',
                'type'  => 'text',
                'label' => 'Pacet ady En'
            ],
            [
                'name'  => 'slug',
                'type'  => 'textarea',
                'label' => 'Slug'
            ],
            [
                'name'  => 'description_tm',
                'type'  => 'textarea',
                'label' => 'Pacet barada Tm'
            ],
            [
                'name'  => 'description_ru',
                'type'  => 'textarea',
                'label' => 'Pacet barada Ru'
            ],
            [
                'name'  => 'description_en',
                'type'  => 'textarea',
                'label' => 'Pacet barada En'
            ],
        ];
    public $fields =
        [
            [
                'name'  => 'image',
                'type'  => 'image',
                'label' => 'Surat'
            ],

            [
                'name'  => 'name_tm',
                'type'  => 'text',
                'label' => 'Pacet ady Tm'
            ],
            [
                'name'  => 'name_ru',
                'type'  => 'text',
                'label' => 'Pacet ady Ru'
            ],
            [
                'name'  => 'name_en',
                'type'  => 'text',
                'label' => 'Pacet ady En'
            ],
            [
                'name'  => 'slug',
                'type'  => 'text',
                'label' => 'Slug'
            ],
            [
                'name'  => 'description_tm',
                'type'  => 'textarea',
                'label' => 'Pacet barada Tm'
            ],
            [
                'name'  => 'description_ru',
                'type'  => 'textarea',
                'label' => 'Pacet barada Ru'
            ],
            [
                'name'  => 'description_en',
                'type'  => 'textarea',
                'label' => 'Pacet barada En'
            ],
            [
                'name'  => 'productId',
                'type'  => 'productlist',
                'label' => 'Harytlary saýlaň',
                'model' => 'App\\Models\\Product',
                'relation_column' => 'pacetId',
            ],
        ];
    public $name = 'pacet';
    public $searchColumns = ['name_tm','name_ru'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = new Pacet();


        return view('admin.crud.list')->with('columns', $this->columns)->with('name', $this->name)->with('data', $data)->with('searchColumns', $this->searchColumns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $searchs = Product::get();

        $session_products = session()->get('prodpacet', []);
        
        return view('admin.crud.create', compact('searchs','session_products'))->with('fields', $this->fields)->with('name', $this->name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */


    public function store(PacetRequest $request)
    {

        $filename = time() . '.' . $request->image->extension();

        $request->image->storeAs('images/pacets/',$filename, 'public');
        $image_name = url('storage/images/pacets/'.$filename);

        $pacets = Pacet::create([
            'name_tm' => $request->name_tm,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'slug' => $request->slug,
            'image' => $image_name,
            'file_name' => $filename,
            'description_tm' => $request->description_tm,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
        ]);

        
        
        if($request->selectproduct != Null)
        {
            foreach($request->selectproduct as $key=>$name){
            
                $insert = [
                    'pacetId' => $pacets->id,
                    'productId' => $request->selectproduct[$key],
                ];
                
                PacetProduct::insert($insert);
                
            }
        }

 
        
        return redirect()->route('pacet.index')->with('message', trans('message.successfully_added', ['name' => trans('message.'.$this->name)]));
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        return view('admin.crud.view')->with('name', $this->name)->with('data', Pacet::find($id))->with('columns', $this->showColumns);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $searchs = Product::get();

        $pacetObj = Pacet::where('id', $id)->first();

        $pacet_products = PacetProduct::where('pacetId','=',$pacetObj->id)->get();

        return view('admin.crud.edit', compact('pacet_products','searchs'))->with('fields', $this->fields)->with('name', $this->name)->with('data', Pacet::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name_tm' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required',
            'slug' => 'required',
        ],
            [
                'name_tm.required' => 'Brand Ady Tm meýdançasyny dolduryň',
                'name_ru.required' => 'Brand Ady Ru meýdançasyny dolduryň',
                'name_en.required' => 'Brand Ady En meýdançasyny dolduryň',
            ]);
        $pacet = Pacet::find($id);
        if ($request->image) {
            Storage::disk('public')->delete('/images/pacets/'.$pacet->file_name);
            $filename = time() . '.' . $request->image->extension();

            $request->image->storeAs('images/pacets/',$filename, 'public');
            $image_name = url('storage/images/pacets/'.$filename);

            $pacet->update([
                'name_tm' => $request->name_tm,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'slug' => $request->slug,
                'image' => $image_name,
                'file_name' => $filename,
                'description_tm' => $request->description_tm,
                'description_ru' => $request->description_ru,
                'description_en' => $request->description_en,
            ]);
        } else {
            $pacet->update([
                'name_tm' => $request->name_tm,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,      
                'slug' => $request->slug,
                'description_tm' => $request->description_tm,
                'description_ru' => $request->description_ru,
                'description_en' => $request->description_en,
            ]);
        }

        
        
        if($request->selectproduct != Null)
        {
            foreach($request->selectproduct as $key=>$name){
            
                $insert = [
                    'pacetId' => $pacet->id,
                    'productId' => $request->selectproduct[$key],
                ];

                PacetProduct::insert($insert);
                
            }
        }



        return redirect()->route('pacet.index')->with('message', trans('message.successfully_updated', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $pacet = Pacet::findOrFail($id);
        Storage::disk('public')->delete('/images/pacets/'.$pacet->file_name);
        $pacet->delete();


        return response()->json(
            [
                'message'=> trans('message.successfully_deleted', ['name' => trans('message.'.$this->name)])
            ]
        );
    }


    public function productsearch(Request $request)
    {

        $searchs = Product::where('name_tm', 'like', '%' . $request->get('searchQuest') . '%' )->get();

        return json_encode( $searchs );
    }

    public function pacetproductdestroy($id)
    {
        $pacet_products = PacetProduct::find($id);
        $pacet_products->delete($id);

        return redirect()->back();
    }

    public function updatesproductquantity(Request $request)
    {
        $productId = $request->input('productId');
        $productQty = $request->input('productQty');

            if(PacetProduct::findOrFail($productId))
            {
                
                $productQ = PacetProduct::findOrFail($productId);

                $productQ->quantity = $productQty;

                $productQ->update();
                return response()->json(['status'=> "Quantity update"]);
                
            }
        
    }

    public function activation(Request $request) {
        if ($request->status == 'true') {
            Pacet::find($request->id)->update([
                'status' => 'approved'
            ]);
        } else {
            Pacet::find($request->id)->update([
                'status' => 'unapproved'
            ]);
        }
        return response()->json([
            'message' => 'success'
        ],200);
    }
}
