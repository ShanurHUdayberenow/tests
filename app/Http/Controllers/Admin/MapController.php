<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MapRequest;
use App\Models\Map;
use Carbon\Carbon;
class MapController extends Controller
{
    public $columns =
        [
            [
                'name'  => 'map',
                'type'  => 'map',
                'label' => 'Karta',
            ],
        ];
    public $showColumns =
        [
            [
                'name'  => 'map',
                'type'  => 'map',
                'label' => 'Karta',
            ],
        ];
    public $fields =
        [
            [
                'name'  => 'map',
                'type'  => 'textarea',
                'label' => 'Karta',
            ],
        ];
    public $name = 'map';
    public $searchColumns = ['map'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = new Map();

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
    public function store(MapRequest $request)
    {
        Map::create([
            'map' => $request->map
        ]);
        return redirect()->route('map.index')->with('message', trans('message.successfully_added', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        return view('admin.crud.view')->with('name', $this->name)->with('data', Map::find($id))->with('columns', $this->showColumns);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        return view('admin.crud.edit')->with('fields', $this->fields)->with('name', $this->name)->with('data', Map::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MapRequest $request, $id)
    {

        $map = Map::find($id);
            $map->update([
            'map' => $request->map
            ]);
        return redirect()->route('map.index')->with('message', trans('message.successfully_updated', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $map = Map::findOrFail($id);
        $map->delete();


        return response()->json(
            [
                'message'=> trans('message.successfully_deleted', ['name' => trans('message.'.$this->name)])
            ]
        );
    }
}
