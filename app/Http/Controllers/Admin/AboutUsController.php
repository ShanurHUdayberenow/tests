<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsRequest;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public $columns =
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
                'name'  => 'image',
                'type'  => 'image',
                'label' => 'Suraty'
            ],
        ];
    public $showColumns =
        [
            [
                'name'  => 'image',
                'type'  => 'image',
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
                'name'  => 'description_tm',
                'type'  => 'textarea',
                'label' => 'Barada Tm'
            ],
            [
                'name'  => 'description_ru',
                'type'  => 'textarea',
                'label' => 'Barada Ru'
            ],
        ];
    public $fields =
        [
            [
                'name'  => 'image',
                'type'  => 'image',
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
                'name'  => 'description_tm',
                'type'  => 'textarea',
                'label' => 'Barada Tm'
            ],
            [
                'name'  => 'description_ru',
                'type'  => 'textarea',
                'label' => 'Barada Ru'
            ],
        ];
    public $name = 'aboutUs';
    public $searchColumns = ['name_tm', 'name_ru'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = new AboutUs();

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
    public function store(AboutUsRequest $request)
    {
        $filename = time() . '.' . $request->image->extension();

        $request->image->storeAs('images/banners/',$filename, 'public');
        $image_name = url('storage/images/banners/'.$filename);
        AboutUs::create([
            'name_tm' => $request->name_tm,
            'name_ru' => $request->name_ru,
            'description_tm' => $request->description_tm,
            'description_ru' => $request->description_ru,
            'image' => $image_name,
            'file_name' => $filename
        ]);
        return redirect()->route('aboutUs.index')->with('message', trans('message.successfully_added', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        return view('admin.crud.view')->with('name', $this->name)->with('data', AboutUs::find($id))->with('columns', $this->showColumns);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        return view('admin.crud.edit')->with('fields', $this->fields)->with('name', $this->name)->with('data', AboutUs::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AboutUsRequest $request, $id)
    {

        $aboutUs = AboutUs::find($id);
        if ($request->image) {
            Storage::disk('public')->delete('/images/banners/'.$banner->file_name);
        $filename = time() . '.' . $request->image->extension();

        $request->image->storeAs('images/banners/',$filename, 'public');
        $image_name = url('storage/images/banners/'.$filename);
            $aboutUs->update([
                'name_tm' => $request->name_tm,
                'name_ru' => $request->name_ru,
                'description_tm' => $request->description_tm,
                'description_ru' => $request->description_ru,
                'image' => $image_name,
                'file_name' => $filename
            ]);
        } else {
            $aboutUs->update([
                'name_tm' => $request->name_tm,
                'name_ru' => $request->name_ru,
                'description_tm' => $request->description_tm,
                'description_ru' => $request->description_ru,
            ]);
        }
        return redirect()->route('aboutUs.index')->with('message', trans('message.successfully_updated', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        $aboutUs->delete();


        return response()->json(
            [
                'message'=> trans('message.successfully_deleted', ['name' => trans('message.'.$this->name)])
            ]
        );
    }
}
