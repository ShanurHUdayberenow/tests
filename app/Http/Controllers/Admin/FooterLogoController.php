<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FooterLogoRequest;
use App\Models\FooterLogo;
use Illuminate\Support\Facades\Storage;

class FooterLogoController extends Controller
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
public $name = 'footerLogo';
public $searchColumns = ['image'];
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    $data = new FooterLogo();

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
public function store(FooterLogoRequest $request)
{
    $filename = time() . '.' . $request->image->extension();

    $request->image->storeAs('images/footerlogos/',$filename, 'public');
    $image_name = url('storage/images/footerlogos/'.$filename);

    FooterLogo::create([
        'image' => $image_name,
        'file_name' => $filename
    ]);
    return redirect()->route('footerLogo.index')->with('message', trans('message.successfully_added', ['name' => trans('message.'.$this->name)]));
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    return view('admin.crud.view')->with('name', $this->name)->with('data', FooterLogo::find($id))->with('columns', $this->showColumns);
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    return view('admin.crud.edit')->with('fields', $this->fields)->with('name', $this->name)->with('data', FooterLogo::find($id));
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
    $footerlogo = FooterLogo::find($id);
    if ($request->image) {
        Storage::disk('public')->delete('/images/footerlogos/'.$footerlogo->file_name);
    $filename = time() . '.' . $request->image->extension();

    $request->image->storeAs('images/footerlogos/',$filename, 'public');
    $image_name = url('storage/images/footerlogos/'.$filename);

        $footerlogo->update([
            'image' => $image_name,
            'file_name' => $filename
        ]);
    } else {
        $footerlogo->update([
            
        ]);
    }
    return redirect()->route('footerLogo.index')->with('message', trans('message.successfully_updated', ['name' => trans('message.'.$this->name)]));
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $footerlogo = FooterLogo::findOrFail($id);
    Storage::disk('public')->delete('/images/footerlogos/'.$footerlogo->file_name);
    $footerlogo->delete();


    return response()->json(
        [
            'message'=> trans('message.successfully_deleted', ['name' => trans('message.'.$this->name)])
        ]
    );
}
}
