<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use App\Imports\ProductImportSheets;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Specification;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\VariationGroup;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
        public $columns =
        [
            [
                'name'  => 'name_tm',
                'type'  => 'text',
                'label' => 'Ady'
            ],
            [
                'name'  => 'images',
                'type'  => 'uploads_multiple',
                'label' => 'Suratlar',
                'url' => 'image',
                'filename' => 'filename'
            ],
            [
                'name'  => 'status_switch',
                'type'  => 'switch',
                'label' => 'Tassyklamak',
                'request_url' => 'admin/product/status'
            ],

        ];
    public $showColumns =
        [
            [
                'name'  => 'images',
                'type'  => 'upload_multiple',
                'label' => 'Suratlar',
                'url' => 'image',
                'filename' => 'filename'
            ],

            [
                'name'  => 'name_tm',
                'type'  => 'text',
                'label' => 'Ady Tm'
            ],
            [
                'name'  => 'name_ru',
                'type'  => 'text',
                'label' => 'Ady Ru'
            ],
            [
                'name'  => 'name_en',
                'type'  => 'text',
                'label' => 'Ady En'
            ],
            [
                'name'  => 'quantity',
                'type'  => 'double',
                'label' => 'Haryt Sany'
            ],
            [
                'name'  => 'price',
                'type'  => 'text',
                'label' => 'Register TMT Bahasy'
            ],
            [
                'name'  => 'price_usd',
                'type'  => 'text',
                'label' => 'Register USD Bahasy'
            ],
            [
                'name'  => 'specificprice_tm',
                'type'  => 'text',
                'label' => 'Optom(Ussa) TMT Bahasy'
            ],
            [
                'name'  => 'specificprice_usd',
                'type'  => 'text',
                'label' => 'Optom(Ussa) USD Bahasy'
            ],
            [
                'name'  => 'guestPrice',
                'type'  => 'text',
                'label' => 'Guest Bahasy'
            ],
            
            [
                'name'  => 'guestDiscount',
                'type'  => 'text',
                'label' => 'Guest Arzanladyş'
            ],
            [
                'name'  => 'isNew',
                'type'  => 'text',
                'label' => 'Täze'
            ],
            [
                'name'  => 'code',
                'type'  => 'text',
                'label' => 'Code'
            ],         
            [
                'name'  => 'description_tm',
                'type'  => 'textarea',
                'label' => 'Barada Tm'
            ],
            [
                'name'  => 'description_ru',
                'type'  => 'textarea',
                'label' => 'Barada Ru'
            ],
            [
                'name'  => 'description_en',
                'type'  => 'textarea',
                'label' => 'Barada En'
            ],
            [
                'name'  => 'category',
                'type'  => 'relationship',
                'label' => 'Kategoriýa',
                'relationship_column' => 'name_tm',
            ],
            [
                'name'  => 'subcategory',
                'type'  => 'relationship',
                'label' => 'Subkategoriýa',
                'relationship_column' => 'name_tm',
            ],
            [
                'name'  => 'brand',
                'type'  => 'relationship',
                'label' => 'Brand',
                'relationship_column' => 'name_tm',
            ],
                    ];


    public $fields =
        [
            [
                'name' => 'id',
                'type' => 'select_product',
                'model' => 'App\\Models\\Product'
            ],
            [
                'name'  => 'brandId',
                'type'  => 'select',
                'label' => 'Brand saýlaň',
                'model' => 'App\\Models\\Brand',
                'relation_column' => 'name_tm',
            ],
            [
                'name' => 'slug',
                'type' => 'text',
                'label' => 'Slug'
            ],
            [
                'name' => 'images',
                'type' => 'upload_multiple',
                'label' => 'Suraty'
            ],
            [
                'name'  => 'name_tm',
                'type'  => 'text',
                'label' => 'Ady Tm'
            ],
            [
                'name'  => 'name_ru',
                'type'  => 'text',
                'label' => 'Ady Ru'
            ],
            [
                'name'  => 'name_en',
                'type'  => 'text',
                'label' => 'Ady En'
            ],
            [
                'name'  => 'quantity',
                'type'  => 'double',
                'label' => 'Haryt Sany'
            ],
            [
                'name'  => 'price',
                'type'  => 'text',
                'label' => 'Register TMT Bahasy'
            ],
            [
                'name'  => 'price_usd',
                'type'  => 'text',
                'label' => 'Register USD Bahasy'
            ],
            [
                'name'  => 'specificprice_tm',
                'type'  => 'text',
                'label' => 'Optom(Ussa) TMT Bahasy'
            ],
            [
                'name'  => 'specificprice_usd',
                'type'  => 'text',
                'label' => 'Optom(Ussa) USD Bahasy'
            ],
            [
                'name'  => 'guestPrice',
                'type'  => 'text',
                'label' => 'Guest Bahasy'
            ],
            
            [
                'name'  => 'guestDiscount',
                'type'  => 'text',
                'label' => 'Guest Arzanladyş'
            ],
            [
                'name'  => 'isNew_tm',
                'type'  => 'isNew',
                'label' => 'Täze'
            ],
            [
                'name'  => 'isNew_ru',
                'type'  => 'isNew_ru',
                'label' => 'Новинки'
            ],
            [
                'name'  => 'isNew_en',
                'type'  => 'isNew_en',
                'label' => 'New'
            ],
            [
                'name'  => 'code',
                'type'  => 'text',
                'label' => 'Code'
            ],
            [
                'name'  => 'description_tm',
                'type'  => 'textarea',
                'label' => 'Barada Tm'
            ],
            [
                'name'  => 'description_ru',
                'type'  => 'textarea',
                'label' => 'Barada Ru'
            ],
            [
                'name'  => 'description_en',
                'type'  => 'textarea',
                'label' => 'Barada En'
            ],
        ];

    public $name = 'product';
    public $searchColumns = ['name_tm', 'name_ru','name_en'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new Product();

        return view('admin.crud.list')->with('columns', $this->columns)->with('name', $this->name)->with('data', $data)->with('searchColumns', $this->searchColumns)->with('export', 'product.export')->with('import', 'product.import');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.crud.create')->with('fields', $this->fields)->with('name', $this->name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request)
    {

        $images = [];
        if ($request->subsubcategoryId) {
            $attributes = Attribute::where('subsubcategoryId', $request->subsubcategoryId)->get();
        } else if ($request->subcategoryId) {
            if (Subcategory::find($request->subcategoryId)->subsubcategories->count() == 0) {
                $attributes = Attribute::where('subcategoryId', $request->subcategoryId)->get();
            } else {
                return redirect()->back()->withErrors([trans('select_subsubcategory')]);
            }
        } else if ($request->categoryId) {
            if (Category::find($request->categoryId)->subcategories->count() == 0) {
                $attributes = Attribute::where('categoryId', $request->categoryId)->get();
            } else {
                return redirect()->back()->withErrors([trans('select_subcategory')]);
            }
        }
        foreach ($request->images as $key => $image) {
            $filename = $image->hashName();

            $image->storeAs('/images/products/', $filename, 'public');
            $images[$key] = [
                'image' => url('storage/images/products/'.$filename),
                'filename' => $filename
            ];
        }

            $product = Product::create([
                'name_tm' => $request->name_tm,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'images' => $images,
                'slug' => $request->slug,
                'description_tm' => $request->description_tm,
                'description_ru' => $request->description_ru,
                'description_en' => $request->description_en,
                'price' => $request->price,
                'discount_price' => $request->price,
                'guestPrice' => $request->guestPrice,
                'guestDiscount' => $request->guestDiscount,
                'price_usd' => $request->price_usd,
                'specificprice_tm' => $request->specificprice_tm,
                'specificprice_usd' => $request->specificprice_usd,
                'isNew_tm' => $request->isNew_tm,
                'advice' => $request->advice,
                'stock' => $request->stock,
                'isNew_ru' => $request->isNew_ru,
                'categoryId' => $request->categoryId,
                'subcategoryId' => $request->subcategoryId,
                'subsubcategoryId' => $request->subsubcategoryId,
                'brandId' => $request->brandId,
                'pacetId' => $request->pacetId,
                'unitId' => $request->unitId,
                'code' => $request->code,
                'variation_difference' => $request->variation_difference,
                'quantity' => $request->quantity,
                'searchText' => $request->name_tm . $request->name_ru . $request->description_tm . $request->description_ru,
                ]);
            foreach ($attributes as $attribute) {
                if ($request->has('attribute-'.$attribute->id)) {
                    if ($request['attribute-'.$attribute->id]) {
                        Product::create([
                            'attributeId' => $attribute->id,
                            'attributeValueId' => $request['attribute-'.$attribute->id],
                            
                        ]);
                    }
                }
            }

                if ($request->variationId) {
                    $variationProduct = Product::find($request->variationId);
                    if ($variationProduct->variationGroupId) {
                        $product->update([
                            'variationGroupId' => $variationProduct->variationGroupId,
                        ]);
                    } else {
                        $variationGroup = VariationGroup::create([

                        ]);
                        $product->update(['variationGroupId' => $variationGroup->id]);
                        $variationProduct->update(['variationGroupId' => $variationGroup->id]);
                    }
                }
             return redirect()->route('product.index')->with('message', trans('message.successfully_added', ['name' => trans('message.'.$this->name)]));

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.crud.view')->with('name', $this->name)->with('data', Product::find($id))->with('columns', $this->showColumns);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.crud.edit')->with('fields', $this->fields)->with('name', $this->name)->with('data', Product::find($id));
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
            'description_tm' => 'required',
            'description_ru' => 'required',
            'description_en' => 'required',
            'categoryId' => 'required',
            'slug' => 'required|unique:products,slug,'.$id
        ],
            [
                'name_tm.required' => 'Ady Tm meýdançasyny dolduryň',
                'name_en.required' => 'Ady En meýdançasyny dolduryň',
                'name_ru.required' => 'Ady Ru meýdançasyny dolduryň',
                'description_tm.required' => 'Barada Tm meýdançasyny dolduryň',
                'description_ru.required' => 'Barada Ru meýdançasyny dolduryň',
                'description_en.required' => 'Barada En meýdançasyny dolduryň',
                'categoryId.required' => 'Kategoriýa saýlaň',
            ]);
        
        $photos = explode(',', $request->photos);
        if (!$request->photos && !$request->images) {
            return redirect()->back()->withErrors(['Surat saýlaň!']);
        }
        $product = Product::find($id);
        $oldImages = $product->images;
        $images = [];
        if($oldImages != null){
            foreach ($oldImages as $image) {
                if (!in_array($image['filename'], $photos)) {
                    Storage::disk('public')->delete('images/products/'.$image['filename']);
                } else {
                    array_push($images, ['image' => url('storage/images/products/'.$image['filename']), 'filename' => $image['filename']]);
                }
            }
        }


        if ($request->images) {
            foreach ($request->images as $key => $image) {
                $filename = $image->hashName();
                $image->storeAs('/images/products/', $filename, 'public');
                array_push($images, [
                    'image' => url('storage/images/products/'.$filename),
                    'filename' => $filename
                ]);
            }
        }

        $product->update([
            'name_tm' => $request->name_tm,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'images'  => $images,
            'slug' => $request->slug,
            'description_tm' => $request->description_tm,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'categoryId' => $request->categoryId,
            'price' => $request->price,
            'guestPrice' => $request->guestPrice,
            'guestDiscount' => $request->guestDiscount,
            'price_usd' => $request->price_usd,
            'specificprice_tm' => $request->specificprice_tm,
            'specificprice_usd' => $request->specificprice_usd,
            'isNew_tm' => $request->isNew_tm,
            'advice' => $request->advice,
            'stock' => $request->stock,
            'isNew_ru' => $request->isNew_ru,
            'subcategoryId' => $request->subcategoryId,
            'subsubcategoryId' => $request->subsubcategoryId,
            'brandId' => $request->brandId,
            'pacetId' => $request->pacetId,
            'unitId' => $request->unitId,
            'code' => $request->code,
            'quantity' => $request->quantity,
            'variation_difference' => $request->variation_difference,
            'searchText' => $request->name_tm . $request->name_ru . $request->description_tm . $request->description_ru,
        ]);
       
        return redirect()->route('product.index')->with('message', trans('message.successfully_updated', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if($product->images != null){
            foreach ($product->images as $image) {
                Storage::disk('public')->delete('images/products/'.$image['filename']);
            }
        }
        $product->specifications()->delete();
        if ($product->variationGroupId) {
            if ($group = VariationGroup::find($product->variationGroupId)->products->count() === 1) {
                $product->delete();
                $group->delete();
            }
        } else {
            $product->delete();
        }

        return response()->json(
            [
                'message'=> trans('message.successfully_deleted', ['name' => trans('message.'.$this->name)])
            ]
        );
    }

    public function export () {
        return Excel::download(new ProductExport, 'products.xlsx');
    }
    public function import (Request $request) {

        Excel::import(new ProductImportSheets,  $request->file('importFile'));
        return redirect()->route('product.index')->with('message', trans('message.successfully_imported'));
    }

    public function status(Request $request) {
        if ($request->status == 'true') {
            Product::find($request->id)->update([
                'status' => 'approved'
            ]);
        } else {
            Product::find($request->id)->update([
                'status' => 'unapproved'
            ]);
        }
        return response()->json([
            'message' => 'success'
        ],200);
    }
}

