<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
        public $columns =
        [
            [
                'name' => 'image',
                'type' => 'image',
                'label' => 'Surat'
            ],
            [
                'name'  => 'link',
                'type'  => 'text',
                'label' => 'Link'
            ]
        ];
    public $showColumns =
        [
            [
                'name' => 'image',
                'type' => 'image',
                'label' => 'Surat'
            ],
            [
                'name'  => 'link',
                'type'  => 'text',
                'label' => 'Link'
            ]
        ];
    public $fields =
        [
            [
                'name' => 'image',
                'type' => 'image',
                'label' => 'Surat'
            ],
            [
                'name'  => 'link',
                'type'  => 'text',
                'label' => 'Link'
            ]
        ];
    public $name = 'banner';
    public $searchColumns = ['image'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new Banner();

        return view('admin.crud.list')->with('columns', $this->columns)->with('name', $this->name)->with('data', $data)->with('searchColumns', $this->searchColumns);
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
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $filename = time() . '.' . $request->image->extension();

        $request->image->storeAs('images/banners/',$filename, 'public');
        $image_name = url('storage/images/banners/'.$filename);


        Banner::create([
            'link' => $request->link,
            'image' => $image_name,
            'file_name' => $filename,
        ]);
        return redirect()->route('banner.index')->with('message', trans('message.successfully_added', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.crud.view')->with('name', $this->name)->with('data', Banner::find($id))->with('columns', $this->showColumns);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.crud.edit')->with('fields', $this->fields)->with('name', $this->name)->with('data', Banner::find($id));
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
        $banner = Banner::find($id);
        if ($request->image) {
            Storage::disk('public')->delete('/images/banners/'.$banner->file_name);
        $filename = time() . '.' . $request->image->extension();

        $request->image->storeAs('images/banners/',$filename, 'public');
        $image_name = url('storage/images/banners/'.$filename);

            $banner->update([
                'link' => $request->link,
                'image' => $image_name,
                'file_name' => $filename
            ]);
        } else {
            $banner->update([
                'link' => $request->link
            ]);
        }
        return redirect()->route('banner.index')->with('message', trans('message.successfully_updated', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        Storage::disk('public')->delete('/images/banners/'.$banner->file_name);
        $banner->delete();


        return response()->json(
            [
                'message'=> trans('message.successfully_deleted', ['name' => trans('message.'.$this->name)])
            ]
        );
    }
}
