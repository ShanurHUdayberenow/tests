@extends('frontend.layouts.header')
@section('style')
<link type="text/css" href="{{ asset('assets/css/price.css') }}" rel="stylesheet" media="all">

<style>
/*--------------------------------------------------------------
# Features
--------------------------------------------------------------*/
.features .icon-box {
    display: flex;
    align-items: center;
    padding: 20px;
    margin-top: 15px;
    background: #fff;
    box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
    transition: ease-in-out 0.3s;
    border-radius: 20px;
    transition: all .3s;
}

.features .icon-box:hover {
    box-shadow: 0 0 8px rgba(0, 0, 0, .5);
    transform: scale(1.1);
}

.features .icon-box i {
    font-size: 32px;
    padding-right: 10px;
    line-height: 1;
}

.features .icon-box h3 {
    font-weight: 700;
    margin: 0;
    padding: 0;
    line-height: 1;
    font-size: 16px;

}

.features .icon-box img {
    width: 20%;
    height: auto;
}

.features .icon-box h3 a {
    color: #0065a8;
    transition: ease-in-out 0.3s;
}

.features .icon-box h3 a:hover {
    color: #009edf;
}

.col-lg-25{
    -webkit-box-flex:0;
    -ms-flex:0 0 20%;
    flex:0 0 20%;
    max-width:20%
}
.col-xl-25{
    -webkit-box-flex:0;
    -ms-flex:0 0 20%;
    flex:0 0 20%;
    max-width:20%
}
@media only screen and (min-width: 1500px) and (max-width: 2200px) {

  .col-xl-7{-ms-flex:0 0 20%;flex:0 0 20%;max-width:20%}
}
.blog{
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
}
.blog a{
    margin-left: 10px;
    margin-top: 12px;
}
.blog i{
    color: #000000;
}
</style>
@endsection


@section('content')


