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

<div class="modal fade bd-example-modal-lg">
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
                                                <th scope="col">#</th>
                                                <th scope="col">Product name</th>
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
    <div class="card remloadPage" id="remrefreshPage">
        <div class="card-body">
            <h4 class="header-title"></h4>
            <div class="data-tables">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                    <div class="row">
                    <div class="d-inline-block">
                                <!-- <button data-toggle="modal" data-target=".bd-example-modal-lg"
                                    class="btn btn-custom mr-3">Add Product</button> -->
                            </div>
                        <div class="col-sm-12">
                        <form action="{{route('productupdate', $selectusers->id)}}" method="POST">
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
                                            <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                                User Discount Delete
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $number = 1; ?>
                                        @foreach($listproductedit as $index => $list)
                                        
                                                
                                                <tr class="discountDataEdit" id="sid{{$list->id}}">
                                                    <td>
                                                        {{$number}}
                                                        <?php $number++; ?>
                                                    </td>

                                                    <td>
                                                        {{$list->product['name_'.$locale]}}
                                                    </td>

                                                    <td>
                                                        {{$list->product->price}}
                                                    </td>

                                                    <td>
                                                        
                                                        {{$list->product->discount}}%
                                                        
                                                    </td>


                                                    <td>
                                                        {{$list->product->price - ($list->product->price * $list->product->discount / 100)}}
                                                    </td>
                                                    <input type="hidden" value="{{$list->id}}" class="productId">
                                                    <td>
                                                        <input class="user-discount-input" name="discount[]"
                                                            id="{{$list->id}}" value="{{$list->discount}}"
                                                            placeholder="%">
                                                    </td>

                                                    <td>
                                                        {{round($list->product->price - ($list->product->price * $list->discount / 100))}}
                                                    </td>

                                                    <!-- <td>
                                                        <span class="action"><i
                                                                class="m-1 ti-pencil-alt changeDiscountEdit"></i></span>
                                                    </td> -->
                                                    <input type="hidden" id="deleteId">
                                                    
                                                    <td>
                                                        {{-- <form action="{{route('user_discount_delete', $list->id )}}"
                                                            method="POST">
                                                            <button class="action delete"><i
                                                                    class="m-1 ti-trash"></i></button>
                                                        </form> --}}
                                                        <a href="#" onclick="destroy('{{route('userdiscdelete', $list->id)}}')"><i
                                                            class="m-1 ti-trash delete" data-id="{{$list->id}}"></i></a>
                                                    </td>
                                                    

                                                </tr>
                                                @endforeach
                                            </div>
                                        </div>

                                    </tbody>
                                    <tbody>
                                    <!-- <tr class="discountDataEdit">
                                                    <td>
                                                    Täze goşulanlar
                                                    </td></tr> -->
                                        @foreach($inserts as $index => $list)
                                        
                                                
                                                <tr class="discountDataEdit" data-id="{{ $index }}">
                                                    <td>
                                                        {{$number}}
                                                        <?php $number++; ?>
                                                    </td>

                                                    <td>
                                                        {{$list['name']}}
                                                    </td>

                                                    <td>
                                                        {{$list['price']}}
                                                    </td>

                                                    <td>
                                                        {{$list['discount']}}
                                                    </td>

                                                    <td>
                                                        {{round($list['price'] - ($list['price'] * $list['discount'] / 100))}}
                                                    </td>

                                                    <td>
                                                        <input class="user-discount-input" name="discount"
                                                            id="{{$list['id']}}" value="{{$list['userDiscount']}}"
                                                            placeholder="%">
                                                    </td>

                                                    <td>
                                                        {{round($list['price'] - ($list['price'] * $list['userDiscount'] / 100))}}
                                                    </td>

                                                    <!-- <td>
                                                        <span class="action"><i
                                                                class="m-1 ti-pencil-alt changeDiscountEdit"></i></span>
                                                    </td> -->
                                                    
                                                    <td>
                                                        <form action=""
                                                            method="POST">
                                                            <button class="action delete remove-from-prod"><i
                                                                    class="m-1 ti-trash"></i></button>
                                                        </form>
                                                        
                                                    </td>
                                                    

                                                </tr>
                                                
                                                @endforeach
                                            

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
<script src="\storage/noty/noty.js"></script>

<script>
    function destroy(url) {
        $.ajax({
            url: url,
            data: {'_token': "{{csrf_token()}}"},
            type: 'DELETE',  // user.destroy
            success: function(data) {
                $('#remrefreshPage').load(location.href + ' .remloadPage');

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
    $(".remove-from-prod").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);


            $.ajax({
                url: '{{ route('proddelete') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                }
            });
        
    });
</script>

<script>
    function deletePost(id) {
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        $.ajax({
            url: "/userdiscdelete/" + id,
            type: 'DELETE',
            data: {
                _token: $("input[name=_token]").val()
            },
            success: function(response) {
    
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
    
                Toast.fire({
                    icon: 'success',
                    title: 'Haryt üstünlikli öçürildi'
                });
                $("#sid" + id).remove();
            },
            error: function(data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                       title: 'Error!',
                       text: 'Ýalňyşlyk ýüze çykdy',
                       icon: 'error',
                       confirmButtonText: 'Cool'
                    })
                    console.log(data);
                }
        });
    
    }
    </script>

<!-- others plugins -->
@livewireScripts
@endsection