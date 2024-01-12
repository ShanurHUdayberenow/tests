@extends('frontend.layouts.header')
@section('content')
@if(Auth::check())
@php $total = 0; @endphp


{{-- <div class="uren-cart-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                       <h4>Sebediňiz boş</h4>
                   </div>
                </div>
            </div>
        </div> --}}

        <!-- Begin Uren's Cart Area -->
        <div class="uren-cart-area cartdelete" id="deletecart">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="javascript:void(0)">
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            
                                            <th class="uren-product-thumbnail">{{trans('frontend_message.image')}}</th>
                                            <th class="cart-product-name">{{trans('frontend_message.product')}}</th>
                                            <th class="uren-product-subtotal">{{trans('frontend_message.code')}}</th>
                                            <th class="uren-product-price">{{trans('frontend_message.unit_price')}}</th>
                                            <th class="uren-product-quantity">{{trans('frontend_message.quantity')}}</th>
                                            <th class="uren-product-subtotal">{{trans('frontend_message.total')}}</th>
                                            <th class="uren-product-remove">{{trans('frontend_message.remove')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($cartProducts as $cartProduct)

                                        <tr id="sid{{$cartProduct->id}}" class="productData">
                                            
                                                
                                            <td class="uren-product-thumbnail" width="250px;"><a href="javascript:void(0)">@if($cartProduct->product['images'])<img src="{{$cartProduct->product['images']['0']['image']}}" alt="Uren's Cart Thumbnail">@endif</a></td>                                            
                                            <td class="uren-product-name" width="800px;"><a href="javascript:void(0)">{{$cartProduct->product['name_'.$locale]}}</a></td>
                                            <td class="uren-product-price"><span class="amount">{{$cartProduct->product['code']}}</span></td>
                                            <td class="uren-product-price"><span class="amount">
                                                @if (Auth::user()->price_type == 'tmt')
                                                {{number_format((float)($cartProduct->product['all_price']))}} TMT
                                                @elseif(Auth::user()->price_type == 'usd')
                                                {{number_format((float)($cartProduct->product['all_price']))}}
                                                @endif</span></td>
                                            <td class="quantity">
                                                <input type="hidden" value="{{$cartProduct->id}}" class="productId">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box qty-input" id="qty" name="qty" value="{{$cartProduct->quantity}}" type="text">
                                                    <div class="dec qtybutton changeQuantity"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton changeQuantity"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </td>
                                            <input type="hidden" class="qtyprice" id="qtyprice{{$cartProduct->id}}" name="qtyprice" value="{{$cartProduct->product->price}}">

                                            <td class="product-subtotal" id=""><span class="amount">
                                                @if (Auth::user()->price_type == 'tmt')
                                                {{ number_format(((float)$cartProduct->product['all_price'] * (float)$cartProduct->quantity)) }} TMT
                                                @elseif(Auth::user()->price_type == 'usd')
                                                {{ number_format(((float)$cartProduct->product['all_price'] * (float)$cartProduct->quantity)) }}
                                                @endif
                                            </span></td>
                                            <td class="uren-product-remove"><a href="#" onclick="deletePost({{$cartProduct->id}})"><i class="fa fa-trash"
                                                title="Remove"></i></a></td>
                                        </tr>
                                        @php number_format((float)($total += (float)$cartProduct->product->all_price * (float)$cartProduct->quantity)) ; @endphp                                        
                                        @endforeach
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>{{trans('frontend_message.cart')}}:</h2>
                                        <ul>
                                            <li>{{trans('frontend_message.products')}} <span>
                                                @if (Auth::user()->price_type == 'tmt')
                                                {{number_format((float)($total))}} TMT
                                                @elseif(Auth::user()->price_type == 'usd')
                                                {{number_format((float)($total))}} 
                                                @endif
                                            </span></li>
                                            <li>{{trans('frontend_message.total')}} <span>
                                                @if (Auth::user()->price_type == 'tmt')
                                                {{number_format((float)($total))}} TMT
                                                @elseif(Auth::user()->price_type == 'usd')
                                                {{number_format((float)($total))}} 
                                                @endif
                                            </span></li>
                                        </ul>
                                        <a href="{{route('checkout')}}">{{trans('frontend_message.checkout')}}</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Uren's Cart Area End Here -->
@else
@if($cartsessionProducts == null)
<div class="uren-cart-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h4>Sebediňiz boş</h4>
            </div>
        </div>
    </div>
</div>
@else
@php $total = 0; @endphp

<div class="uren-cart-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="javascript:void(0)">
                            <div class="table-content table-responsive" id="deletecart">
                                 <table class="table cartdelete">
                                    <thead>
                                        <tr>
                                            
                                            <th class="uren-product-thumbnail">{{trans('frontend_message.image')}}</th>
                                            <th class="cart-product-name">{{trans('frontend_message.product')}}</th>
                                            <th class="cart-product-name">{{trans('frontend_message.code')}}</th>
                                            <th class="uren-product-price">{{trans('frontend_message.unit_price')}}</th>
                                            <th class="uren-product-quantity">{{trans('frontend_message.quantity')}}</th>
                                            <th class="uren-product-subtotal">{{trans('frontend_message.total')}}</th>
                                            <th class="uren-product-remove">{{trans('frontend_message.remove')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($cartsessionProducts as $id => $cartProduct)

                                        <tr data-id="{{ $id }}" class="productData">
                                            
                                            <td class="uren-product-thumbnail" width="250px;"><a href="javascript:void(0)">@if($cartProduct['images'])<img src="{{$cartProduct['images']['0']['image']}}" alt="Uren's Cart Thumbnail" width="10%"></a>@endif</td>
                                            <td class="uren-product-name" width="1000px;"><a href="javascript:void(0)">{{$cartProduct['name']}}</a></td>
                                            <td class="uren-product-name"><a href="javascript:void(0)">{{$cartProduct['code']}}</a></td>
                                            @if($cartProduct['discount'] == null)
                                            <td class="uren-product-name"><a href="javascript:void(0)">{{number_format((float)($cartProduct['price']))}} TMT</a></td>
                                            @else
                                            <td class="uren-product-name"><a href="javascript:void(0)">{{number_format((float)($cartProduct['price'] - (float)$cartProduct['price'] * (float)$cartProduct['discount'] / 100))}} TMT</a></td>
                                            @endif
                                            <td class="quantity">
                                                <input type="hidden" value="{{$cartProduct['id']}}" class="productId">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box qty-input rest" id="qty" name="qty" value="{{$cartProduct['quantity']}}" type="text">
                                                    <div class="dec qtybutton changeQuantity"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton changeQuantity"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </td>
                                            @if($cartProduct['discount'] == null)
                                            <td class="product-subtotal" id=""><span class="amount">{{ number_format((float)((float)$cartProduct['price'] * (float)$cartProduct['quantity'])) }} TMT</span></td>
                                            @else
                                            <td class="product-subtotal" id=""><span class="amount">{{ number_format((float)(((float)$cartProduct['price'] - (float)$cartProduct['price'] * (float)$cartProduct['discount'] /100) * (float)$cartProduct['quantity'])) }} TMT</span></td>
                                            @endif
                                            <td class="uren-product-remove remove-from-cart"><a href="#" onclick="deletePost({{$item->id}})"><i class="fa fa-trash"
                                                title="Remove"></i></a></td>
                                            @if($cartProduct['discount'] == null)
                                            @php number_format((float)($total += (float)$cartProduct['price'] * (float)$cartProduct['quantity'])) ; @endphp                 
                                            @else
                                            @php number_format((float)($total += ((float)$cartProduct['price'] - (float)$cartProduct['price'] * (float)$cartProduct['discount'] / 100) * (float)$cartProduct['quantity'])) ; @endphp                 

                                            @endif                       

                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>                            
                            </div>
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>{{trans('frontend_message.cart')}}:</h2>
                                        <ul>
                                            <li>{{trans('frontend_message.products')}} <span>{{number_format((float)($total))}} TMT</span></li>
                                            <li>{{trans('frontend_message.total')}} <span>{{number_format((float)($total))}} TMT</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        <a href="{{route('offer')}}" style="float:right">{{trans('frontend_message.checkout')}}</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endif
@endif
@endsection

@section('script')

<script>
    $(".qtybutton").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);

        $.ajax({
            url: '{{ route('update.cartsession') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".rest").val()
            },
            success: function (response) {
                location.reload();
            }
        });
    });
</script>

<script>
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);


            $.ajax({
                url: '{{ route('cartdelete') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    location.reload();

                    $('#deletecart').load(location.href + ' .cartdelete');
                }
            });
        
    });
</script>

<script>
$(document).ready(function() {
    $('.changeQuantity').click(function(e) {
        e.preventDefault();

        var productId = $(this).closest('.productData').find('.productId').val();
        var productQty = $(this).closest('.productData').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });


        $.ajax({
            method: "POST",
            url: "update-cart",
            data: {
                'productId': productId,
                'productQty': productQty,
            },
            success: function(response) {
                location.reload();
                
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
            }
        });

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
        url: "/cartdestroy/" + id,
        type: 'DELETE',
        data: {
            _token: $("input[name=_token]").val()
        },
        success: function(response) {
            $('#deletecart').load(location.href + ' .cartdelete');

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
@endsection