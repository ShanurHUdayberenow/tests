<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public $columns =
    [
        [
            'name'  => 'name',
            'type'  => 'text',
            'label' => 'Ady',
        ],
        [
            'name'  => 'surname',
            'type'  => 'text',
            'label' => 'Familiýasy',
        ],
        [
            'name'  => 'role',
            'type'  => 'role',
            'label' => 'Role',
        ],
        [
            'name'  => 'status_switch',
            'type'  => 'switch_price_type',
            'label' => 'Baha tipini bermek',
            'request_url' => 'admin/user/price_type'
        ],
    ];
public $showColumns =
    [
        [
            'name'  => 'name',
            'type'  => 'text',
            'label' => 'Ady',
        ],
        [
            'name'  => 'surname',
            'type'  => 'text',
            'label' => 'Familiýasy',
        ],
        [
            'name'  => 'email',
            'type'  => 'text',
            'label' => 'Elektron poçtasy',
        ],
        [
            'name'  => 'address',
            'type'  => 'text',
            'label' => 'Salgysy',
        ],
        [
            'name'  => 'phoneNumber',
            'type'  => 'text',
            'label' => 'Telefon belgisi',
        ],
    ];
public $fields =
    [
        [
            'name'  => 'role',
            'type'  => 'select_role',
            'label' => 'Role saýlaň',
            'model' => 'App\\Models\\Role',
            'relation_column' => 'title',
        ],
        [
            'name'  => 'name',
            'type'  => 'text',
            'label' => 'Ady',
        ],
        [
            'name'  => 'surname',
            'type'  => 'text',
            'label' => 'Familiýasy',
        ],
        [
            'name'  => 'email',
            'type'  => 'text',
            'label' => 'Elektron poçtasy',
        ],
        [
            'name'  => 'password',
            'type'  => 'password',
            'label' => 'Password',
        ],
        [
            'name' => 'password_confirmation',
            'type' => 'password',
            'label' => 'Açar sözüni tassykla',
        ],
        [
            'name'  => 'address',
            'type'  => 'text',
            'label' => 'Salgysy',
        ],
        [
            'name'  => 'phoneNumber',
            'type'  => 'text',
            'label' => 'Telefon belgisi',
        ],
    ];
public $name = 'user';
public $searchColumns = ['name', 'surname'];
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
 */
public function index()
{
    $data = new User();

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
public function store(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'surname' => ['required'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'phoneNumber' => ['required'],
        'address' => ['required'],
    ],
    [
        'slug.unique' => 'Beýle email salgy bar',
    ]);
    User::create([
        'name' => $request->name,
        'surname' => $request->surname,
        'email' => $request->email,
        'role' => $request->role,
        'phoneNumber' => $request->phoneNumber,
        'address' => $request->address,
        'password' => Hash::make($request->password),
    ]);
    return redirect()->route('user.index')->with('message', trans('message.successfully_added', ['name' => trans('message.'.$this->name)]));
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
 */
public function show($id)
{
    return view('admin.crud.view')->with('name', $this->name)->with('data', User::find($id))->with('columns', $this->showColumns);
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
 */
public function edit($id)
{
    return view('admin.crud.edit')->with('fields', $this->fields)->with('name', $this->name)->with('data', User::find($id));
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\RedirectResponse
 */
public function update(Request $request, $id)
{

    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'surname' => ['required'],
        'phoneNumber' => ['required'],
        'address' => ['required'],
    ],
    [
        'slug.unique' => 'Beýle email salgy bar',
    ]);
    $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'role' => $request->role,
            'phoneNumber' => $request->phoneNumber,
            'address' => $request->address
        ]);
    return redirect()->route('user.index')->with('message', trans('message.successfully_updated', ['name' => trans('message.'.$this->name)]));
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\JsonResponse
 */
public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();


    return response()->json(
        [
            'message'=> trans('message.successfully_deleted', ['name' => trans('message.'.$this->name)])
        ]
    );
}

public function status(Request $request) {
    if ($request->price_type == 'true') {
        User::find($request->id)->update([
            'price_type' => 'tmt'
        ]);
    } else {
        User::find($request->id)->update([
            'price_type' => 'usd'
        ]);
    }
    return response()->json([
        'message' => 'success'
    ],200);
}
}
