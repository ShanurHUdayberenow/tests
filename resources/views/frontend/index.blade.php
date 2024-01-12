@extends('frontend.layouts.header')
@section('style')
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
    word-break: break-word;
}

.features .icon-box:hover {
    box-shadow: 0 0 8px rgba(0, 0, 0, .5);
    transform: scale(1.1);
    border: 1px solid #00a8e1;
}

.features .icon-box:hover>a {
    color: {
            {
            $color_navbar->color_category2
        }
    }

    ;
}

.features .icon-box:hover>a {
    color: {
            {
            $color_navbar->color_category2
        }
    }

     !important;
    text-decoration: none;
}

.features .icon-box:hover>a([href]):not([tabindex]):hover {
    color: {
            {
            $color_navbar->color_category2
        }
    }

    ;
}

.features .icon-box>a {
    color: {
            {
            $color_navbar->color_category1
        }
    }

    ;
}

.features .icon-box:hover a .second-img {
    display: block;
}

.features .icon-box:hover a .first-img {
    display: none;
}

.second-img {
    display: none;
}

.features .icon-box i {
    font-size: 40px;
    padding-right: 10px;
    line-height: 1;
}

.features .icon-box h3 {
    font-weight: 700;
    margin: 0;
    padding: 0;
    line-height: 1;
    font-size: 20px;

    /* color: black; */
}

.features .icon-box img {
    width: 22%;
    height: auto;
}

.features .icon-box h3 a {
    /* color: black; */
    transition: ease-in-out 0.3s;
}

.features .icon-box a {
    display: flex;
    align-items: center;
}

.features .icon-box a:hover {

    /* color: #0c01eb; */
    transition: ease-in-out 0.3s;

}



.carousel {
    position: relative;
}

.carousel.pointer-event {
    touch-action: pan-y;
}

.carousel-inner {
    position: relative;
    width: 100%;
    overflow: hidden;
}

.carousel-inner::after {
    display: block;
    clear: both;
    content: "";
}

.carousel-item {
    position: relative;
    display: none;
    float: left;
    width: 100%;
    margin-right: -100%;
    backface-visibility: hidden;
    transition: transform 0.6s ease-in-out;
}

@media (prefers-reduced-motion: reduce) {
    .carousel-item {
        transition: none;
    }
}

.carousel-item.active,
.carousel-item-next,
.carousel-item-prev {
    display: block;
}

.carousel-item-next:not(.carousel-item-left),
.active.carousel-item-right {
    transform: translateX(100%);
}

.carousel-item-prev:not(.carousel-item-right),
.active.carousel-item-left {
    transform: translateX(-100%);
}

.carousel-fade .carousel-item {
    opacity: 0;
    transition-property: opacity;
    transform: none;
}

.carousel-fade .carousel-item.active,
.carousel-fade .carousel-item-next.carousel-item-left,
.carousel-fade .carousel-item-prev.carousel-item-right {
    z-index: 1;
    opacity: 1;
}

.carousel-fade .active.carousel-item-left,
.carousel-fade .active.carousel-item-right {
    z-index: 0;
    opacity: 0;
    transition: opacity 0s 0.6s;
}

@media (prefers-reduced-motion: reduce) {

    .carousel-fade .active.carousel-item-left,
    .carousel-fade .active.carousel-item-right {
        transition: none;
    }
}

.carousel-control-prev,
.carousel-control-next {
    position: absolute;
    top: 0;
    bottom: 0;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 15%;
    color: #fff;
    text-align: center;
    opacity: 0.5;
    transition: opacity 0.15s ease;
}

@media (prefers-reduced-motion: reduce) {

    .carousel-control-prev,
    .carousel-control-next {
        transition: none;
    }
}

.carousel-control-prev:hover,
.carousel-control-prev:focus,
.carousel-control-next:hover,
.carousel-control-next:focus {
    color: #fff;
    text-decoration: none;
    outline: 0;
    opacity: 0.9;
}

.carousel-control-prev {
    left: 0;
}

.carousel-control-next {
    right: 0;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    display: inline-block;
    width: 20px;
    height: 20px;
    background: no-repeat 50% / 100% 100%;
}

.carousel-control-prev-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e");
}

