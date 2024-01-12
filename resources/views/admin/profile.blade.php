@extends('layouts.app1')

@section('breadcrumbs')
    <h4 class="page-title pull-left">{{trans('message.profile', [])}}</h4>
    <ul class="breadcrumbs pull-left">
        <li><span>{{trans('message.profile', [])}}</span></li>
    </ul>
@endsection

@section('content')
    <div class="offset-2 col-8 mt-5">
        <form method="POST" action="{{route('admin.profile.post')}}"  enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{trans('message.profile', [])}}</h4>
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                    @if(session('errors'))
                        <div class="alert alert-danger" style="padding: 1rem 2rem">
                            <ul style="list-style-type: circle">
                                @foreach($errors->all() as $error)
                                    <li style="font-size: 14px">{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif

                    @foreach($fields as $field)
                        @include('fields.'.$field['type'], ['field' => $field, 'value' => $user[$field['name']]])
                    @endforeach
                    <button class="btn btn-custom" type="submit">{{trans('message.submit')}}</button>
                </div>
            </div>

        </form>

    </div>
@endsection
