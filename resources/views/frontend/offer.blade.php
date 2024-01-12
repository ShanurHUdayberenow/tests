@extends('frontend.layouts.header')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

@endsection
@section('content')
<form action="{{route('order-stores')}}" method="POST">
@csrf
        <!-- Begin Uren's Checkout Area -->
        <div class="checkout-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-12">
                     @include('sweetalert::alert')
                        
                        

                            <div class="checkbox-form">
                                <h3>{{trans('frontend_message.checkout')}}</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>{{trans('frontend_message.user_name')}} <span class="required">*</span></label>
                                            <input name="name" placeholder="" type="text" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>{{trans('frontend_message.user_surname')}} <span class="required">*</span></label>
                                            <input name="surname" placeholder="" type="text" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>{{trans('frontend_message.user_address1')}} <span class="required">*</span></label>
                                            <input name="address" placeholder="Street address" type="text" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Email <span class="required">*</span></label>
                                            <input name="email" placeholder="" type="email" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>{{trans('frontend_message.user_phone')}} <span class="required">*</span></label>
                                            <input name="phoneNumber" type="text" value="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                    <div class="col-lg-6 col-12">
                    <div class="uren-cart-area" style="padding-top: 35px;padding-bottom: 35px;">
                <div class="row">
                    <div class="col-12">
                        <form action="javascript:void(0)">
                            <div class="table-content table-responsive" id="deletecart">
                                <table class="table cartdelete">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-name">{{trans('frontend_message.product')}}</th>
                                            <th class="uren-product-quantity">{{trans('frontend_message.code')}}</th>
                                            <th class="uren-product-price">{{trans('frontend_message.unit_price')}}</th>
                                            <th class="uren-product-quantity">{{trans('frontend_message.quantity')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0; @endphp
                                        
                                        @foreach($cartsessionProducts as $id => $cartProduct)

                                        <tr id="sid{{$cartProduct['id']}}" class="productData">
                                            
                                            <td class="uren-product-name"><a href="javascript:void(0)">{{$cartProduct['name']}}</a></td>
                                            <td class="uren-product-price"><span class="amount">{{$cartProduct['code']}}</span></td>
                                            
                                            @if($cartProduct['discount'] == null)
                                            <td class="uren-product-name"><a href="javascript:void(0)">{{number_format((float)($cartProduct['price']))}} TMT</a></td>
                                            @else
                                            <td class="uren-product-name"><a href="javascript:void(0)">{{number_format((float)($cartProduct['price'] - (float)$cartProduct['price'] * (float)$cartProduct['discount'] / 100))}} TMT</a></td>
                                            @endif
                                            <td class="uren-product-price"><span class="amount">{{$cartProduct['quantity']}}</span></td>

                                            
                                          
                                        </tr>
                                        @if($cartProduct['discount'] == null)
                                        @php number_format((float)($total += (float)$cartProduct['price'] * (float)$cartProduct['quantity']), 2) ; @endphp                 
                                        @else
                                        @php number_format((float)($total += ((float)$cartProduct['price'] - (float)$cartProduct['price'] * (float)$cartProduct['discount'] / 100) * (float)$cartProduct['quantity'])) ; @endphp                 
                                        @endif
                                        @endforeach

                                       
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                        <div class="your-order">
                            <h3>{{trans('frontend_message.checkout')}}</h3>
                            <div class="your-order-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-name">{{trans('frontend_message.products')}}</th>
                                            <th class="cart-product-total">{{trans('frontend_message.total')}}</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>{{trans('frontend_message.card')}} {{trans('frontend_message.total')}}</th>
                                            <td><span class="amount">{{number_format((float)($total))}} TMT</span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>{{trans('frontend_message.orderr_total')}}</th>
                                            <td><strong><span class="amount">{{number_format((float)($total))}} TMT</span></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div class="order-button-payment">
                                        <input value="{{trans('frontend_message.order_end')}}" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>


        <!-- Uren's Checkout Area End Here -->
@endsection
@section('srcipt')
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<script>
    $('#something').click(function() {
        location.reload();
    });
    </script>
<script>
        swal({
            title: "It worked!",
            text:  "The form was submitted",
            type: "success",
            timer: 2500,
            showConfirmButton: false
        });
</script>

@endsection