<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\BrandExport;
use Maatwebsite\Excel\Facades\Excel;

class BrandController extends Controller
{
    public $columns =
        [
            [
                'name'  => 'image',
                'type'  => 'image',
                'label' => 'Surat'
            ],
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
                'request_url' => 'admin/brand/status'
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
                'label' => 'Brand ady Tm'
            ],
            [
                'name'  => 'name_ru',
                'type'  => 'text',
                'label' => 'Brand ady Ru'
            ],
            [
                'name'  => 'name_en',
                'type'  => 'text',
                'label' => 'Brand ady En'
            ],
            [
                'name'  => 'slug',
                'type'  => 'text',
                'label' => 'Slug'
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
                'label' => 'Brand ady Tm'
            ],
            [
                'name'  => 'name_ru',
                'type'  => 'text',
                'label' => 'Brand ady Ru'
            ],
            [
                'name'  => 'name_en',
                'type'  => 'text',
                'label' => 'Brand ady En'
            ],
            [
                'name'  => 'slug',
                'type'  => 'text',
                'label' => 'Slug'
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
    public $name = 'brand';
    public $searchColumns = ['name_tm','name_ru','name_en'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = new Brand();

        return view('admin.crud.list')->with('columns', $this->columns)->with('name', $this->name)->with('data', $data)->with('searchColumns', $this->searchColumns)->with('export', 'brand.export');
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
    public function store(BrandRequest $request)
    {

        $filename = time() . '.' . $request->image->extension();

        $request->image->storeAs('images/brands/',$filename, 'public');
        $image_name = url('storage/images/brands/'.$filename);

        Brand::create([
            'name_tm' => $request->name_tm,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'description_tm' => $request->description_tm,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'slug' => $request->slug,
            'image' => $image_name,
            'file_name' => $filename
        ]);
        return redirect()->route('brand.index')->with('message', trans('message.successfully_added', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        return view('admin.crud.view')->with('name', $this->name)->with('data', Brand::find($id))->with('columns', $this->showColumns);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        return view('admin.crud.edit')->with('fields', $this->fields)->with('name', $this->name)->with('data', Brand::find($id));
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
        $brand = Brand::find($id);
        if ($request->image) {
            Storage::disk('public')->delete('/images/brands/'.$brand->file_name);
            $filename = time() . '.' . $request->image->extension();

            $request->image->storeAs('images/brands/',$filename, 'public');
            $image_name = url('storage/images/brands/'.$filename);

            $brand->update([
                'name_tm' => $request->name_tm,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'description_tm' => $request->description_tm,
                'description_ru' => $request->description_ru,
                'description_en' => $request->description_en,
                'image' => $image_name,
                'slug' => $request->slug,
                'file_name' => $filename
            ]);
        } else {
            $brand->update([
                'name_tm' => $request->name_tm,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'slug' => $request->slug,
            ]);
        }
        return redirect()->route('brand.index')->with('message', trans('message.successfully_updated', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        Storage::disk('public')->delete('/images/brands/'.$brand->file_name);
        $brand->delete();


        return response()->json(
            [
                'message'=> trans('message.successfully_deleted', ['name' => trans('message.'.$this->name)])
            ]
        );
    }

    public function export () {
        return Excel::download(new BrandExport, 'brands.xlsx');
    }

    public function status(Request $request) {
        if ($request->status == 'true') {
            Brand::find($request->id)->update([
                'status' => 'approved'
            ]);
        } else {
            Brand::find($request->id)->update([
                'status' => 'unapproved'
            ]);
        }
        return response()->json([
            'message' => 'success'
        ],200);
    }
}
