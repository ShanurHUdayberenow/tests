@extends('layouts.app1')
@section('breadcrumbs')
    <h4 class="page-title pull-left">{{trans('message.'.$name, [])}}</h4>
    <ul class="breadcrumbs pull-left">
        <li><span>{{trans('message.'.$name, [])}}</span></li>
    </ul>
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('storage/noty/noty.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('storage/noty/themes/mint.scss')}}">

@endsection
@section('content')
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">{{trans('message.'.$name.'_plural', [])}}</h4>
                <div class="data-tables">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        @livewire('filter', ['data' => $data, 'searchColumns' => $searchColumns, 'columns' => $columns, 'name'=> $name, 'export' => isset($export) ? $export : null, 'import' => isset($import) ? $import : null, 'category' => isset($category) ? $category : null])
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--modal start-->
    <div class="col-lg-6 mt-5">
        <div class="card">
            <div class="modal fade" id="deleteConfirm">
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
                        <input type="hidden" id="deleteId">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="deleteButton" onclick="destroy()">{{trans('message.yes', [])}}</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('message.no', [])}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end modal-->
@endsection
@section('script')
    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

    <script src="\storage/noty/noty.js"></script>
    @if ($message = session('message'))
        <script>
            new Noty({
                type: 'success',
                layout: 'topRight',
                text: '{{$message}}',
                timeout: 2000,
            }).show();
        </script>
    @endif
    @if(session('errors'))
        <script>
            new Noty({
                type: 'error',
                layout: 'topRight',
                text: '<?php foreach ($errors->all() as $item) { echo $item . '<br>';}?>',
                timeout: 2000,
            }).show();
        </script>
    @endif
<script>

    $(document).on('click','.delete',function(){
        let id = $(this).attr('data-id');
        $('#deleteId').val(id);
    });
    function destroy() {
        var id = document.getElementById('deleteId').value;
        var url = '{{\Illuminate\Support\Facades\Request::url()}}/' + id;
        $.ajax({
            url: url,
            data: {'_token': "{{csrf_token()}}"},
            type: 'DELETE',  // user.destroy
            success: function(data) {
                Livewire.emit('refreshComponent');
                new Noty({
                    type: 'success',
                    layout: 'topRight',
                    text: data.message,
                    timeout: 2000,
                }).show();
            },
            error: function () {
                new Noty({
                    type: 'error',
                    layout: 'topRight',
                    text: 'Error',
                    timeout: 2000,
                }).show();
            }
        });
    }
</script>
    <!-- others plugins -->
    @livewireScripts
@endsection
