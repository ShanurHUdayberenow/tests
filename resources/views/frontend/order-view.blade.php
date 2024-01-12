@extends('frontend.layouts.header')
@section('content')

@if(Auth::check())
@php $total = 0; @endphp

        <!-- Begin Uren's Cart Area -->
        <div class="uren-cart-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        
                        <form action="{{route('order-store-load', $orderses->id)}}" method="POST">
                            @csrf
                            <div class="table-content table-responsive" id="deletecart">
                                <table class="table cartdelete">
                                    <thead>
                                        <tr>
                                            {{-- <th class="uren-product-thumbnail">Number</th> --}}
                                            <th class="uren-product-thumbnail">{{trans('frontend_message.images')}}</th>
                                            <th class="cart-product-name">{{trans('frontend_message.product')}}</th>
                                            <th class="uren-product-price">{{trans('frontend_message.unit_price')}}</th>
                                            <th class="uren-product-quantity">{{trans('frontend_message.quantity')}}</th>
                                            <th class="uren-product-subtotal">{{trans('frontend_message.total')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $number=1; ?>
                                        
                                    @foreach($orders as $order)
                                    @foreach($order->order_lines as $item)

                                        <tr id="sid{{$item->id}}" class="productData">
                                            {{-- <td class="uren-product-price"><span class="amount">{{$number}}
                                                        <?php $number++ ?></span></td> --}}
                                            <td class="uren-product-thumbnail" width="250px;"><a href="javascript:void(0)">@if($item->product['images'])<img src="{{$item->product['images']['0']['image']}}" alt="Uren's Cart Thumbnail" width="15%">@endif</a></td>
                                            <td class="uren-product-name" width="1000px;"><a href="javascript:void(0)">{{$item->product['name_'.$locale]}}</a></td>
                                            <td class="uren-product-price"><span class="amount">{{$item['price']}}</span></td>
                                            <td class="uren-product-name"><a href="javascript:void(0)">{{$item['quantity']}}</a></td>

                                            

                                            <td class="product-subtotal" id="updatecart"><span class="amount loadcart">{{ number_format((float)((float)$item->price * (float)$item->quantity)) }}</span></td>
                                                
                                        </tr>
                                        @php number_format((float)($total += (float)$item->price * (float)$item->quantity)) ; @endphp
                                    @endforeach
                                    @endforeach
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        <ul>
                                            <li>Subtotal <span>{{number_format((float)($order->price))}}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        <button class="btn btn-primary" type="submit" style="float:right">Täzeden goş</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endif       

@endsection