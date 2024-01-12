<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedBackRequest;
use App\Models\FeedBack;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    public $columns =
    [
        [
            'name'  => 'name',
            'type'  => 'text',
            'label' => 'Ady',
        ],
        [
            'name'  => 'email',
            'type'  => 'text',
            'label' => 'Email',
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
            'name'  => 'email',
            'type'  => 'text',
            'label' => 'Email',
        ],
        [
            'name'  => 'subject',
            'type'  => 'text',
            'label' => 'Subject',
        ],
        [
            'name'  => 'message',
            'type'  => 'text',
            'label' => 'Habar',
        ],
    ];
public $fields =
    [
        [
            'name'  => 'name',
            'type'  => 'text',
            'label' => 'Ady',
        ],
        [
            'name'  => 'email',
            'type'  => 'text',
            'label' => 'Email',
        ],
        [
            'name'  => 'subject',
            'type'  => 'text',
            'label' => 'Subject',
        ],
        [
            'name'  => 'message',
            'type'  => 'text',
            'label' => 'Habar',
        ],
    ];
public $name = 'feedBack';
public $searchColumns = ['name', 'email'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new FeedBack();

        return view('admin.crud.list')->with('columns', $this->columns)->with('name', $this->name)->with('data', $data)->with('searchColumns', $this->searchColumns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.crud.view')->with('name', $this->name)->with('data', Feedback::find($id))->with('columns', $this->showColumns);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();


        return response()->json(
            [
                'message'=> trans('message.successfully_deleted', ['name' => trans('message.'.$this->name)])
            ]
        );
    }
}
