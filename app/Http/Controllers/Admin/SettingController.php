<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public $columns =
        [
            [
                'name'  => 'mainCurrencyName',
                'type'  => 'text',
                'label' => 'Esasy Pul Birliginiň Ady',
            ],
            [
                'name'  => 'reportCurrencyName',
                'type'  => 'text',
                'label' => 'Hasabat Pul Birliginiň Ady',
            ]
        ];
    public $showColumns =
        [
            [
                'name'  => 'mainCurrencySymbol',
                'type'  => 'text',
                'label' => 'Esasy Pul Birliginiň Symwoly'
            ],
            [
                'name'  => 'mainCurrencyCode',
                'type'  => 'text',
                'label' => 'Esasy Pul Birliginiň Kody'
            ],
            [
                'name'  => 'mainCurrencyName',
                'type'  => 'text',
                'label' => 'Esasy Pul Birliginiň Ady'
            ],
            [
                'name'  => 'mainCurrencyFractionalUnit',
                'type'  => 'text',
                'label' => 'Esasy Pul Birliginiň kiçi birligi'
            ],
            [
                'name'  => 'mainCurrencyFractionalSymbol',
                'type'  => 'text',
                'label' => 'Esasy Pul Birliginiň Kiçi birlik Symwoly'
            ],

            [
                'name'  => 'reportCurrencySymbol',
                'type'  => 'text',
                'label' => 'Hasabat Pul Birliginiň Symwoly'
            ],
            [
                'name'  => 'reportCurrencyCode',
                'type'  => 'text',
                'label' => 'Hasabat Pul Birliginiň Kody'
            ],
            [
                'name'  => 'reportCurrencyName',
                'type'  => 'text',
                'label' => 'Hasabat Pul Birliginiň Ady'
            ],
            [
                'name'  => 'reportCurrencyFractionalUnit',
                'type'  => 'text',
                'label' => 'Hasabat Pul Birliginiň kiçi birligi'
            ],
            [
                'name'  => 'reportCurrencyFractionalSymbol',
                'type'  => 'text',
                'label' => 'Hasabat Pul Birliginiň Kiçi birlik Symboly'
            ]

        ];
    public $fields =
        [
            [
                'name'  => 'mainCurrencySymbol',
                'type'  => 'text',
                'label' => 'Esasy Pul Birliginiň Symwoly'
            ],
            [
                'name'  => 'mainCurrencyCode',
                'type'  => 'text',
                'label' => 'Esasy Pul Birliginiň Kody'
            ],
            [
                'name'  => 'mainCurrencyName',
                'type'  => 'text',
                'label' => 'Esasy Pul Birliginiň Ady'
            ],
            [
                'name'  => 'mainCurrencyFractionalUnit',
                'type'  => 'text',
                'label' => 'Esasy Pul Birliginiň kiçi birligi'
            ],
            [
                'name'  => 'mainCurrencyFractionalSymbol',
                'type'  => 'text',
                'label' => 'Esasy Pul Birliginiň Kiçi birlik Symwoly'
            ],

            [
                'name'  => 'reportCurrencySymbol',
                'type'  => 'text',
                'label' => 'Hasabat Pul Birliginiň Symwoly'
            ],
            [
                'name'  => 'reportCurrencyCode',
                'type'  => 'text',
                'label' => 'Hasabat Pul Birliginiň Kody'
            ],
            [
                'name'  => 'reportCurrencyName',
                'type'  => 'text',
                'label' => 'Hasabat Pul Birliginiň Ady'
            ],
            [
                'name'  => 'reportCurrencyFractionalUnit',
                'type'  => 'text',
                'label' => 'Hasabat Pul Birliginiň kiçi birligi'
            ],
            [
                'name'  => 'reportCurrencyFractionalSymbol',
                'type'  => 'text',
                'label' => 'Hasabat Pul Birliginiň Kiçi birlik Symboly'
            ]
        ];
    public $name = 'setting';
    public $searchColumns = ['mainCurrencyName','reportCurrencyName'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = new Setting();

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
    public function store(SettingRequest $request)
    {
        Setting::create([
            'mainCurrencySymbol' => $request->mainCurrencySymbol,
            'mainCurrencyCode' => $request->mainCurrencyCode,
            'mainCurrencyName' => $request->mainCurrencyName,
            'mainCurrencyFractionalUnit' => $request->mainCurrencyFractionalUnit,
            'mainCurrencyFractionalSymbol' => $request->mainCurrencyFractionalSymbol, 
            'reportCurrencySymbol' => $request->reportCurrencySymbol,
            'reportCurrencyCode' => $request->reportCurrencyCode,
            'reportCurrencyName' => $request->reportCurrencyName,
            'reportCurrencyFractionalUnit' => $request->reportCurrencyFractionalUnit,
            'reportCurrencyFractionalSymbol' => $request->reportCurrencyFractionalSymbol,
        ]);
        return redirect()->route('setting.index')->with('message', trans('message.successfully_added', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        return view('admin.crud.view')->with('name', $this->name)->with('data', Setting::find($id))->with('columns', $this->showColumns);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        return view('admin.crud.edit')->with('fields', $this->fields)->with('name', $this->name)->with('data', Setting::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SettingRequest $request, $id)
    {

        $setting = Setting::find($id);
            $setting->update([
            'mainCurrencySymbol' => $request->mainCurrencySymbol,
            'mainCurrencyCode' => $request->mainCurrencyCode,
            'mainCurrencyName' => $request->mainCurrencyName,
            'mainCurrencyFractionalUnit' => $request->mainCurrencyFractionalUnit,
            'mainCurrencyFractionalSymbol' => $request->mainCurrencyFractionalSymbol, 
            'reportCurrencySymbol' => $request->reportCurrencySymbol,
            'reportCurrencyCode' => $request->reportCurrencyCode,
            'reportCurrencyName' => $request->reportCurrencyName,
            'reportCurrencyFractionalUnit' => $request->reportCurrencyFractionalUnit,
            'reportCurrencyFractionalSymbol' => $request->reportCurrencyFractionalSymbol,
            ]);
        return redirect()->route('setting.index')->with('message', trans('message.successfully_updated', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();


        return response()->json(
            [
                'message'=> trans('message.successfully_deleted', ['name' => trans('message.'.$this->name)])
            ]
        );
    }
}
