<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SubcategoryRequest;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Exports\SubCategoryExport;
use Maatwebsite\Excel\Facades\Excel;
class SubcategoryController extends Controller
{
    public $columns =
        [
            [
                'name'  => 'id',
                'type'  => 'double',
                'label' => 'Id'
            ],
            [
                'name'  => 'name_tm',
                'type'  => 'text',
                'label' => 'Ady'
            ],
            [
                'name'  => 'status_switch',
                'type'  => 'switch',
                'label' => 'Tassyklamak',
                'request_url' => 'admin/subcategory/status'
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
                'name'  => 'name_en',
                'type'  => 'text',
                'label' => 'Ady En'
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
                'relationship_column' => 'name_tm'
            ]
        ];
    public $fields =
        [
            [
                'name' => 'image',
                'type' => 'image',
                'label' => 'Suraty'
            ],
            [
                'name'  => 'categoryId',
                'type'  => 'select',
                'label' => 'Kategoriýany saýlaň',
                'model' => 'App\\Models\\Category',
                'relation_column' => 'name_tm'
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
                'name'  => 'slug',
                'type'  => 'text',
                'label' => 'Slug'
            ],
            

        ];
    public $name = 'subcategory';
    public $searchColumns = ['name_tm', 'name_ru','name_en'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = new Subcategory();

        return view('admin.crud.list')->with('columns', $this->columns)->with('name', $this->name)->with('data', $data)->with('searchColumns', $this->searchColumns)->with('export', 'subcategory.export');
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
    public function store(SubcategoryRequest $request)
    {


        $filename = time() . '.' . $request->image->extension();

        $request->image->storeAs('images/subcategories/',$filename, 'public');
        $image_name = url('storage/images/subcategories/'.$filename);

        Subcategory::create([
            'name_tm' => $request->name_tm,
            'image' => $image_name,
            'slug' => $request->slug,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'file_name' => $filename,
            'categoryId' => $request->categoryId
        ]);
        return redirect()->route('subcategory.index')->with('message', trans('message.successfully_added', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        return view('admin.crud.view')->with('name', $this->name)->with('data', Subcategory::find($id))->with('columns', $this->showColumns);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        return view('admin.crud.edit')->with('fields', $this->fields)->with('name', $this->name)->with('data', Subcategory::find($id));
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
            'slug' => ['required', \Illuminate\Validation\Rule::unique('subcategories')->ignore($id)],
            'name_tm' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required',
        ],
            [
                'slug.unique' => 'Slug gaýtalanmaly däl',
                'name_tm.required' => 'Ady Tm meýdançasyny dolduryň',
                'name_ru.required' => 'Ady Ru meýdançasyny dolduryň',
                'name_en.required' => 'Ady En meýdançasyny dolduryň',
                'slug.required' => 'Slug meýdançasyny dolduryň',
            ]);

        $subcategory = Subcategory::find($id);
        if ($request->image) {
            Storage::disk('public')->delete('/images/subcategories/'.$subcategory->file_name);
            $filename = time() . '.' . $request->image->extension();

            $request->image->storeAs('images/subcategories/',$filename, 'public');
            $image_name = url('storage/images/subcategories/'.$filename);

            $subcategory->update([
                'name_tm' => $request->name_tm,
                'image' => $image_name,
                'slug' => $request->slug,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'file_name' => $filename,
                'categoryId' => $request->categoryId
            ]);
        } else {
            $subcategory->update([
                'name_tm' => $request->name_tm,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'slug' => $request->slug,
                'categoryId' => $request->categoryId
            ]);
        }
        return redirect()->route('subcategory.index')->with('message', trans('message.successfully_updated', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        Storage::disk('public')->delete('/images/subcategories/'.$subcategory->file_name);
        $subcategory->delete();


        return response()->json(
            [
                'message'=> trans('message.successfully_deleted', ['name' => trans('message.'.$this->name)])
            ]
        );
    }

    public function export () {
        return Excel::download(new SubCategoryExport, 'subcategories.xlsx');
    }

    public function status(Request $request) {
        if ($request->status == 'true') {
            Subcategory::find($request->id)->update([
                'status' => 'approved'
            ]);
        } else {
            Subcategory::find($request->id)->update([
                'status' => 'unapproved'
            ]);
        }
        return response()->json([
            'message' => 'success'
        ],200);
    }
}
