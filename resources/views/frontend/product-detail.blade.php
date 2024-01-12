@extends('frontend.layouts.header')

@section('style')
<link rel="stylesheet" href="{{asset('../assets/js/xzoom.css')}}">
@endsection

@section('content')
<!-- Begin Uren's Single Product Area -->
<div class="sp-area">
    <div class="container-fluid">
        <div class="sp-nav productData">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="sp-img_area">
                        <div class="sp-img_slider slick-img-slider uren-slick-slider" data-slick-options='{
                                "slidesToShow": 1,
                                "arrows": false,
                                "fade": true,
                                "draggable": false,
                                "swipe": false,
                                "asNavFor": ".sp-img_slider-nav"
                                }'>
                            <div class="single-slide red">
                            @if($product['images'] != null)

                                <img class="xzoom" id="xzoom-default" xoriginal="{{$product['images']['0']['image']}}" src="{{$product['images']['0']['image']}}" alt="Uren's Product Image">
                                @endif
                            @if($product['images'] == null)

                                <img src="{{asset('storage/images/ae-logo.png')}}" alt="Uren's Product Image">
                                @endif

                            </div>
                        </div>
                        <div class="sp-img_slider-nav slick-slider-nav uren-slick-slider slider-navigation_style-3"
                            data-slick-options='{
                                "slidesToShow": 3,
                                "asNavFor": ".sp-img_slider",
                                "focusOnSelect": true,
                                "arrows" : true,
                                "spaceBetween": 30
                                }' data-slick-responsive='[
                                        {"breakpoint":1501, "settings": {"slidesToShow": 3}},
                                        {"breakpoint":992, "settings": {"slidesToShow": 4}},
                                        {"breakpoint":768, "settings": {"slidesToShow": 3}},
                                        {"breakpoint":575, "settings": {"slidesToShow": 2}}
                                    ]'>
                                    @if($product['images'] != null)

                            @foreach($product['images'] as $item)
                            <div class="single-slide red xzoom-thumbs">
                                <a href="{{$item['image']}}"><img class="xzoom-gallery" width="80%" src="{{$item['image']}}"  xpreview="{{$item['image']}}"></a>

                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="sp-content">
                        <div class="sp-heading">
                            <h5><a href="#">{{$product['name_'.$locale]}}</a></h5>
                        </div>
                        <div class="rating-box">
                            @if($product['isNew_'.$locale] != null)
                                <span class="" style="background: green;padding: 3px;color:white">{{$product['isNew_'.$locale]}}</span>
                            @endif   
                        </div>
                        <div class="rating-box">
                            @if($product['guestDiscount'] != null)
                                <span class="" style="background: #0060aa;padding: 3px;color:white">{{$product['guestDiscount']}} %</span>
                            @endif   
                        </div>
                        @if($product->quantity <= 0)
                            <div class="rating-box">
                                <span class="" style="color: red;">{{trans('frontend_message.no_product')}}</span>
                            </div>
                        @endif
                        <div class="sp-essential_stuff">
                            <ul>
                                <li>{{trans('frontend_message.categor')}} <a href="javascript:void(0)">{{$product->category['name_'.$locale]}}</a></li>
                                <li>{{trans('frontend_message.code')}}: <a href="javascript:void(0)">{{$product->code}}</a></li>
                                @if (Auth::user())

                                <li>{{trans('frontend_message.price')}}: <a href="javascript:void(0)">
                                
                                    @if (Auth::user()->price_type == 'tmt')
                                    {{number_format((float)($product['all_price']))}} TMT
                                    @elseif(Auth::user()->price_type == 'usd')
                                    {{number_format((float)($product['all_price']))}}
                                    @endif
                                </a></li>
                                
                                @if($product->guestDiscount != null)
                                <li>{{number_format((float)($product['guestPrice']))}} TMT</li>
                                @endif
                                @else
                                <div class="price-box">
                                              @if($product->guestDiscount == null)
                                              
                                                <span class="new-price">{{number_format((float)($product['guest_all_price']))}} TMT</span>
                                              @else 
                                                <span class="new-price">{{number_format((float)($product['guest_all_price']))}} TMT</span>
                                                <span style="color:red;" class="old-price">{{number_format((float)($product['guestPrice']))}} TMT</span>
                                              @endif
                                              </div>
                                @endif
                            </ul>
                        </div>
                        
                        <!-- <div class="product-size_box">
                                    <span>Size</span>
                                    <select class="myniceselect nice-select">
                                        <option value="1">S</option>
                                        <option value="2">M</option>
                                        <option value="3">L</option>
                                        <option value="4">XL</option>
                                    </select>
                                </div> -->
                        <input type="hidden" value="{{$product->id}}" class="productId">
                        <input type="hidden" value="{{$product['code']}}" class="productCode">

                        <div class="quantity">
                            <label>{{trans('frontend_message.quantity')}}</label>
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box qty-input" value="1" type="text">
                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                            </div>
                        </div>
                        @if($product->quantity <= 0)
                        
                        <div class="qty-btn_area">
                            <ul>
                                <li><a class="qty-cart_btn addToCard" href="#" style="color:white">{{trans('frontend_message.addToCart')}}</a></li>
                            </ul>
                        </div>
                        @else
                        <div class="qty-btn_area">
                            <ul>
                                <li><a class="qty-cart_btn addToCarts" href="#" style="color:white">{{trans('frontend_message.addToCart')}}</a></li>
                            </ul>
                        </div>
                        @endif
                        <div class="sp-product-tab_area">
                        <div class="sp-product-tab_nav">
                            <div class="product-tab">
                                <ul class="nav product-menu">
                                    <li><a class="active" data-toggle="tab"
                                            href="#description"><span>{{trans('frontend_message.description')}}</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content uren-tab_content">
                                <div id="description" class="tab-pane active show" role="tabpanel">
                                    <div class="product-description">
                                        <ul>
                                            <li>
                                                <strong>{{trans('frontend_message.description')}}</strong>
                                                <span>{{$product['description_'.$locale]}}.</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Uren's Single Product Area End Here -->


