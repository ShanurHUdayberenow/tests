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
<link rel="canonical" href="https://github.com/dbrekalo/fastselect/" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,900&subset=latin,latin-ext' rel='stylesheet'
    type='text/css'>
<link rel="stylesheet" href="https://rawgit.com/dbrekalo/attire/master/dist/css/build.min.css">
<script src="https://rawgit.com/dbrekalo/attire/master/dist/js/build.min.js"></script>
<link rel="stylesheet" href="{{asset('dist/fastselect.min.css')}}">
<script src="{{asset('dist/fastselect.standalone.js')}}"></script>
@endsection

@section('content')

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <select class="multipleSelect" multiple name="language">
                    <option value="Afghanistan">Esikler</option>
                    <option value="Albania">Gurlushyk harytlary</option>

                </select>

                <script>
                $('.multipleSelect').fastselect();
                </script>

                <div class="modal-body">

                    <select class="multipleSelect" multiple name="language">
                        <option value="Afghanistan">Esikler</option>
                        <option value="Albania">Gurlushyk harytlary</option>

                    </select>

                    <script>
                    $('.multipleSelect').fastselect();
                    </script>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatable" class="text-center dataTable no-footer dtr-inline" role="grid"
                            aria-describedby="dataTable_info">
                            <thead class="bg-light text-capitalize">
                                <tr role="row">

                                    <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                        Ulanyjy ady
                                    </th>
                                    <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                        Ulanyjy familiýasy
                                    </th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach($selectusers as $selectuser)
                                <tr>
                                    <td>{{$selectuser['name']}}</td>
                                    <td>{{$selectuser['surname']}}</td>

                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">Product Search</button>
                </li>
            </ul>
                <div class="modal-body">

                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div id="table_data">
                                <div class="container">
                                    @if(session('errors'))
                                    <div class="alert alert-danger" style="padding: 1rem 2rem">
                                        <ul style="list-style-type: circle">
                                            @foreach($errors->all() as $error)
                                            <li style="font-size: 14px">{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    @endif

                                    <input type="text" id="search-products" class="form-control"
                                        placeholder="Start search">
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <th scope="col"># <input type="checkbox" name="select-all" id="select-all" /></th>
                                                <th scope="col">Product name</th>
                                                <th scope="col">Product image</th>
                                            </tr>
                                        </thead>


                                        <tbody id="dynamic-row">
                                            @foreach($searchs as $search)
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input prodId"
                                                            name="prodId[]" id="{{$search->id}}"
                                                            value="{{$search->id}}">
                                                        <label class="custom-control-label"
                                                            for="{{$search->id}}"></label>
                                                    </div>
                                                </td>
                                                <td>{{$search->name_tm}}</td>
                                                @if($search['images'] != null)
                                                <td><img src="{{$search['images']['0']['image']}}" width="15%"></td>
                                                @endif

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">2</div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary save_btn" data-dismiss="modal">Save changes</button>
                </div>
        </div>
    </div>
</div>

<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title"></h4>
            <div class="data-tables">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="d-inline-block">
                                <button data-toggle="modal" data-target="#exampleModal"
                                    class="btn btn-outline-secondary mb-3">Selected Users:
                                    {{count(session()->get('userdisc', []))}}</button>

                            </div>

                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="d-inline-block">
                                <button data-toggle="modal" data-target=".bd-example-modal-lg"
                                    class="btn btn-custom mr-3">Add Product</button>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="{{route('productstore')}}" method="POST">
                                @csrf
                            <div id="refreshPage">
                                <div class="loadPage">

                                <table id="datatable" class="text-center dataTable no-footer dtr-inline" role="grid"
                                    aria-describedby="dataTable_info">
                                    <thead class="bg-light text-capitalize">
                                        <tr role="row">

                                            <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                                Product Number
                                            </th>
                                            <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                                Product Name
                                            </th>
                                            <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                                Product Price
                                            </th>
                                            <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                                Product Discount
                                            </th>
                                            <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                                Product Discounted Price
                                            </th>
                                            <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                                User Discount
                                            </th>
                                            <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                                User Discounted Price
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $number=1; ?>
                                        @php $totaldiscount = 0; @endphp
                                        @php $totaluserdiscount = 0; @endphp
                                        @foreach($inserts as $selectedproduct)
                                        <div id="discountajaxcall">
                                            <div class="discountload">
                                                <tr class="discountData">
                                                    <td>
                                                        {{$number}}
                                                        <?php $number++ ?>
                                                    </td>

                                                    <td>
                                                        {{$selectedproduct['name']}}
                                                    </td>

                                                    <td>
                                                        {{$selectedproduct['price']}}
                                                    </td>

                                                    <td>
                                                        {{$selectedproduct['discount']}}
                                                    </td>

                                                    <td>
                                                        {{$selectedproduct['price'] - ($selectedproduct['price'] * $selectedproduct['discount'] / 100)}}
                                                    </td>

                                                    <td>
                                                        <input class="discount-input" name="discountProd[]"
                                                            id="{{$selectedproduct['id']}}"
                                                            value="{{$selectedproduct['userDiscount']}}" placeholder="%">
                                                    </td>

                                                    <td>
                                                        {{round($selectedproduct['price'] - ($selectedproduct['price'] * $selectedproduct['userDiscount'] / 100))}}
                                                    </td>


                                                </tr>
                                                @endforeach
                                            </div>
                                        </div>

                                    </tbody>

                                </table>
                                </div>
                                </div>
                                <button class="btn btn-custom mr-3">Save</button>

                            </form>

                        </div>
                    </div>
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
mobiscroll.select('#multiple-select', {
    inputElement: document.getElementById('my-input'),
    touchUi: false
});
</script>
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

$(document).ready(function() {
    $('.save_btn').on('click', function(e) {
        e.preventDefault();
        const prodId = [];

        $('.prodId').each(function() {
            if($(this).is(":checked")) {
                prodId.push($(this).val());
            }
        });

        $.ajax({
            url: '{{route('save_data')}}',
            type: 'POST',
            data: {
                "_token": "{{csrf_token() }}",
                prodId: prodId,
            },
            success:function(response) {
                $('#refreshPage').load(location.href + ' .loadPage')
            }
        });
    });
});

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