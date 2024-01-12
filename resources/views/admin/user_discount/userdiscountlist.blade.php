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


<div class="col-12 mt-5">
    <div class="card">
        <div id="table_data">
            <div class="card-body">
                <h4 class="header-title"></h4>
                <div class="data-tables">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="d-inline-block">

                                    <div class="dropdown">
                                        <button class="btn btn-custom mr-3 dropdown-toggle" type="button"
                                            id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <button onclick="location.href='{{route('listproduct')}}'"
                                                class="dropdown-item" type="button">Specifications Discount</button>

                                        </div>
                                    </div>
                                </div>
                                <div class="d-inline-block">

                                    <button onclick="location.href='{{route('sessionforget')}}'" class="btn btn-custom"
                                        type="button">
                                        Ulanyjylary aýyr
                                    </button>

                                </div>
                                
                                {{-- <div class="dataTables_length d-inline-block" id="dataTable_length" style="float: none">
                                    <label>
                                        <select onchange="window.location.href = this.value" style="width: 100%;"
                                            wire:model="total" id="entries-select" name="dataTable_length"
                                            aria-controls="dataTable"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="{{route('userDiscount.index')}}">All users</option>
                                            <option value="{{route('discountedusers')}}">Discounted users</option>
                                            <option value="{{route('dontdiscountedusers')}}">have not been discounted
                                            </option>
                                        </select>

                                    </label>
                                </div> --}}
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="dataTable_filter" class="dataTables_filter"><label>Gözleg:<input type="search"
                                            class="form-control form-control-sm" id="search-users" placeholder=""
                                            aria-controls="dataTable" wire:model="searchTerm"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row userData">
                            <div class="col-sm-12">
                                <form action="{{route('userDiscount.store')}}" method="POST">
                                    @csrf
                                    <table id="datatable" class="text-center dataTable no-footer dtr-inline" role="grid"
                                        aria-describedby="dataTable_info">
                                        <thead class="bg-light text-capitalize">
                                            <tr role="row">
                                                <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                                    <input type="checkbox" name="select-all" id="select-all" />
                                                </th>
                                                
                                                <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                                    User name
                                                </th>
                                                <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                                    User surname
                                                </th>

                                                <th>Hereketler</th>
                                            </tr>
                                        </thead>

                                        <tbody id="dynamic-row">
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
                                            @foreach($users as $user)
                                            <tr>

                                                <td>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="checkbox[]" id="{{$user->id}}" value="{{$user->id}}">
                                                            <label class="custom-control-label"
                                                            for="{{$user->id}}"></label>
                                                    </div>

                                                </td>
                                                <td>
                                                    {{$user->name}}
                                                </td>
                                                <td>
                                                    {{$user->surname}}
                                                </td>

                                                <td>


                                                    <form action="{{route('user-delete', $user->id )}}"
                                                    method="post">
                                                            
                                                        <span class="action"
                                                            onclick="location.href='{{route('userDiscount.edit', $user->id)}}'"><i
                                                                class="m-1 ti-pencil-alt"></i></span>

                                                    </form>

                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>


                                    </table>
                                    <button class="btn btn-custom" type="submit">{{trans('message.submit')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-7 align-items-end align-content-end" style="text-align: right !important;">

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

<script>
$('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
});
</script>

<!-- others plugins -->
@livewireScripts
@endsection