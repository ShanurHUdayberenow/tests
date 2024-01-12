<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorSettingRequest;
use App\Models\ColorSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ColorSettingController extends Controller
{
    public $columns =
        [
            [
                'name'  => 'color_navbar',
                'type'  => 'color_setting',
                'label' => 'Menu Reňki',
            ],
            [
                'name'  => 'color_category1',
                'type'  => 'color_setting',
                'label' => 'Kategoriýa Reňki 1',
            ],
            [
                'name'  => 'color_category2',
                'type'  => 'color_setting',
                'label' => 'Kategoriýa Reňki 2',
            ],
            [
                'name'  => 'color_category_menu',
                'type'  => 'color_setting',
                'label' => 'Menu Kategoriýa Reňki',
            ],
            [
                'name'  => 'color_search1',
                'type'  => 'color_setting',
                'label' => 'Gözleg Knopkasy Reňki',
            ],
            [
                'name'  => 'color_search2',
                'type'  => 'color_setting',
                'label' => 'Gözleg Knopkasy Hover Reňki',
            ],
            [
                'name'  => 'color_cart',
                'type'  => 'color_setting',
                'label' => 'Sebet Knopkasy Hover Reňki',
            ],
            [
                'name'  => 'color_product',
                'type'  => 'color_setting',
                'label' => 'Haryt Ady Reňki',
            ],
            [
                'name'  => 'color_footer',
                'type'  => 'color_setting',
                'label' => 'Footer Reňki',
            ],
        ];
    public $showColumns =
        [
            [
                'name'  => 'color_navbar',
                'type'  => 'color_setting',
                'label' => 'Menu Reňki',
            ],
            [
                'name'  => 'color_category1',
                'type'  => 'color_setting',
                'label' => 'Kategoriýa Reňki 1',
            ],
            [
                'name'  => 'color_category2',
                'type'  => 'color_setting',
                'label' => 'Kategoriýa Reňki 2',
            ],
            [
                'name'  => 'color_category_menu',
                'type'  => 'color_setting',
                'label' => 'Menu Kategoriýa Reňki',
            ],
            [
                'name'  => 'color_search1',
                'type'  => 'color_setting',
                'label' => 'Gözleg Knopkasy Reňki',
            ],
            [
                'name'  => 'color_search2',
                'type'  => 'color_setting',
                'label' => 'Gözleg Knopkasy Hover Reňki',
            ],
            [
                'name'  => 'color_cart',
                'type'  => 'color_setting',
                'label' => 'Sebet Knopkasy Hover Reňki',
            ],
            [
                'name'  => 'color_product',
                'type'  => 'color_setting',
                'label' => 'Haryt Ady Reňki',
            ],
            [
                'name'  => 'color_footer',
                'type'  => 'color_setting',
                'label' => 'Footer Reňki',
            ],
        ];
    public $fields =
        [
            [
                'name'  => 'color_navbar',
                'type'  => 'color_settings',
                'label' => 'Menu Reňki',
            ],
            [
                'name'  => 'color_category1',
                'type'  => 'color_settings',
                'label' => 'Kategoriýa Reňki 1',
            ],
            [
                'name'  => 'color_category2',
                'type'  => 'color_settings',
                'label' => 'Kategoriýa Reňki 2',
            ],
            [
                'name'  => 'color_category_menu',
                'type'  => 'color_settings',
                'label' => 'Menu Kategoriýa Reňki',
            ],
            [
                'name'  => 'color_search1',
                'type'  => 'color_settings',
                'label' => 'Gözleg Knopkasy Reňki',
            ],
            [
                'name'  => 'color_search2',
                'type'  => 'color_settings',
                'label' => 'Gözleg Knopkasy Hover Reňki',
            ],
            [
                'name'  => 'color_cart',
                'type'  => 'color_settings',
                'label' => 'Sebet Knopkasy Hover Reňki',
            ],
            [
                'name'  => 'color_product',
                'type'  => 'color_settings',
                'label' => 'Haryt Ady Reňki',
            ],
            [
                'name'  => 'color_footer',
                'type'  => 'color_settings',
                'label' => 'Footer Reňki',
            ],
        ];
    public $name = 'colorSetting';
    public $searchColumns = ['color_navbar','color_category1'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = new ColorSetting();

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
    public function store(ColorSettingRequest $request)
    {
        ColorSetting::create([
            'color_navbar' => $request->color_navbar,
            'color_category1' => $request->color_category1,
            'color_category2' => $request->color_category2,
            'color_category_menu' => $request->color_category_menu,
            'color_product' => $request->color_product,
            'color_footer' => $request->color_footer,
            'color_search1' => $request->color_search1,
            'color_search2' => $request->color_search2,
            'color_cart' => $request->color_cart,

        ]);
        return redirect()->route('colorSetting.index')->with('message', trans('message.successfully_added', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        return view('admin.crud.view')->with('name', $this->name)->with('data', ColorSetting::find($id))->with('columns', $this->showColumns);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        return view('admin.crud.edit')->with('fields', $this->fields)->with('name', $this->name)->with('data', ColorSetting::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ColorSettingRequest $request, $id)
    {

        $color = ColorSetting::find($id);
            $color->update([
                'color_navbar' => $request->color_navbar,
                'color_category1' => $request->color_category1,
                'color_category2' => $request->color_category2,
                'color_category_menu' => $request->color_category_menu,
                'color_product' => $request->color_product,
                'color_footer' => $request->color_footer,
                'color_search1' => $request->color_search1,
                'color_search2' => $request->color_search2,
                'color_cart' => $request->color_cart,

            ]);
        return redirect()->route('colorSetting.index')->with('message', trans('message.successfully_updated', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $color = ColorSetting::findOrFail($id);
        $color->delete();


        return response()->json(
            [
                'message'=> trans('message.successfully_deleted', ['name' => trans('message.'.$this->name)])
            ]
        );
    }
}
