<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RateRequest;
use App\Models\Rate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RateController extends Controller
{
    public $columns =
        [
            [
                'name'  => 'rate',
                'type'  => 'text',
                'label' => 'Hümmeti',
            ],
            [
                'name'  => 'date',
                'type'  => 'date',
                'label' => 'Senesi',
            ],
        ];
    public $showColumns =
        [
            [
                'name'  => 'date',
                'type'  => 'date',
                'label' => 'Senesi'
            ],
            [
                 'name'  => 'rate',
                 'type'  => 'double',
                 'label' => 'Hümmeti'
            ]
        ];
    public $fields =
        [
            [
                 'name'  => 'rate',
                 'type'  => 'double',
                 'label' => 'Hümmeti'
            ]
        ];
    public $name = 'rate';
    public $searchColumns = ['date', 'rate'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = new Rate();

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
    public function store(RateRequest $request)
    {
        Rate::create([
            'date' => Carbon::now(),
            'rate' => $request->rate
        ]);
        return redirect()->route('rate.index')->with('message', trans('message.successfully_added', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        return view('admin.crud.view')->with('name', $this->name)->with('data', Rate::find($id))->with('columns', $this->showColumns);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        return view('admin.crud.edit')->with('fields', $this->fields)->with('name', $this->name)->with('data', Rate::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RateRequest $request, $id)
    {

        $rate = Rate::find($id);
            $rate->update([
            'date' => Carbon::now(),
            'rate' => $request->rate
            ]);
        return redirect()->route('rate.index')->with('message', trans('message.successfully_updated', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $rate = Rate::findOrFail($id);
        $rate->delete();


        return response()->json(
            [
                'message'=> trans('message.successfully_deleted', ['name' => trans('message.'.$this->name)])
            ]
        );
    }
}