<div class="shop-content_wrapper" style="padding-top: 15px;">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 order-1 order-lg-2 order-md-2">
                <div class="section-title_area" style="border-bottom: 4px solid #e31e24;">
                    <h3 style="color:black;margin:5px;">{{trans('frontend_message.relatedProduсts')}}</h3>
                </div>
                <div class="shop-product-wrap img-hover-effect_area row">
                    @foreach($relatedProducts as $product)
                    @if($product->status != 'null')
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 productData">
                        <div class="product-slide_item">
                            <div class="inner-slide">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{route('product-detail.show',$product->id)}}">
                                        @if($product['images'] != null)

                                            <img class="primary-img" src="{{$product['images']['0']['image']}}" alt="Uren's Product Image">
                                        @endif
                                        @if($product['images'] == null)

                                            <img class="primary-img" src="{{asset('storage/images/ae-logo.png')}}" alt="{{asset('storage/images/ae-logo.png')}}">
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
                                            <h6><a class="product-name" href="{{route('product-detail.show',$product->id)}}">{{Illuminate\Support\Str::limit($product['name_'.$locale],25)}}</a></h6>
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
                                        
                                          <a class="uren-add_cart addToCarts" href="#"><li class="carts" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i style="font-size: 20px;color:white"
                                              class="ion-bag"></i>
                                          </li></a>
                                        @else
                                        <a class="uren-add_cart addToCard" href="#"><li class="carts" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i style="font-size: 20px;color:white"
                                              class="ion-bag"></i>
                                          </li></a>
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
            </div>
         
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('../assets/js/xzoom.min.js')}}"></script>
<script src="{{asset('../assets/js/setup.js')}}"></script>

<script src="{{asset('../assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('../assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('../assets/vendor/js/main.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
	$('.cart-plus-minus').append(
		'<div class="dec qtybutton changeQuantity"><i class="fa fa-angle-down"></i></div><div class="inc qtybutton changeQuantity"><i class="fa fa-angle-up"></i></div>'
	);

	$('.qtybutton').on('click', function () {
        var quantity = '{{ $product->quantity }}';

		var $button = $(this);
		var oldValue = $button.parent().find('input').val();
		if ($button.hasClass('inc')) {
            
                var newVal = parseFloat(oldValue) + 1;
            
            
		} else {
			// Don't allow decrementing below zero
			if (oldValue > 1) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 1;
			}
		}
		$button.parent().find('input').val(newVal);
	});
</script>

<script>
$(document).ready(function() {
    $('.addToCart').click(function(e) {
        e.preventDefault();

        var productId = $(this).closest('.productData').find('.productId').val();
        var productQty = $(this).closest('.productData').find('.qty-input').val();
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
                'productQty': productQty,
                'productCode': productCode,
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
    $('.addToCard').click(function(e) {
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