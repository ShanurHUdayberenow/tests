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

<style>
td {
    border: 1px solid #dee2e6;

}

.pro-details-quality {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
}

.cart-plus-minus {
    border: 1px solid #0065a8;
    display: inline-block;
    height: 41px;
    overflow: hidden;
    padding: 0;
    position: relative;
    width: 100px;
    border-radius: 100px;
}

.qtybutton {
    color: #333;
    cursor: pointer;
    float: inherit;
    font-size: 18px;
    line-height: 20px;
    margin: 0;
    position: absolute;
    text-align: center;
    -webkit-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;

}

.cart-plus-minus-box {
    background: transparent none repeat scroll 0 0;
    border: medium none;
    color: #333333;
    float: left;
    font-size: 18px;
    height: 39px;
    margin: 0;
    padding: 0;
    text-align: center;
    width: 100px;
}

.qtybutton.dec {
    height: 60px;
    left: 21px;
    padding-top: 9px;
    top: 0;
}

.qtybutton.inc {
    height: 60px;
    padding-top: 9px;
    right: 18px;
    top: 0;
}
</style>
<div class="modal fade bd-example-modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Product</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form id="postadd" method="POST">
                @csrf
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
                                                <th scope="col">#</th>
                                                <th scope="col">Product name</th>
                                            </tr>
                                        </thead>


                                        <tbody id="dynamic-row">
                                            @foreach($searchs as $search)
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="selectproduct[]" id="{{$search->id}}"
                                                            value="{{$search->id}}">
                                                        <label class="custom-control-label"
                                                            for="{{$search->id}}"></label>
                                                    </div>
                                                </td>
                                                <td>{{$search->name_tm}}</td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-9 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title"></h4>
            <div class="data-tables">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Suraty saýlaň</label>
                        <div class="input-group">
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile02">
                                    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                </div>
                                
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Pacet Ady Tm</label>
                        <div class="input-group">

                            <input class="form-control" data-toggle="modal" data-target=".bd-example-modal-lg"
                                type="text" name="" id="" value="">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Pacet Ady Ru</label>
                        <div class="input-group">

                            <input class="form-control" data-toggle="modal" data-target=".bd-example-modal-lg"
                                type="text" name="" id="" value="">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Slug</label>
                        <div class="input-group">

                            <input class="form-control" data-toggle="modal" data-target=".bd-example-modal-lg"
                                type="text" name="" id="" value="">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Pacet Barada Tm</label>
                        <div class="input-group">

                            <input class="form-control" data-toggle="modal" data-target=".bd-example-modal-lg"
                                type="textarea" name="" id="" value="">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Pacet Barada Ru</label>
                        <div class="input-group">

                            <input class="form-control" data-toggle="modal" data-target=".bd-example-modal-lg"
                                type="textarea" name="" id="" value="">

                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>



@if(Request::url() != 'http://localhost:8000/admin/pacet/create')
<div class="single-table">
    <div class="table-responsive">
        <table class="table text-center">
            <thead>
                <tr>
                    <td>Haryt ady</td>
                    <td>Haryt suraty</td>
                    <td>Haryt sany</td>
                    <td>Delete</td>
                </tr>
            </thead>

            @foreach($pacet_products as $pacet_product)
            <tbody class="productData">


                <tr id="sid{{$pacet_product->id}}">
                    <td style="vertical-align: middle !important;">
                        {{$pacet_product->product->name_tm}}</td>
                    <td style="vertical-align: middle !important;"><img
                            src="{{$pacet_product->product['images']['0']['image']}}" width="20%"></td>
                    <td style="vertical-align: middle !important;">
                        <div class="pro-details-quality" style="margin-top: 10px;">
                            <input type="hidden" value="{{$pacet_product->id}}" class="productId">
                            <div class="cart-plus-minus">
                                <div class="dec qtybutton changeQuantity">-</div>
                                <input class="cart-plus-minus-box qty-input" type="reset" name="qty"
                                    value="{{$pacet_product->quantity}}">
                                <div class="inc qtybutton changeQuantity">+</div>
                            </div>

                        </div>
                    </td>
                    <td style="vertical-align: middle !important;"><a href="#"
                            onclick="deletePost({{$pacet_product->id}})"><i class="m-1 ti-trash"></i></a></td>

                </tr>

            </tbody>
            @endforeach

        </table>
    </div>
</div>
@endif

@endsection

@section('script')
<!-- Start datatable js -->

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
</script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js">
</script>
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