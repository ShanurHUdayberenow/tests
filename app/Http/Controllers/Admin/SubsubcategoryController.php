<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Requests\SubsubcategoryRequest;
use App\Models\Subsubcategory;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class SubsubcategoryController extends Controller
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
                'name'  => 'image',
                'type'  => 'image',
                'label' => 'Surat'
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
                'name'  => 'slug',
                'type'  => 'text',
                'label' => 'Slug'
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

            ]
        ];
    public $fields =
        [

            [
                'name'  => 'subcategoryId',
                'type'  => 'select',
                'label' => 'Subkategoriýany saýlaň',
                'model' => 'App\\Models\\Subcategory',
                'relation_column' => 'name_tm'
            ],

            [
                'name' => 'image',
                'type' => 'image',
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
                'name'  => 'slug',
                'type'  => 'text',
                'label' => 'Slug'
            ],



        ];
    public $name = 'subsubcategory';
    public $searchColumns = ['name_tm', 'name_ru'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = new Subsubcategory();

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
    public function store(SubsubcategoryRequest $request)
    {


        $filename = time() . '.' . $request->image->extension();

        $request->image->storeAs('images/subsubcategories/',$filename, 'public');
        $image_name = url('storage/images/subsubcategories/'.$filename);

        Subsubcategory::create([
            'name_tm' => $request->name_tm,
            'image' => $image_name,
            'slug' => $request->slug,
            'name_ru' => $request->name_ru,
            'file_name' => $filename,
            'categoryId' => Subcategory::find($request->subcategoryId)->categoryId,
            'subcategoryId' => $request->subcategoryId
        ]);
        return redirect()->route('subsubcategory.index')->with('message', trans('message.successfully_added', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        return view('admin.crud.view')->with('name', $this->name)->with('data', Subsubcategory::find($id))->with('columns', $this->showColumns);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        return view('admin.crud.edit')->with('fields', $this->fields)->with('name', $this->name)->with('data', Subsubcategory::find($id));
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
            'slug' => ['required', \Illuminate\Validation\Rule::unique('subsubcategories')->ignore($id)],
            'name_tm' => 'required',
            'name_ru' => 'required',
        ],
            [
                'slug.unique' => 'Slug gaýtalanmaly däl',
                'name_tm.required' => 'Ady Tm meýdançasyny dolduryň',
                'name_ru.required' => 'Ady Ru meýdançasyny dolduryň',
                'slug.required' => 'Slug meýdançasyny dolduryň',
            ]);

        $subsubcategory = Subsubcategory::find($id);
        if ($request->image) {
            Storage::disk('public')->delete('/images/subsubcategories/'.$subsubcategory->file_name);
            $filename = time() . '.' . $request->image->extension();

            $request->image->storeAs('images/subsubcategories/',$filename, 'public');
            $image_name = url('storage/images/subsubcategories/'.$filename);

            $subsubcategory->update([
                'name_tm' => $request->name_tm,
                'image' => $image_name,
                'slug' => $request->slug,
                'name_ru' => $request->name_ru,
                'file_name' => $filename,
                'categoryId' => Subcategory::find($request->subcategoryId)->categoryId,
                'subcategoryId' => $request->subcategoryId
            ]);
        } else {
            $subsubcategory->update([
                'name_tm' => $request->name_tm,
                'name_ru' => $request->name_ru,
                'slug' => $request->slug,
                'categoryId' => Subcategory::find($request->subcategory)->categoryId,
                'subcategoryId' => $request->subcategoryId
            ]);
        }
        return redirect()->route('subsubcategory.index')->with('message', trans('message.successfully_updated', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $subsubcategory = Subsubcategory::findOrFail($id);
        Storage::disk('public')->delete('/images/subsubcategories/'.$subsubcategory->file_name);
        $subsubcategory->delete();


        return response()->json(
            [
                'message'=> trans('message.successfully_deleted', ['name' => trans('message.'.$this->name)])
            ]
        );
    }
}
