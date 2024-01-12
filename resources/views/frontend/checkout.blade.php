@extends('frontend.layouts.header')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

@endsection
@section('content')
<form action="{{route('order-store')}}" method="POST">
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
                                            <input name="name" placeholder="" type="text" value="{{Auth::user()->name}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>{{trans('frontend_message.user_surname')}} <span class="required">*</span></label>
                                            <input name="surname" placeholder="" type="text" value="{{Auth::user()->surname}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>{{trans('frontend_message.user_address1')}} <span class="required">*</span></label>
                                            <input name="address" placeholder="Street address" type="text" value="{{Auth::user()->address}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Email <span class="required">*</span></label>
                                            <input name="email" placeholder="" type="email" value="{{Auth::user()->email}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>{{trans('frontend_message.user_phone')}} <span class="required">*</span></label>
                                            <input name="phoneNumber" type="text" value="{{Auth::user()->phoneNumber}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="different-address">
                                    <div class="ship-different-title">
                                        <h3>
                                            <label>{{trans('frontend_message.user_addres2')}}</label>
                                            <input id="ship-box" type="checkbox">
                                        </h3>
                                    </div>
                                    <div id="ship-box-info" class="row">
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>{{trans('frontend_message.user_addres2')}} <span class="required">*</span></label>
                                                <input name="address2" placeholder="Street address" type="text" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-notes">
                                        <div class="checkout-form-list checkout-form-list-2">
                                            <label>Bellik</label>
                                            <textarea id="checkout-mess" cols="30" rows="10" name="description" placeholder=""></textarea>
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
                                        
                                        @foreach($cartProducts as $cartProduct)

                                        <tr id="sid{{$cartProduct->id}}" class="productData">
                                            
                                            <td class="uren-product-name"><a href="javascript:void(0)">{{$cartProduct->product['name_'.$locale]}}</a></td>
                                            <td class="uren-product-price"><span class="amount">{{$cartProduct->product['code']}}</span></td>
                                            
                                            <td class="uren-product-price"><span class="amount">@if (Auth::user()->price_type == 'tmt')
                                                {{number_format((float)($cartProduct->product['all_price']))}} TMT
                                                @elseif(Auth::user()->price_type == 'usd')
                                                {{number_format((float)($cartProduct->product['all_price']))}}
                                                @endif</span></td>
                                            <td class="uren-product-price"><span class="amount">{{$cartProduct['quantity']}}</span></td>

                                            <input type="hidden" class="qtyprice" id="qtyprice{{$cartProduct->id}}" name="qtyprice" value="{{$cartProduct->product->price}}">

                                          
                                        </tr>
                                        @php number_format((float)($total += (float)$cartProduct->product->all_price * (float)$cartProduct->quantity)) ; @endphp
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
                                            <td><span class="amount">@if (Auth::user()->price_type == 'tmt')
                                                {{number_format((float)($total))}} TMT
                                                @elseif(Auth::user()->price_type == 'usd')
                                                {{number_format((float)($total))}} 
                                                @endif </span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>{{trans('frontend_message.orderr_total')}}</th>
                                            <td><strong><span class="amount">@if (Auth::user()->price_type == 'tmt')
                                                {{number_format((float)($total))}} TMT
                                                @elseif(Auth::user()->price_type == 'usd')
                                                {{number_format((float)($total))}} 
                                                @endif </span></strong></td>
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
        swal({
            title: "It worked!",
            text:  "The form was submitted",
            type: "success",
            timer: 2500,
            showConfirmButton: false
        });
</script>

@endsection