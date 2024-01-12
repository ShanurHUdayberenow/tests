<!doctype html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Akylly Enjam</title>
    <meta name="robots" content="all" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="PubK8IBEHVGCwer3mj-BkFOHzyGXRNFFZgkc8A6zb9E" />
    <meta name="yandex-verification" content="e16ddfffb9989ee9" />
    <meta name="keywords" content="akylly enjam, boyler, ariston, boýler, gaz kalonka, rowana, demirdokum turkmenistan, dd turkmenistan,
    ashgabat boiler, asgabat boyler">
    <!-- Favicon -->
    <link rel="shortcut icon" href="storage/images/logotitle.jpg" type="image/png">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('../assets/css/vendor/bootstrap.min.css')}}">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{asset('../assets/css/vendor/font-awesome.css')}}">
    <!-- Fontawesome Star -->
    <link rel="stylesheet" href="{{asset('../assets/css/vendor/fontawesome-stars.css')}}">
    <!-- Ion Icon -->
    <link rel="stylesheet" href="{{asset('../assets/css/vendor/ion-fonts.css')}}">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{asset('../assets/css/plugins/slick.css')}}">
    <!-- Animation -->
    <link rel="stylesheet" href="{{asset('../assets/css/plugins/animate.css')}}">
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="{{asset('../assets/css/plugins/jquery-ui.min.css')}}">
    <!-- Lightgallery -->
    <link rel="stylesheet" href="{{asset('../assets/css/plugins/lightgallery.min.css')}}">
    <!-- Nice Select -->
    <link rel="stylesheet" href="{{asset('../assets/css/plugins/nice-select.css')}}">

    <link href="{{asset('../assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">


    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from the above) -->
    <!--
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    -->

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="{{asset('../assets/css/style.css')}}">

    <!--<link rel="stylesheet" href="assets/css/style.min.css">-->
    @yield('style')
    <style>
    .hm-searchbox .header-search_btn {
        background: {
                {
                $color_navbar->color_search1
            }
        }
    }

    .hm-searchbox .header-search_btn:hover {
        background: {
                {
                $color_navbar->color_search2
            }
        }
    }

    .header-right_area>ul>li.minicart-wrap:hover {
        background-color: {
                {
                $color_navbar->color_cart
            }
        }

        ;
    }

    .ion-bag:hover {
        white;
    }

    .header-main_area-3 .header-top_area .category-menu .category-heading {
        background-color: {
                {
                $color_navbar->color_category_menu
            }
        }

        ;
        border-radius: 0;
    }

    .footer-middle_area {
        background-color: {
                {
                $color_navbar->color_footer
            }
        }

        ;
        padding: 40px 0;
    }

    .footer-bottom_area {
        background-color: {
                {
                $color_navbar->color_footer
            }
        }

        ;
    }

    .product-name:hover {
        color: {
                {
                $color_navbar->color_product
            }
        }

        ;
    }
    </style>
</head>

