@extends('layouts.app1')
@section('breadcrumbs')
    <h4 class="page-title pull-left">{{trans('message.dashboard', [])}}</h4>
    <ul class="breadcrumbs pull-left">

        <li><span>{{trans('message.dashboard', [])}}</span></li>
    </ul>
@endsection
@section('content')
    <h1>Dashboard</h1>
@endsection
