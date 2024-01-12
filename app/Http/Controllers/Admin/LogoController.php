<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LogoRequest;
use App\Models\Logo;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    public $columns =
    [
        [
            'name' => 'image',
            'type' => 'image',
            'label' => 'Surat'
        ]
    ];
public $showColumns =
    [
        [
            'name' => 'image',
            'type' => 'image',
            'label' => 'Surat'
        ]
    ];
public $fields =
    [
        [
            'name' => 'image',
            'type' => 'image',
            'label' => 'Surat'
        ]
    ];
public $name = 'logo';
public $searchColumns = ['image'];
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    $data = new Logo();

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
public function store(LogoRequest $request)
{
    $filename = time() . '.' . $request->image->extension();

    $request->image->storeAs('images/logos/',$filename, 'public');
    $image_name = url('storage/images/logos/'.$filename);

    Logo::create([
        'image' => $image_name,
        'file_name' => $filename
    ]);
    return redirect()->route('logo.index')->with('message', trans('message.successfully_added', ['name' => trans('message.'.$this->name)]));
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    return view('admin.crud.view')->with('name', $this->name)->with('data', Logo::find($id))->with('columns', $this->showColumns);
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    return view('admin.crud.edit')->with('fields', $this->fields)->with('name', $this->name)->with('data', Logo::find($id));
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
    $logo = Logo::find($id);
    if ($request->image) {
        Storage::disk('public')->delete('/images/logos/'.$logo->file_name);
    $filename = time() . '.' . $request->image->extension();

    $request->image->storeAs('images/logos/',$filename, 'public');
    $image_name = url('storage/images/logos/'.$filename);

        $logo->update([
            'image' => $image_name,
            'file_name' => $filename
        ]);
    } else {
        $logo->update([
            
        ]);
    }
    return redirect()->route('logo.index')->with('message', trans('message.successfully_updated', ['name' => trans('message.'.$this->name)]));
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $logo = Logo::findOrFail($id);
    Storage::disk('public')->delete('/images/logos/'.$logo->file_name);
    $logo->delete();


    return response()->json(
        [
            'message'=> trans('message.successfully_deleted', ['name' => trans('message.'.$this->name)])
        ]
    );
}
}