@extends('layouts.app1')
@section('breadcrumbs')
    <h4 class="page-title pull-left">{{trans('message.'.$name, [])}}</h4>
    <ul class="breadcrumbs pull-left">
        <li><a href="{{route($name.'.index')}}">{{trans('message.'.$name, [])}}</a></li>
        <li><span>{{trans('message.create')}}</span></li>
    </ul>
@endsection

@section('content')

    <div class="col-8 mt-5">
        <form method="POST" action="{{route($name.'.store')}}"  enctype="multipart/form-data" id="form">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{trans('message.'.$name, [])}}</h4>

                    @if(session('errors'))
{{--                        @dd($errors->messages)--}}
                        <div class="alert alert-danger" style="padding: 1rem 2rem">
                            <ul style="list-style-type: circle">
                                @foreach($errors->all() as $error)
                                    <li style="font-size: 14px">{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif

                    @foreach($fields as $field)
                        @include('fields.'.$field['type'], ['field' => $field])
                    @endforeach
                    <button class="btn btn-custom" type="submit">{{trans('message.submit')}}</button>
                </div>
            </div>

        </form>

    </div>

@endsection