.carousel-control-next-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e");
}

.carousel-indicators {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 15;
    display: flex;
    justify-content: center;
    padding-left: 0;
    margin-right: 15%;
    margin-left: 15%;
    list-style: none;
}

.carousel-indicators li {
    box-sizing: content-box;
    flex: 0 1 auto;
    width: 30px;
    height: 3px;
    margin-right: 3px;
    margin-left: 3px;
    text-indent: -999px;
    cursor: pointer;
    background-color: #fff;
    background-clip: padding-box;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    opacity: .5;
    transition: opacity 0.6s ease;
}

@media (prefers-reduced-motion: reduce) {
    .carousel-indicators li {
        transition: none;
    }
}

.carousel-indicators .active {
    opacity: 1;
}

.carousel-caption {
    position: absolute;
    right: 15%;
    bottom: 20px;
    left: 15%;
    z-index: 10;
    padding-top: 20px;
    padding-bottom: 20px;
    color: #fff;
    text-align: center;
}

#header-carousel img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.carousel-indicators li {
    width: 15px;
    height: 15px;
    margin: 0 3px 12px 3px;
    background: transparent;
    border: 1px solid #00a8e1;
    transition: .5s;
}

.carousel-indicators .active {
    width: 30px;
    background: #00a8e1;
}

.carousel-caption {
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 1;
}

.section-title_area h3 {
    color: black;
}

.section-title_area h3:hover {
    color: #00a8e1;
}

.header-main_area-3 .header-middle_area .header-logo_area {
    padding: 22px 0px 10px 0px;
}

@media (max-width: 767px) {
    .header-main_area-3 .header-middle_area .header-logo_area {
        padding: 0px;
    }

    .mt-4,
    .my-4 {
        margin-top: 0rem !important;
    }
}
</style>
@endsection

@section('features')
<section id="features" class="features" style="margin-bottom: 25px;">
    <div class="container-fluid" data-aos="fade-up">

        <div class="row">


            @foreach($categories as $category)
            @if($category->status == 'approved')
            <div class="col-lg-3 col-md-4 mt-4 mt-md-0 col-12 test">
                <div class="icon-box">
                    <a href="{{ route('products.category', $category->slug) }}">
                        @if($category->images != 'null')
                        <img class="fixed-imgs first-img" src="{{$category['images']['1']['image']}}"
                            alt="icon-img">&nbsp;&nbsp;
                        <img class="fixed-imgs second-img" src="{{$category['images']['0']['image']}}"
                            alt="icon-img">&nbsp;&nbsp;
                        @endif

                        <h3 style="white-space: pre-line;" class="">{{$category['name_'.$locale]}}</h3>
                    </a>

                </div>
            </div>
            @endif
            @endforeach



        </div>

    </div>
</section>
@endsection

@section('content')

<!-- Carousel Start -->
<div class="container-fluid" style="margin-top: 25px;">
    <div class="row">
        <div class="col-lg-12">
            <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php $number=0; ?>
                    @foreach($banners as $banner)
                    <li data-target="#header-carousel" data-slide-to="{{$number++}}" class="{{$banner->link}}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($banners as $banner)
                    <div class="carousel-item position-relative {{$banner->link}}">
                        <img class="position-absolute w-100 h-100" src="{{$banner->image}}" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->






<!-- Begin Uren's Shop Left Sidebar Area -->

