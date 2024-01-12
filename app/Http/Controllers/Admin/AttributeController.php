<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Http\Request;
use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use Illuminate\Support\Facades\Storage;

class AttributeController extends Controller
{
    public $columns =
        [
            [
                'name'  => 'name_tm',
                'type'  => 'text',
                'label' => 'Ady'
            ],
        ];
    public $showColumns =
        [

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
                'name'  => 'category',
                'type'  => 'relationship',
                'label' => 'Kategoriýa',
                'relationship_column' => 'name_tm'
            ],
            [
                'name'  => 'subcategory',
                'type'  => 'relationship',
                'label' => 'Subkategoriýa',
                'relationship_column' => 'name_tm'
            ],
            [
                'name'  => 'subsubcategory',
                'type'  => 'relationship',
                'label' => 'Subsubkategoriýa',
                'relationship_column' => 'name_tm'
            ],
            [
                'name'  => 'brand',
                'type'  => 'relationship',
                'label' => 'Brand',
                'relationship_column' => 'name_tm'
            ],
            [
                'name' => 'values',
                'type' => 'relationship_many',
                'label' => 'Attribute values',
                'relation_column' => 'value_tm'
            ]
        ];
    public $fields =
        [
            [
                'name' => 'id',
                'type' => 'select_category',
                'model' => 'App\\Models\\Attribute'
            ],
            [
                'name'  => 'brandId',
                'type'  => 'select',
                'label' => 'Brand saýlaň',
                'model' => 'App\\Models\\Brand',
                'relation_column' => 'name_tm',
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
                'name'            => 'values',
                'type'            => 'repeatable',
                'label'           => 'Value',
                'title'           => 'Attribute values',
                'fields' => [
                    [
                        'name'  => 'value_tm',
                        'label' => 'Value Tm'
                    ],
                    [
                        'name'  => 'value_ru',
                        'label' => 'Value Ru'
                    ],
                ],
            ]

        ];
    public $name = 'attribute';
    public $searchColumns = ['name_tm', 'name_ru'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = new Attribute();

        return view('admin.crud.list')->with('columns', $this->columns)->with('name', $this->name)->with('data', $data)->with('searchColumns', $this->searchColumns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
    public function store(AttributeRequest $request)
    {

        $categoryId = $request->categoryId;
        $subcategoryId = $request->subcategoryId;
        $subsubcategoryId = $request->subsubcategoryId;

        if (!$subcategoryId && Category::find($categoryId)->subcategories->count() > 0) {
            return redirect()->back()->withErrors([
                trans('message.select_subcategory')
            ]);
        }
        if (!$subsubcategoryId && Subcategory::find($subcategoryId)->subsubcategories->count() > 0) {
            return redirect()->back()->withErrors(
                [trans('message.select_subsubcategory')]
            );
        }


        $attribute = Attribute::create([
            'name_tm'           => $request->name_tm,
            'name_ru'           => $request->name_ru,
            'categoryId'        => $categoryId,
            'subcategoryId'     => $subcategoryId,
            'subsubcategoryId'  => $subsubcategoryId,
            'brandId' => $request->brandId,
        ]);
        foreach (json_decode($request->values) as $item) {

            AttributeValue::create([
                'value_tm' => $item->value_tm,
                'value_ru' => $item->value_ru,
                'attributeId' => $attribute->id
            ]);
        }
        return redirect()->route('attribute.index')->with('message', trans('message.successfully_added', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        return view('admin.crud.view')->with('name', $this->name)->with('data', Attribute::find($id))->with('columns', $this->showColumns);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        return view('admin.crud.edit')->with('fields', $this->fields)->with('name', $this->name)->with('data', Attribute::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AttributeRequest $request, $id)
    {
        $attribute = Attribute::find($id);
        $categoryId = $request->categoryId;
        $subcategoryId = $request->subcategoryId;
        $subsubcategoryId = $request->subsubcategoryId;

        if (!$subcategoryId && Category::find($categoryId)->subcategories->count() > 0) {
            return redirect()->back()->withErrors([
                trans('message.select_subcategory')
            ]);
        }
        if (!$subsubcategoryId && Subcategory::find($subcategoryId)->subsubcategories->count() > 0) {
            return redirect()->back()->withErrors(
                [trans('message.select_subsubcategory')]
            );
        }

        $attribute->update([
            'name_tm'           => $request->name_tm,
            'name_ru'           => $request->name_ru,
            'categoryId'        => $categoryId,
            'subcategoryId'     => $subcategoryId,
            'subsubcategoryId'  => $subsubcategoryId,
            'brandId' => $request->brandId,
        ]);
        $attribute->values()->delete();
        foreach (json_decode($request->values) as $item) {

            AttributeValue::create([
                'value_tm' => $item->value_tm,
                'value_ru' => $item->value_ru,
                'attributeId' => $attribute->id
            ]);
        }

        return redirect()->route('attribute.index')->with('message', trans('message.successfully_updated', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->values()->delete();
        $attribute->delete();

        return response()->json(
            [
                'message'=> trans('message.successfully_deleted', ['name' => trans('message.'.$this->name)])
            ]
        );
    }
}
