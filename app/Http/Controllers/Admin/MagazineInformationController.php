<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MagazineInformationRequest;
use App\Models\MagazineInformation;
use Illuminate\Http\Request;

class MagazineInformationController extends Controller
{
    public $columns =
        [
            [
                'name'  => 'address',
                'type'  => 'text',
                'label' => 'address',
            ],
            [
                'name'  => 'phoneNumber',
                'type'  => 'text',
                'label' => 'Telefon belgi',
            ],
            [
                'name'  => 'email',
                'type'  => 'text',
                'label' => 'Email address',
            ],
        ];
    public $showColumns =
        [
            [
                'name'  => 'address',
                'type'  => 'text',
                'label' => 'address',
            ],
            [
                'name'  => 'phoneNumber',
                'type'  => 'text',
                'label' => 'Telefon belgi',
            ],
            [
                'name'  => 'email',
                'type'  => 'text',
                'label' => 'Email address',
            ],
            [
                'name'  => 'slogan',
                'type'  => 'text',
                'label' => 'Şygar',
            ],
        ];
    public $fields =
        [
            [
                'name'  => 'address',
                'type'  => 'text',
                'label' => 'address',
            ],
            [
                'name'  => 'phoneNumber',
                'type'  => 'text',
                'label' => 'Telefon belgi',
            ],
            [
                'name'  => 'email',
                'type'  => 'text',
                'label' => 'Email address',
            ],
            [
                'name'  => 'slogan',
                'type'  => 'text',
                'label' => 'Şygar',
            ],
        ];
    public $name = 'magazineInformation';
    public $searchColumns = ['address', 'phoneNumber'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = new MagazineInformation();

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
    public function store(MagazineInformationRequest $request)
    {
        MagazineInformation::create([
            'address' => $request->address,
            'slogan' => $request->slogan,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
        ]);
        return redirect()->route('magazineInformation.index')->with('message', trans('message.successfully_added', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        return view('admin.crud.view')->with('name', $this->name)->with('data', MagazineInformation::find($id))->with('columns', $this->showColumns);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        return view('admin.crud.edit')->with('fields', $this->fields)->with('name', $this->name)->with('data', MagazineInformation::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MagazineInformationRequest $request, $id)
    {

        $magazineInformation = MagazineInformation::find($id);
            $magazineInformation->update([
                'address' => $request->address,
                'slogan' => $request->slogan,
                'email' => $request->email,
                'phoneNumber' => $request->phoneNumber,
            ]);
        return redirect()->route('magazineInformation.index')->with('message', trans('message.successfully_updated', ['name' => trans('message.'.$this->name)]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $magazineInformation = MagazineInformation::findOrFail($id);
        $magazineInformation->delete();


        return response()->json(
            [
                'message'=> trans('message.successfully_deleted', ['name' => trans('message.'.$this->name)])
            ]
        );
    }
}
