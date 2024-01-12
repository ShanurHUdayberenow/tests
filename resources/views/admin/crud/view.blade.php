@extends('layouts.app1')
@section('breadcrumbs')
    <h4 class="page-title pull-left">{{trans('message.'.$name, [])}}</h4>
    <ul class="breadcrumbs pull-left">
        <li><a href="{{route($name.'.index')}}">{{trans('message.'.$name, [])}}</a></li>
        <li><span>{{trans('message.view')}}</span></li>
    </ul>
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('storage/noty/noty.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('storage/noty/themes/mint.scss')}}">
@endsection
@section('content')
<style>
    td {
        border: 1px solid #dee2e6;
    }
</style>

<!--modal start-->
                    <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="modal fade" id="exampleModalLong">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{trans('message.warning')}}</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>{{trans('message.delete_confirmation', ['name' => trans('message.'.$name)])}}
                                            </p>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="destroy('{{route($name.'.destroy', $data)}}')">{{trans('message.yes', [])}}</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('message.no', [])}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--end modal-->

    <div class="col-8 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title d-inline-block">{{trans('message.'.$name, [])}}</h4>
                <a href="{{route($name.'.index')}}">&nbsp;&nbsp;&triangleleft;{{trans('message.back')}}</a>
                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table text-center">

                            <tbody>
                            @foreach($columns as $column)
                           
                                <tr>
                                    <td style="vertical-align: middle !important;">{{$column['label']}}</td>
                                    @include('columns.'.$column['type'], ['column' => $column, 'data_item' => $data])
                                    
                                </tr>
                            @endforeach
                            <tr>
                                <td>
                                    {{trans('message.actions')}}
                                </td>
                                <td>
                                    @if(\Illuminate\Support\Facades\Route::has($name.'.edit'))
                                            <span class="action" onclick="location.href='{{route($name.'.edit', $data)}}'"><i class="m-1 ti-pencil-alt"></i>{{trans('message.edit', [])}}</span>
                                    @endif
                                    @if(\Illuminate\Support\Facades\Route::has($name.'.destroy'))
                                            <span class="action" data-toggle="modal" data-target="#exampleModalLong"><i class="m-1 ti-trash"></i>{{trans('message.delete', [])}}</span>
                                    @endif
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('script')
    <script src="\storage/noty/noty.js"></script>

    <script>
        function destroy(url) {
            $.ajax({
                url: url,
                data: {'_token': "{{csrf_token()}}"},
                type: 'DELETE',  // user.destroy
                success: function(data) {
                    new Noty({
                        type: 'success',
                        layout: 'topRight',
                        text: data.message,
                        timeout: 2000,
                    }).show();
                }
            });
        }

    </script>

@endsection