<!-- Begin Uren's Shop Left Sidebar Area -->
<form class="" id="search-form" action="{{ route('filter-products') }}" method="GET">
    @isset($categoryId)
    <input type="hidden" name="category" value="{{ \App\Models\Category::find($categoryId)->slug }}">
    @endisset
    @isset($subcategoryId)
    <input type="hidden" name="subcategory" value="{{ \App\Models\Subcategory::find($subcategoryId)->slug }}">
    @endisset
    @isset($brandId)
    <input type="hidden" name="brand" value="{{ \App\Models\Brand::find($brandId)->slug }}">
    @endisset
    <div class="shop-content_wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-5 order-2 order-lg-1 order-md-1">
                    <div class="uren-sidebar-catagories_area">
                        <div class="category-module uren-sidebar_categories">
                            <div class="category-module_heading">
                                <h5><a href="{{ route('products') }}"
                                    style="color: #222">{{trans('frontend_message.category')}}</a></h5>
                            </div>
                            <div class="module-body">
                                <ul class="module-list_item">
                                    <li>
                                    @if(!isset($categoryId) && !isset($categoryId) && !isset($subcategoryId) &&
                                    !isset($subsubcategoryId))
                                    @foreach($categories as $category)
                                    @if($category->status == 'approved')
                                    <li class="category"> <a
                                            href="{{ route('products.category', $category->slug) }}">{{$category['name_'.$locale]}}
                                        </a>
                                    </li>

                                    @endif
                                    @endforeach
                                    @endif
                                    @if(isset($categoryId))
                                    <li class="blog"
                                        class="category"><i class="fa fa-caret-down" style="font-size:30px;color:#00a8e1;"></i><a href="{{ route('products') }}">{{trans('frontend_message.all_categories')}}</a></li>
                                    <li class="blog"
                                        class="category"><i class="" style="margin-left:12px;"></i><i class="fa fa-caret-down" style="font-size:30px;color:#00a8e1;"></i> <a
                                            href="{{ route('products.category', \App\Models\Category::find($categoryId)->slug) }}">{{  (\App\Models\Category::find($categoryId)['name_'.$locale]) }}</a>
                                            &nbsp;                                       </li>

                                    @foreach (\App\Models\Category::find($categoryId)->subcategories as $key2 =>
                                    $subcategory)
                                    @if($subcategory->status == 'approved')
                                    <li class="blog"
                                    class="category"><i class="" style="margin-left:30px;"></i><i class="fa fa-caret-right" style="font-size:30px;color:#00a8e1;"></i><a
                                            href="{{ route('products.subcategory', $subcategory->slug) }}">{{  $subcategory['name_'.$locale] }}</a>&nbsp;
                                    </li>
                                    @endif
                                    @endforeach
                                    @endif
                                    

                                    @if(isset($subcategoryId))
                                    <li class="blog"
                                        class="category"><i class="fa fa-caret-down" style="font-size:30px;color:#00a8e1;"></i><a href="{{ route('products') }}">{{trans('frontend_message.all_categories')}}</a></li>
                                    <li class="blog"
                                        class="category"><i class="" style="margin-left:12px;"></i><i class="fa fa-caret-down" style="font-size:30px;color:#00a8e1;"></i><a
                                            href="{{ route('products.category', \App\Models\Subcategory::find($subcategoryId)->category->slug) }}">{{ (\App\Models\Subcategory::find($subcategoryId)->category['name_'.$locale]) }}</a>
                                    </li>
                                    <li class="blog"
                                        class="category"><i class="" style="margin-left:30px;"></i><i class="fa fa-caret-right" style="font-size:30px;color:#00a8e1;"></i><a
                                            href="{{ route('products.subcategory', \App\Models\Subcategory::find($subcategoryId)->slug) }}">{{ (\App\Models\Subcategory::find($subcategoryId)['name_'.$locale]) }}</a>
                                            &nbsp;
                                        </li>
                                    @endif




                                </ul>
                            </div>
                        </div>

                        <div class="uren-sidebar_categories">
                            <div class="uren-categories_title">
                                <h5>{{trans('frontend_message.price')}}</h5>
                            </div>
                            <div class="card-body">
                                <div class="bg-white sidebar-box mb-3">

                                    <div class="box-content">
                                        <div class="range-slider-wrapper mt-3">

                                            <!-- Range slider container -->
                                            <div id="input-slider-range"
                                                data-range-value-min="@if(count(\App\Models\Product::query()->get()) < 1) 0 @else {{ (\App\Models\Product::query())->get()->min('all_price') }} @endif"
                                                data-range-value-max="@if(count(\App\Models\Product::query()->get()) < 1) 0 @else {{ (\App\Models\Product::query())->get()->max('all_price') }} @endif">
                                            </div>

                                            <!-- Range slider values -->
                                            <div class="row">
                                                <div class="col-6">
                                                    <span class="range-slider-value value-low" @if (isset($min_price))
                                                        data-range-value-low="{{ $min_price }}"
                                                        @elseif($products->min('all_price') > 0)
                                                        data-range-value-low="{{ $products->min('all_price') }}"
                                                        @else
                                                        data-range-value-low="0"
                                                        @endif
                                                        id="input-slider-range-value-low">
                                                </div>

                                                <div class="col-6 text-right">
                                                    <span class="range-slider-value value-high" @if (isset($max_price))
                                                        data-range-value-high="{{ $max_price }}"
                                                        @elseif($products->max('all_price') > 0)
                                                        data-range-value-high="{{ $products->max('all_price') }}"
                                                        @else
                                                        data-range-value-high="0"
                                                        @endif
                                                        id="input-slider-range-value-high">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="category-module uren-sidebar_categories">
                            <div class="category-module_heading">
                                <h5>{{trans('frontend_message.brand')}}</h5>
                            </div>
                            <div class="module-body">
                                <ul class="module-list_item">
                                    <li>
                                        @foreach($brands as $brand)
                                        <a href="{{ route('products.brand', $brand->slug) }}"
                                            style="color: #222">{{$brand['name_'.$locale]}} </a>
                                        <hr>
                                        @endforeach
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <input type="hidden" name="min_price" @isset($min_price) value="{{ $min_price }}" @endisset>
                <input type="hidden" name="max_price" @isset($max_price) value="{{ $max_price }}" @endisset>
                <div class="col-lg-9 col-md-7 order-1 order-lg-2 order-md-2">
                    <div class="shop-toolbar">
                        
                        <div class="product-item-selection_area">
                            <div class="product-short">
                                <label class="select-label">Sort By:</label>
                                <select class="myniceselect nice-select" id="sort_by" name="sort_by"
                                    onchange="filter()">
                                    <option value="1" @isset($sort_by) @if ($sort_by=='1' ) selected @endif @endisset>
                                        {{trans('frontend_message.new')}}
                                    </option>

                                    <option value="2" @isset($sort_by) @if ($sort_by=='2' ) selected @endif @endisset>
                                        {{trans('frontend_message.old')}}
                                    </option>
                                    <option value="3" @isset($sort_by) @if ($sort_by=='3' ) selected @endif @endisset>
                                        {{trans('frontend_message.price_high')}}</option>
                                    <option value="4" @isset($sort_by) @if ($sort_by=='4' ) selected @endif @endisset>
                                        {{trans('frontend_message.price_low')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="shop-product-wrap grid row">
                        @foreach($products as $product)
                        @if($product->status == 'approved')
                        <div class="col-lg-3 col-xl-7 col-md-6 col-sm-4 col-6 productData">
                            <div class="product-slide_item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="{{route('product-detail.show',$product->id)}}">
                                                @if($product['images'] != null)
                                                <img class="primary-img" src="{{$product['images']['0']['image']}}"
                                                    alt="Uren's Product Image">
                                                @endif

                                                @if($product['images'] == null)
                                                <img class="primary-img" src="{{asset('storage/images/ae-logo.png')}}"
                                                    alt="{{asset('storage/images/ae-logo.png')}}">
                                                @endif
                                            </a>
                                            <div class="sticker-area-2">
                                        @if (Auth::user())
                                        @if($product->user_discount)
                                              <span class="sticker-2">-{{$product['user_discount']}}%</span>
                                        @elseif($product['discount'] != null)
                                              <span class="sticker-2">-{{$product['discount']}}%</span>
                                        @endif
                                        @else
                                        @if($product->guestDiscount != null)
                                        <span class="sticker-2">-{{$product['guestDiscount']}}%</span>
                                        @endif
                                        @endif
                                        @if($product['isNew_'.$locale] != null)<i class="new-stock"><i>{{$product['isNew_'.$locale]}}</i></i>@endif

                                        </div>

                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <h6><a class="product-name"
                                                        href="{{route('product-detail.show',$product->id)}}">{{Illuminate\Support\Str::limit($product['name_'.$locale],25)}}</a>
                                                </h6>
                                            @if (Auth::user())
                                            @if (Auth::user()->price_type == 'tmt')
                                            <div class="price-box">
                                                <span class="new-price">{{number_format((float)($product['all_price']))}} TMT</span>
                                            </div>
                                            @elseif(Auth::user()->price_type == 'usd')
                                            <div class="price-box">
                                                <span class="new-price">{{number_format((float)($product['all_price']))}}</span>
                                            </div>
                                            @endif
                                            @else
                                            <div class="price-box">
                                            @if($product->guestDiscount == null)
                                              
                                              <span class="new-price">{{number_format((float)($product['guest_all_price']))}} TMT</span>
                                            @else 
                                              <span class="new-price">{{number_format((float)($product['guest_all_price']))}} TMT</span>
                                              <span class="old-price">{{number_format((float)($product['guestPrice']))}} TMT</span>
                                            @endif
                                            </div>
                                            @endif
                                            <br>
                                            @if($product->quantity <= 0)
                                            <div class="price-box">
                                                <span class="" style="color: red;">{{trans('frontend_message.no_product')}}</span>
                                            </div>
                                            @else
                                            <div class="price-box">
                                                <span class="" style="color: white;"></span>
                                            </div>
                                            @endif
                                            </div>
                                            <ul>
                                                <input type="hidden" value="{{$product['id']}}" class="productId">
                                                <input type="hidden" value="{{$product['code']}}" class="productCode">
                                                @if($product->quantity <= 0)
                                                <a class="uren-add_cart addToCarts" href="#">
                                                    <li class="carts" data-toggle="tooltip" data-placement="top"
                                                        title="Add To Cart"><i style="font-size: 20px;color:white"
                                                            class="ion-bag"></i>
                                                    </li>
                                                </a>
                                                @else
                                                <a class="uren-add_cart addToCart" href="#">
                                                    <li class="carts" data-toggle="tooltip" data-placement="top"
                                                        title="Add To Cart"><i style="font-size: 20px;color:white"
                                                            class="ion-bag"></i>
                                                    </li>
                                                </a>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-slide_item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{route('product-detail.show',$product->id)}}">
                                        </a>
                                        <div class="sticker-area-2">
                                            @if (Auth::user())
                                            @if($product->user_discount)
                                                  <span class="sticker-2">-{{$product['user_discount']}}%</span>
                                            @elseif($product['discount'] != null)
                                                  <span class="sticker-2">-{{$product['discount']}}%</span>
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            
                                            <div class="price-box">
                                                @if($product['isNew_'.$locale] != null)
                                                <span class="new-price" style="background: #0060aa;padding: 3px;color:white">{{$product['isNew_'.$locale]}}</span>
                                                @endif
                                            </div>
                                            <h6><a class="product-name"
                                                    href="{{route('product-detail.show',$product->id)}}">{{$product['name_'.$locale]}}</a>
                                            </h6>
                                            @if (Auth::user())
                                            <div class="price-box">
                                                <span class="new-price">{{number_format((float)($product['price']), 2)}}
                                                    TMT</span>
                                            </div>
                                            @endif
                                            <div class="product-short_desc">
                                                <p>{{$product['description_'.$locale]}}</p>
                                            </div>
                                            
                                        </div>
                                        <div class="add-actions">
                                            <ul>
                                            @if($product->quantity <= 0)
                                                <li><a class="uren-add_cart addToCarts" href="#" data-toggle="tooltip"
                                                        data-placement="top" title="Add To Cart"><i
                                                            class="ion-bag"></i></a>
                                                </li>
                                            @else
                                                <li><a class="uren-add_cart addToCart" href="#" data-toggle="tooltip"
                                                        data-placement="top" title="Add To Cart"><i
                                                            class="ion-bag"></i></a>
                                                </li>
                                            @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="uren-paginatoin-area">
                                <div class="row">
                                    {{$products->links('frontend.partials.my-paginate')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Uren's Shop Left Sidebar Area End Here -->
@endsection

@section('script')
<!-- Plugins: Sorted A-Z -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/nouislider.min.js') }}"></script>


<!-- App JS -->
<script src="{{ asset('assets/js/active-shop.js') }}"></script>




<script type="text/javascript">
function filter() {
    $('#search-form').submit();
}
</script>
<script type="text/javascript">
function rangefilter(arg) {
    $('input[name=min_price]').val(arg[0]);
    $('input[name=max_price]').val(arg[1]);
    filter();
}
</script>


<script>
$(document).ready(function() {
    $('.addToCart').click(function(e) {
        e.preventDefault();

        var productId = $(this).closest('.productData').find('.productId').val();
        var productCode = $(this).closest('.productData').find('.productCode').val();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'productId': productId,
                'productCode': productCode,
                'productQty': 1,
            },
            success: function(data) {
                $('#totalajaxcall').load(location.href + ' .addtocartload');
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
                    title: 'Haryt üstünlikli goşuldy'
                });
                console.log(data);
                document.getElementById('total-count').innerText = data.card_count;
            },
            error: function(data) {
                $('#totalajaxcall').load(location.href + ' .addtocartload');
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
                document.getElementById('total-count').innerText = data.card_count;
            }



        });



    });


});
</script>
<script>
$(document).ready(function() {
    $('.addToCarts').click(function(e) {
        e.preventDefault();

        var productId = $(this).closest('.productData').find('.productId').val();
        var productId = $(this).closest('.productData').find('.productCode').val();

        $.ajax({
            method: "POST",
            url: "/add-to-carts",
            data: {
                'productId': productId,
                'productCode': productCode,
                'productQty': 1,
            },
            error: function(data) {
                $('#totalajaxcall').load(location.href + ' .addtocartload');
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
                    text: 'Wagtlaýyn elýeterli dal',
                    icon: 'error',
                    confirmButtonText: 'Cool'
                })
                console.log(data);
                document.getElementById('total-count').innerText = data.card_count;
            }



        });



    });


});
</script>

@endsection