

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<style>


<style>

    @font-face {
      font-family: "DejaVu Sans";
      font-style: normal;
      font-weight: 400;
      src: url("{{public_path('/storage/dejavu-sans/DejaVuSans.ttf')}}");
      /* IE9 Compat Modes */
      src: 
        local("DejaVu Sans"), 
        local("DejaVu Sans"), 
        url("{{public_path('/storage/dejavu-sans/DejaVuSans.ttf')}}") format("truetype");
    }
    body { 
      font-family: "DejaVu Sans";
      font-size: 12px;
    }
   *{ font-family: DejaVu Sans;
      font-size: 13px;

}

.bloc_1 i {
    font-size: 100px;
    padding: 20px;
    border-radius: 5px;
    color: green;
}

.bloc_2 i {
    font-size: 40px;
    padding: 20px;
    border-radius: 5px;
    color: white;
    background: #ff6720;
}

.tests {
    max-width: max-content;
    margin: auto;
}
.subscribe_area{
    max-width: max-content;
    margin: auto;
}
.bloc_1 span{
    font-size: 20px;
}
.subscribe-form-group span{
    font-size: 20px;
}
.bloc_2{
    max-width: max-content;
    margin: auto;
}


.data span{
    color: black;
    font-size: 16px;
}
.data .last span{
    float: right;
}
.between ul{
    display: flex;
    margin-top: 90px;
}
.ml-autos{
    margin-left: 0px;
}

</style>
<link rel="stylesheet" type="text/css" href="{{public_path('/storage/css/bootstrap.min.css')}}">

@php $total = 0; @endphp

<div class="uren-cart-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="brands text-center" id="printable">
                    <img id="coupon" src="{{public_path('storage/images/brands/1676376821.png')}}" width="120px">
                    <img id="coupon" src="{{public_path('storage/images/brands/1676376812.png')}}" width="120px">
                    <img id="coupon" src="{{public_path('storage/images/brands/1676376804.png')}}" width="120px">
                    <img id="coupon" src="{{public_path('storage/images/brands/1676376795.png')}}" width="120px">
                    <img id="coupon" src="{{public_path('storage/images/brands/1676376787.jpg')}}" width="120px">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="code">
                    <span>{{$orderc->orderNo}}</span>
                </div>
                <div class="date">
                    <span>{{$orderc->date}}</span>
                </div>
                <div class="phone">
                    <span>75-41-60</span>
                </div>
            </div>
            

        </div>
                    
                
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">{{trans('frontend_message.code')}}</th>
                    <th scope="col">{{trans('frontend_message.product')}}</th>
                    <th scope="col">{{trans('frontend_message.quantity')}}</th>
                    <th scope="col">{{trans('frontend_message.unit_price')}}</th>
                    <th scope="col">{{trans('frontend_message.discount')}}</th>
                    <th scope="col">{{trans('frontend_message.discount_price')}}</th>
                    <th scope="col">{{trans('frontend_message.total')}}</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    @if($order->userId == null)
                    @foreach($order->order_lines as $item)
                      <tr>
                        <th scope="row">{{$item->code}}</th>
                        <td>{{$item->product['name_'.$locale]}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{number_format((float)($item->product['guestPrice']))}} TMT</td>
                        <td>{{$item->product['guestDiscount']}}</td>
                        <td>{{number_format((float)($item->price))}} TMT</td>
                        <td>{{number_format((float)($item->price * (float)$item->quantity))}} TMT</td>
                      </tr>
                      @php number_format((float)($total += (float)$item->price * (float)$item->quantity)) ; @endphp                                        
    
                    @endforeach
                    @else
                    @foreach($orders as $order)
                @foreach($order->order_lines as $item)
                  <tr>
                    <th scope="row">{{$item->code}}</th>
                    <td>{{$item->product['name_'.$locale]}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>
                        @if (Auth::user()->price_type == 'tmt')
                                                {{number_format((float)($item->product['all_price']))}} TMT
                                                @elseif(Auth::user()->price_type == 'usd')
                                                {{number_format((float)($item->product['all_price']))}}
                                                @endif
                    </td>
                    <td></td>
                    <td>@if (Auth::user()->price_type == 'tmt')
                        {{number_format((float)($item->product['all_price']))}} TMT
                        @elseif(Auth::user()->price_type == 'usd')
                        {{number_format((float)($item->product['all_price']))}}
                        @endif</td>
                    <td>
                        @if (Auth::user()->price_type == 'tmt')
                        {{number_format((float)($item->price * (float)$item->quantity))}} TMT
                        @elseif(Auth::user()->price_type == 'usd')
                        {{number_format((float)($item->price * (float)$item->quantity))}}
                        @endif

                    </td>
                  </tr>
                  @php number_format((float)($total += (float)$item->price * (float)$item->quantity)) ; @endphp                                        

                @endforeach
                @endforeach
                      @endif
                    @endforeach
                </tbody>
              </table>
              <div class="row">
                <div class="col-12">
                    <div class="pechat" style="margin-top: 400px;display:inline-table">
                        <div class="pechatt">
                            <span>Tabşyran:_____________</span>
                            <span>Kabul eden:______________</span>
                        </div>
                    </div>
                    @if($orderc->userId == null)
                    <div class="total" style="margin-top: 380px;float:right;margin-right:40px;display:inline-table">
                        <div class="total1">
                            <span>Umumy: {{number_format((float)($total))}}</span>
                        </div>
                        <div class="total3">
                            <span>Tölegi: {{number_format((float)($total))}}</span>
                        </div>
                    </div>
                    @elseif($orderc->userId != null)
                    <div class="total" style="margin-top: 380px;float:right;margin-right:40px;display:inline-table">
                        <div class="total1">
                            <span>Umumy: @if ($orderc->user->price_type == 'tmt')
                                {{number_format((float)($total))}} TMT
                                @elseif($orderc->user->price_type == 'usd')
                                {{number_format((float)($total))}} 
                                @endif</span>
                        </div>
                        <div class="total3">
                            <span>Tölegi: @if ($orderc->user->price_type == 'tmt')
                                {{number_format((float)($total))}} TMT
                                @elseif($orderc->user->price_type == 'usd')
                                {{number_format((float)($total))}} 
                                @endif</span>
                        </div>
                    </div>
                    @endif
                </div>
              </div>
        </div>
    </div>






<script src="{{public_path('/storage/js/bootstrap.min.js')}}"></script>
