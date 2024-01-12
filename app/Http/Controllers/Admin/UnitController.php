<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UnitRequest;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UnitController extends Controller
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
                'name'  => 'shortName_tm',
                'type'  => 'text',
                'label' => 'Gysga Ady Tm'
            ],
            [
                'name'  => 'shortName_ru',
                'type'  => 'text',
                'label' => 'Gysga Ady Ru'
            ],
        ];
    public $fields =
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
                'name'  => 'shortName_tm',
                'type'  => 'text',
                'label' => 'Gysga Ady Tm'
            ],
            [
                'name'  => 'shortName_ru',
                'type'  => 'text',
                'label' => 'Gysga Ady Ru'
            ],
        ];
    public $name = 'unit';
    public $searchColumns = ['name_tm', 'name_ru'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = new Unit();

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
    public function store(UnitRequest $request)
    {
        Unit::create([
            'name_tm' => $request->name_tm,
            'name_ru' => $request->name_ru,
            'shortName_tm' => $request->shortName_tm,
            'shortName_ru' => $request->shortName_ru,
        ]);
        return redirect()->route('unit.index')->with('message', trans('message.successfully_added', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        return view('admin.crud.view')->with('name', $this->name)->with('data', Unit::find($id))->with('columns', $this->showColumns);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        return view('admin.crud.edit')->with('fields', $this->fields)->with('name', $this->name)->with('data', Unit::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UnitRequest $request, $id)
    {

        $unit = Unit::find($id);
            $unit->update([
            'name_tm' => $request->name_tm,
            'name_ru' => $request->name_ru,
            'shortName_tm' => $request->shortName_tm,
            'shortName_ru' => $request->shortName_ru,
            ]);
        return redirect()->route('unit.index')->with('message', trans('message.successfully_updated', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();


        return response()->json(
            [
                'message'=> trans('message.successfully_deleted', ['name' => trans('message.'.$this->name)])
            ]
        );
    }
}