<body class="template-color-1">
    @include('sweetalert::alert')
    <div class="main-wrapper">
        @yield('popup')

        <!-- Begin Uren's Header Main Area -->
        <header class="header-main_area header-main_area-2 header-main_area-3">
            <div class="header-middle_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-lg-2 col-md-3 col-sm-5">
                            <div class="header-logo_area">
                                @foreach($logo as $log)
                                <a href="{{route('index')}}">
                                    <img src="{{$log->image}}" alt="Uren's Logo" style="height: auto;width:60%;">
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                            <div class="hm-form_area">
                                <form action="{{ route('product-search') }}" class="hm-searchbox" method="GET">

                                    <input type="text" name="search" placeholder="Gözleg ...">
                                    <button class="header-search_btn" type="submit"><i
                                            class="ion-ios-search-strong"><span>{{trans('frontend_message.search')}}</span></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-9 col-sm-7" id="totalajaxcall">
                            <div class="header-right_area addtocartload">
                                <ul>
                                    <li class="mobile-menu_wrap d-flex d-lg-none">
                                        <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                            <i class="ion-navicon"></i>
                                        </a>
                                    </li>
                                    <li class="minicart-wrap">
                                        <a href="{{route('cart')}}" class="minicart-btn">
                                            <div class="minicart-count_area">
                                                <span class="item-count">
                                                    @if(Auth::check())

                                                    {{$totals->total}}

                                                    @else
                                                    {{ count(session()->get('cart', [])) }}
                                                    @endif
                                                </span>
                                                <i class="ion-bag"></i>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="contact-us_wrap" style="color:#000">

                                        <a style="{{ ($locale == 'tm') ? 'color: #00a8e1;' : '' }}"
                                            href="{{route('language', 'tm')}}">Tm&nbsp;</a>|
                                        <a style="{{ ($locale == 'ru') ? 'color: #00a8e1;' : '' }}"
                                            href="{{route('language', 'ru')}}">Ru&nbsp;</a>|
                                        <a style="{{ ($locale == 'en') ? 'color: #00a8e1;' : '' }}"
                                            href="{{route('language', 'en')}}">En</a>

                                    </li>&nbsp;&nbsp;&nbsp;
                                    @if (Auth::user())
                                    <li class="contact-us_wrap">
                                        <a href="{{route('dashboard')}}"><span class="fa fa-user"> </span>
                                            {{trans('frontend_message.profile')}}</a>

                                    </li>
                                    @else
                                    <li class="contact-us_wrap">
                                        <a href="{{route('login')}}"><span class="fa fa-user">
                                                {{trans('frontend_message.login')}}</span> </a>

                                    </li>
                                    @endif

                                    <!-- <div class="header-top_area bg--primary" style="background: white">
                                        <div class="ht-right_area">
                                            <div class="ht-menu">
                                                <ul>
                                                    <li><a href="javascript:void(0)"><span><img src="{{asset('assets/images/flags/'.$locale.".png")}}" alt="JB's Language Icon"></span>&nbsp;<span>{{trans('frontend_message.language')}}</span> </a>
                                                        <ul class="ht-dropdown">
                                                            <li class="active"><a href="{{route('language', 'tm')}}"><img src="{{asset('assets/images/flags/tm.png')}}" alt="JB's Language Icon">Tm</a></li>
                                                            <li><a href="{{route('language', 'ru')}}"><img src="{{asset('assets/images/flags/ru.png')}}" alt="JB's Language Icon">Ru</a></li>
                                                            <li><a href="{{route('language', 'en')}}"><img src="{{asset('assets/images/flags/en.png')}}" alt="JB's Language Icon">En</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    @if (Auth::user())
                                                    <li><a href="#"><span class="fa fa-user"></span> {{trans('frontend_message.login')}}</a>
                                                        <ul class="ht-dropdown ht-my_account">
                                                            <li><a href="{{route('dashboard')}}">{{trans('frontend_message.profile', [])}}</a></li>
                                                            <li><a href="{{route('user.logout')}}">{{trans('frontend_message.logout', [])}}</a></li>
                                                        </ul>
                                                    </li>
                                                    @else
                                                    <li class="contact-us_wrap"><a href="#"><span class="fa fa-user"></span> <span></span></a>
                                                        <ul class="ht-dropdown ht-my_account">
                                                            <li><a href="{{route('login')}}">{{trans('frontend_message.login')}}</a></li>
                                                        </ul>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div> -->


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @yield('features')
            <div class="header-top_area bg--primary" style="background: {{$color_navbar->color_navbar}}">
                <div class="container-fluid">
                    <div class="row">
                        <div class="custom-category_col col-12">
                            <div class="category-menu category-menu-hidden">
                                <div class="category-heading">
                                    <h2 class="categories-toggle">
                                        <span>{{trans('frontend_message.category')}}</span>
                                    </h2>
                                </div>
                                <div id="cate-toggle" class="category-menu-list">
                                    <ul>


                                        @foreach($categories as $category)
                                        @if($category->status == 'approved')

                                        <li @foreach($category->subcategories as $subcategory)
                                            @if($subcategory->status == 'approved')
                                            @if($subcategory != 'null')
                                            class="right-menu"
                                            @endif
                                            @endif
                                            @endforeach
                                            >
                                            <a
                                                href="{{route('products.category', $category->slug)}}">{{$category['name_'.$locale]}}</a>
                                            <ul @foreach($category->subcategories as $subcategory)
                                                @if($subcategory->status == 'approved')
                                                @if($subcategory != 'null')
                                                class="cat-dropdown cat-dropdown-2"
                                                @endif
                                                @endif
                                                @endforeach
                                                >
                                                @foreach($category->subcategories as $subcategory)
                                                @if($subcategory->status == 'approved')
                                                <li>
                                                    <a
                                                        href="{{route('products.subcategory', $subcategory->slug)}}">{{$subcategory['name_'.$locale]}}</a>
                                                </li>
                                                @endif
                                                @endforeach
                                            </ul>
                                        </li>

                                        @endif

                                        @endforeach



                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="custom-menu_col col-12 d-none d-lg-block">
                            <div class="main-menu_area position-relative">
                                <nav class="main-nav">
                                    <ul>
                                        <li class="dropdown-holder"><a
                                                href="{{route('brands.index')}}">{{trans('frontend_message.brand')}}</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        {{-- <div class="custom-setting_col col-12 d-none d-lg-block">
                            <div class="ht-right_area">
                                <div class="ht-menu">
                                    <ul>
                                        <li><a href="javascript:void(0)"><span><img src="{{asset('assets/images/flags/'.$locale.".png")}}"
                        alt="JB's Language Icon"></span> <i class="fa fa-chevron-down"></i></a>
                        <ul class="ht-dropdown">
                            <li class="active"><a href="{{route('language', 'tm')}}"><img
                                        src="{{asset('assets/images/flags/tm.png')}}" alt="JB's Language Icon">Tm</a>
                            </li>
                            <li><a href="{{route('language', 'ru')}}"><img src="{{asset('assets/images/flags/ru.png')}}"
                                        alt="JB's Language Icon">Ru</a></li>
                            <li><a href="{{route('language', 'en')}}"><img src="{{asset('assets/images/flags/en.png')}}"
                                        alt="JB's Language Icon">En</a>
                            </li>
                        </ul>
                        </li>
                        @if (Auth::user())
                        <li><a href="#"><span class="fa fa-user"></span> <span></span><i
                                    class="fa fa-chevron-down"></i></a>
                            <ul class="ht-dropdown ht-my_account">
                                <li><a href="{{route('dashboard')}}">{{trans('frontend_message.profile', [])}}</a></li>
                                <li><a href="{{route('user.logout')}}">{{trans('frontend_message.logout', [])}}</a></li>
                            </ul>
                        </li>
                        @else
                        <li><a href="#"><span class="fa fa-user"></span> <span></span><i
                                    class="fa fa-chevron-down"></i></a>
                            <ul class="ht-dropdown ht-my_account">
                                <li><a href="{{route('login')}}">{{trans('frontend_message.login')}}</a></li>
                            </ul>
                        </li>
                        @endif
                        </ul>
                    </div>
                </div>
            </div> --}}
            <div class="custom-search_col col-12 d-none d-md-block d-lg-none">
                <div class="hm-form_area">
                    <form action="#" class="hm-searchbox">

                        <input type="text" placeholder="Enter your search key ...">
                        <button class="header-search_btn" type="submit"><i
                                class="ion-ios-search-strong"><span>Search</span></i></button>
                    </form>
                </div>
            </div>
    </div>
    </div>
    </div>

    <div class="mobile-menu_wrapper" id="mobileMenu">
        <div class="offcanvas-menu-inner">
            <div class="container">
                <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                <div class="offcanvas-inner_search">
                    <form action="{{ route('product-search') }}" class="hm-searchbox" method="GET">

                        <input type="text" name="search" placeholder="Gözleg ...">
                        <button class="header-search_btn" type="submit"><i
                                class="ion-ios-search-strong"><span>{{trans('frontend_message.search')}}</span></i></button>
                    </form>
                </div>

                <nav class="offcanvas-navigation user-setting_area">
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children active"><a href="javascript:void(0)"><span
                                    class="mm-text">{{trans('frontend_message.login')}}</span></a>
                            <ul class="sub-menu">
                                @if (Auth::user())
                                <li><a href="{{route('dashboard')}}">{{trans('frontend_message.profile', [])}}</a></li>
                                <li><a href="{{route('user.logout')}}">{{trans('frontend_message.logout', [])}}</a></li>

                                @else
                                <li><a href="{{route('login')}}">{{trans('frontend_message.login')}}</a></li>
                                @endif
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="javascript:void(0)"><span
                                    class="mm-text">{{trans('frontend_message.language')}}</span></a>
                            <ul class="sub-menu">
                                <li class="active"><a href="{{route('language', 'tm')}}"><img
                                            src="{{asset('assets/images/flags/tm.png')}}"
                                            alt="JB's Language Icon">Tm</a></li>
                                <li><a href="{{route('language', 'ru')}}"><img
                                            src="{{asset('assets/images/flags/ru.png')}}"
                                            alt="JB's Language Icon">Ru</a></li>
                                <li><a href="{{route('language', 'en')}}"><img
                                            src="{{asset('assets/images/flags/en.png')}}"
                                            alt="JB's Language Icon">En</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    @yield('content')

    <!-- Begin Uren's Footer Area -->
    <div class="uren-footer_area">
        <div class="footer-middle_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-widgets_info">
                            <div class="footer-widgets_logo">
                                @foreach($footerlogo as $foot)
                                <a href="{{route('index')}}">
                                    <img src="{{$foot->image}}" alt="Uren's Footer Logo" width="60%">
                                </a>
                                @endforeach
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="footer-widgets_area">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">

                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="footer-widgets_title docks">
                                        <h3></h3>
                                    </div>
                                    <div class="footer-widgets">
                                        <ul>
                                            <li><a
                                                    href="{{route('contact.index')}}">{{trans('frontend_message.contact')}}</a>
                                            </li>
                                            <li><a
                                                    href="{{route('about-us')}}">{{trans('frontend_message.aboutUs')}}</a>
                                            </li>
                                            <li><a href="{{route('contact.create')}}">Site Map</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="footer-widgets_title dock">
                                        <h3></h3>
                                    </div>
                                    <div class="widgets-essential_stuff">
                                        <ul>
                                            @foreach($maginformation as $maginfor)
                                            <li class="uren-address">
                                                <span>{{trans('frontend_message.location')}}:</span>
                                                {{$maginfor->address}}
                                            </li>
                                            <li class="uren-phone"><span>{{trans('frontend_message.phone_number')}}
                                                    :</span> <a
                                                    href="tel://+{{$maginfor->phoneNumber}}">+{{$maginfor->phoneNumber}}</a>
                                            </li>
                                            <li class="uren-email"><span>Email:</span> {{$maginfor->email}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom_area">
            <div class="container-fluid">
                <div class="footer-bottom_nav">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="copyright">
                                <span>&copy;<?= date('Y', time()); ?>.
                                    {{trans('frontend_message.copyright')}}.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Uren's Footer Area End Here -->


    </div>



    <!-- JS
============================================ -->

    <!-- jQuery JS -->
    <script src="{{asset('../assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- Modernizer JS -->
    <script src="{{asset('../assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <!-- Popper JS -->
    <script src="{{asset('../assets/js/vendor/popper.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('../assets/js/vendor/bootstrap.min.js')}}"></script>

    <!-- Slick Slider JS -->
    <script src="{{asset('../assets/js/plugins/slick.min.js')}}"></script>
    <!-- Barrating JS -->
    <script src="{{asset('../assets/js/plugins/jquery.barrating.min.js')}}"></script>
    <!-- Counterup JS -->
    <script src="{{asset('../assets/js/plugins/jquery.counterup.js')}}"></script>
    <!-- Nice Select JS -->
    <script src="{{asset('../assets/js/plugins/jquery.nice-select.js')}}"></script>
    <!-- Sticky Sidebar JS -->
    <script src="{{asset('../assets/js/plugins/jquery.sticky-sidebar.js')}}"></script>
    <!-- Jquery-ui JS -->
    <script src="{{asset('../assets/js/plugins/jquery-ui.min.js')}}"></script>
    <script src="{{asset('../assets/js/plugins/jquery.ui.touch-punch.min.js')}}"></script>
    <!-- Lightgallery JS -->
    <script src="{{asset('../assets/js/plugins/lightgallery.min.js')}}"></script>
    <!-- Scroll Top JS -->
    <script src="{{asset('../assets/js/plugins/scroll-top.js')}}"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="{{asset('../assets/js/plugins/theia-sticky-sidebar.min.js')}}"></script>
    <!-- Waypoints JS -->
    <script src="{{asset('../assets/js/plugins/waypoints.min.js')}}"></script>
    <!-- jQuery Zoom JS -->
    <script src="{{asset('../assets/js/plugins/jquery.zoom.min.js')}}"></script>

    <script src="{{asset('../assets/js/js-image-zoom.js')}}"></script>




    <!-- Main JS -->
    <script src="{{asset('../assets/js/main.js')}}"></script>
    @yield('script')
</body>


</html>