<div class="shop-content_wrapper" style="padding-top: 15px;">
    <div class="container-fluid">
        <div class="row">
            @foreach($pacets as $pacet)
            @if($pacet->status == 'approved')
            <div class="col-lg-12 order-1 order-lg-2 order-md-2">
                <div class="section-title_area" style="border-bottom: 4px solid #e31e24;">
                    <a href="#"><img src="{{$pacet->image}}" width="100px"></a>
                    <a href="#">
                        <h3>{{$pacet['name_'.$locale]}}</h3>
                    </a>
                </div>
                <div class="shop-product-wrap img-hover-effect_area row">
                    @foreach($pacet->pacetProducts as $product)
                    @if($product->product != null)
                    @if($product->product->status == 'approved')
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 productData">
                        <div class="product-slide_item">
                            <div class="inner-slide">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{route('product-detail.show',$product->product->id)}}">
                                            @if($product->product['images'] != null)

                                            <img class="primary-img lazyload" data-sizes="auto"
                                                data-src="{{$product->product['images']['0']['image']}}"
                                                src="{{$product->product['images']['0']['image']}}"
                                                data-srcset="{{$product->product['images']['0']['image']}},{{$product->product['images']['0']['image']}},{{$product->product['images']['0']['image']}}"
                                                alt="Uren's Product Image">
                                            @endif

                                            @if($product->product['images'] == null)

                                            <img class="primary-img" loading="lazy"
                                                src="{{asset('storage/images/ae-logo.png')}}"
                                                alt="{{asset('storage/images/ae-logo.png')}}">
                                            @endif
                                        </a>
                                        <div class="sticker-area-2">
                                            @if (Auth::user())
                                            @if($product->product->user_discount)
                                            <span class="sticker-2">-{{$product->product['user_discount']}}%</span>
                                            @elseif($product->product['discount'] != null)
                                            <span class="sticker-2">-{{$product->product['discount']}}%</span>
                                            @endif
                                            @else
                                            @if($product->product->guestDiscount != null)
                                            <span class="sticker-2">-{{$product->product['guestDiscount']}}%</span>
                                            @endif
                                            @endif
                                            @if($product->product['isNew_'.$locale] != null)<i
                                                class="new-stock"><i>{{$product->product['isNew_'.$locale]}}</i></i>@endif


                                        </div>

                                    </div>

                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h6><a class="product-name"
                                                    href="{{route('product-detail.show',$product->product->id)}}">{{Illuminate\Support\Str::limit($product->product['name_'.$locale],25)}}</a>
                                            </h6>
                                            @if (Auth::user())
                                            @if (Auth::user()->price_type == 'tmt')
                                            <div class="price-box">
                                                <span
                                                    class="new-price">{{number_format((float)($product->product['all_price']))}}
                                                    TMT</span>
                                            </div>
                                            @elseif(Auth::user()->price_type == 'usd')
                                            <div class="price-box">
                                                <span
                                                    class="new-price">{{number_format((float)($product->product['all_price']))}}</span>
                                            </div>
                                            @endif
                                            @else
                                            <div class="price-box">
                                                @if($product->product->guestDiscount == null)

                                                <span
                                                    class="new-price">{{number_format((float)($product->product['guest_all_price']))}}
                                                    TMT</span>
                                                @else
                                                <span
                                                    class="new-price">{{number_format((float)($product->product['guest_all_price']))}}
                                                    TMT</span>
                                                <span
                                                    class="old-price">{{number_format((float)($product->product['guestPrice']))}}
                                                    TMT</span>
                                                @endif
                                            </div>
                                            @endif
                                            <br>
                                            @if($product->product->quantity <= 0) <div class="price-box">
                                                <span class=""
                                                    style="color: red;">{{trans('frontend_message.no_product')}}</span>
                                        </div>
                                        @else
                                        <div class="price-box">
                                            <span class="" style="color: white;"></span>
                                        </div>
                                        @endif

                                    </div>
                                    <ul>

                                        <input type="hidden" value="{{$product->product['id']}}" class="productId">
                                        <input type="hidden" value="{{$product->product['code']}}" class="productCode">

                                        @if($product->product->quantity <= 0) <a class="uren-add_cart addToCarts"
                                            href="#">
                                            <li class="carts" data-toggle="tooltip" data-placement="top"
                                                title="Add To Cart"><i style="font-size: 20px;color:white"
                                                    class="ion-bag"></i>
                                            </li></a>
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

                </div>
                @endif
                @endif
                @endforeach
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
</div>
<!-- Uren's Shop Left Sidebar Area End Here -->


<!-- Begin Uren's Brand Area -->
<div class="uren-brand_area" style="padding: 15px 0 15px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title_area">
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Uren's Brand Area End Here -->

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
<script>
$(document).ready(function() {
    $('.addToCarts').click(function(e) {
        e.preventDefault();

        var productId = $(this).closest('.productData').find('.productId').val();
        var productCode = $(this).closest('.productData').find('.productCode').val();



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