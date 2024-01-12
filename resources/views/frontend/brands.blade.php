@extends('frontend.layouts.header')
@section('style')
<style>
.brands {
    margin: 25px 0px 25px 0px;
}

.card {
    border-radius: 3%;
}
.brand_name h3{
    color: black;
    margin-left: 15px;
}
@media only screen and (max-width: 767px) {
    .product-img {
        height: 50px;
        position: relative;
       overflow: hidden;
    }
    h5{
        font-size: 14px;
    }
    
}


@media only screen and (min-width: 1500px) and (max-width: 2200px) {
    .product-img {
        height: 150px;
        position: relative;
        overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;

    }

}

@media only screen and (min-width: 767px) and (max-width: 1500px) {
  .product-img {
      height: 150px;
      position: relative;
      overflow: hidden;
  }
}

.product-img img {
  width: 80%;
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.product-img{
  border-bottom: 1px solid #00a8e1;
}
</style>
@endsection
@section('content')
<div class="brands">
    <div class="container-fluid">
        <div class="row">
            {{-- <div class="brand_name">
                <h3>{{trans('frontend_message.brand')}}</h3>
            </div> --}}
            @foreach($brands as $brand)
            @if($brand->status == 'approved')
            <div class="card-deck col-lg-2 col-md-3 col-sm-4 col-6">
            
                    <div class="card">
                        <a href="{{ route('products.brand', $brand->slug) }}" style="align-items: center;justify-content: center;">
                            <div class="product-img">
                                <img class="card-img-top" src="{{$brand->image}}" alt="Card image cap">
                            </div>

                            <div class="card-body">
                                <h5 class="card-title text-center">{{Illuminate\Support\Str::limit($brand['name_'.$locale],15)}}</h5>
                            </div>
                        </a>
                    </div>
           
           </div>
           @endif
           @endforeach
        </div>
    </div>
</div>



@endsection