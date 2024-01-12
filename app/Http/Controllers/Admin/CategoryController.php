<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\CategoryExport;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
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
                'name'  => 'number',
                'type'  => 'double',
                'label' => 'Number'
            ],
            [
                'name'  => 'status_switch',
                'type'  => 'switch',
                'label' => 'Tassyklamak',
                'request_url' => 'admin/category/status'
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
                'name'  => 'slug',
                'type'  => 'text',
                'label' => 'Slug'
            ],
            [
                'name'  => 'number',
                'type'  => 'double',
                'label' => 'Number'
            ],
        ];
    public $fields =
        [
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
                'name'  => 'slug',
                'type'  => 'text',
                'label' => 'Slug'
            ],
            [
                'name'  => 'number',
                'type'  => 'double',
                'label' => 'Number'
            ],
        ];
    public $name = 'category';
    public $searchColumns = ['name_tm', 'name_ru','name_en'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = new Category();
        $category = new Category();

        return view('admin.crud.list')->with('columns', $this->columns)->with('name', $this->name)->with('data', $data)->with('searchColumns', $this->searchColumns)->with('export', 'category.export')->with('category', $category);
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
    public function store(CategoryRequest $request)
    {

        $images = [];
        $count = count($request->images);
        if($count == '2'){
        foreach ($request->images as $key => $image) {
            $filename = $image->hashName();

            $image->storeAs('/images/products/', $filename, 'public');
            $images[$key] = [
                'image' => url('storage/images/products/'.$filename),
                'filename' => $filename
            ];
        }
        } else {
             return redirect()->back()->withErrors(['Surat ikiden az ýa-da köp bolmaly däl']);
        }

            $category = Category::create([
                'name_tm' => $request->name_tm,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'images' => $images,
                'slug' => $request->slug,
                'number' => $request->number,
            ]);
        return redirect()->route('category.index')->with('message', trans('message.successfully_added', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        return view('admin.crud.view')->with('name', $this->name)->with('data', Category::find($id))->with('columns', $this->showColumns);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        return view('admin.crud.edit')->with('fields', $this->fields)->with('name', $this->name)->with('data', Category::find($id));
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
            'slug' => 'required|unique:products,slug,'.$id
        ],
            [
                'name_tm.required' => 'Ady Tm meýdançasyny dolduryň',
                'name_en.required' => 'Ady En meýdançasyny dolduryň',
                'name_ru.required' => 'Ady Ru meýdançasyny dolduryň',
            ]);
        $photos = explode(',', $request->photos);
        if (!$request->photos && !$request->images) {
            return redirect()->back()->withErrors(['Surat saýlaň!']);
        }
        $category = Category::find($id);
        $oldImages = $category->images;
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
        $count = count($request->images);
        if($count == '2'){
                foreach ($request->images as $key => $image) {
                    $filename = $image->hashName();
                    $image->storeAs('/images/products/', $filename, 'public');
                    array_push($images, [
                        'image' => url('storage/images/products/'.$filename),
                        'filename' => $filename
                    ]);
                }
            }
            else {
                return redirect()->back()->withErrors(['Surat ikiden az ýa-da köp bolmaly däl']);
            }
        }
        $category->update([
            'name_tm' => $request->name_tm,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'images'  => $images,
            'slug' => $request->slug,
            'number' => $request->number,

        ]);
        return redirect()->route('category.index')->with('message', trans('message.successfully_updated', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        Storage::disk('public')->delete('/images/categories/'.$category->file_name);
        $category->delete();


        return response()->json(
            [
                'message'=> trans('message.successfully_deleted', ['name' => trans('message.'.$this->name)])
            ]
        );
    }

    public function export () {
        return Excel::download(new CategoryExport, 'categories.xlsx');
    }

    public function status(Request $request) {
        if ($request->status == 'true') {
            Category::find($request->id)->update([
                'status' => 'approved'
            ]);
        } else {
            Category::find($request->id)->update([
                'status' => 'unapproved'
            ]);
        }
        return response()->json([
            'message' => 'success'
        ],200);
    }



}
