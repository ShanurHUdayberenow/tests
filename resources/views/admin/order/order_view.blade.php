@extends('layouts.app1')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('storage/noty/noty.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('storage/noty/themes/mint.scss')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection

@section('content')
<style>
td {
    border: 1px solid #dee2e6;
}
</style>

<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title d-inline-block">User</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <td>OrderNo</td>
                                <td>Name</td>
                                <td>Surname</td>
                                <td>Email</td>
                                <td>Phone Number</td>
                                <td>Address</td>
                                <td>Address 2</td>
                            </tr>
                        </thead>
                        @foreach($orders as $order)
                        <tbody>


                            <tr>
                                <td style="vertical-align: middle !important;">{{$order->orderNo}}</td>
                                <td style="vertical-align: middle !important;">{{$order->name}}</td>
                                <td style="vertical-align: middle !important;">{{$order->surname}}</td>
                                <td style="vertical-align: middle !important;">{{$order->email}}</td>
                                <td style="vertical-align: middle !important;">{{$order->phoneNumber}}</td>
                                <td style="vertical-align: middle !important;">{{$order->address}}</td>
                                <td style="vertical-align: middle !important;">{{$order->address2}}</td>
                            </tr>

                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="col-12 mt-5">
@foreach($orders as $order)
<button onclick="location.href='{{route('orderView.export', $order->id)}}'" class="btn btn-custom mr-3"
                    style="background-color: #1F7246; border-color: #1F7246"> <i
                        class="ti-export mr-2"></i>{{trans('message.export')}}</button>
                        
                        @endforeach</div>
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title d-inline-block">Orders</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <td>Image</td>
                                <td>Code</td>
                                <td>Product Name</td>
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Subtotal</td>
                            </tr>
                        </thead>
                        @foreach($orders as $order)
                        @foreach($order->order_lines as $item)
                        <tbody>


                            <tr>
                                <td style="vertical-align: middle !important;"><img
                                        src="{{$item->product['images']['0']['image']}}"
                                        style="width:60px; height:60px"></td>
                                <td style="vertical-align: middle !important;">{{$item->product['code']}}</td>
                                <td style="vertical-align: middle !important;">{{$item->product['name_'.$locale]}}</td>
                                <td style="vertical-align: middle !important;">{{number_format((float)($item->price), 2)}}</td>
                                <td style="vertical-align: middle !important;">{{$item->quantity}}</td>
                                <td style="vertical-align: middle !important;">{{number_format((float)((float)$item->quantity * (float)$item->price), 2)}}</td>
                            </tr>

                        </tbody>
                        @endforeach
                        @endforeach
                        <thead>
                            <tr>
                                <th>Jemi:</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>{{number_format((float)($order->price), 2)}}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('script')
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
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
$(document).on('click', '.delete', function() {
    let id = $(this).attr('data-id');
    $('#deleteId').val(id);
});

function destroy() {
    var id = document.getElementById('deleteId').value;
    var url = '{{\Illuminate\Support\Facades\Request::url()}}/' + id;
    $.ajax({
        url: url,
        data: {
            '_token': "{{csrf_token()}}"
        },
        type: 'DELETE', // user.destroy
        success: function(data) {
            Livewire.emit('refreshComponent');
            new Noty({
                type: 'success',
                layout: 'topRight',
                text: data.message,
                timeout: 2000,
            }).show();
        },
        error: function() {
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