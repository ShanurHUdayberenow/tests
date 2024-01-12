<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Akylly Enjam-Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="\storage/images/icon/favicon.ico">
    <link rel="stylesheet" href="\storage/css/bootstrap.min.css">
    <link rel="stylesheet" href="\storage/css/font-awesome.min.css">
    <link rel="stylesheet" href="\storage/css/themify-icons.css">
    <link rel="stylesheet" href="\storage/css/metisMenu.css">
    <link rel="stylesheet" href="\storage/css/owl.carousel.min.css">
    <link rel="stylesheet" href="\storage/css/slicknav.min.css">
    <!-- amchart css -->
    {{--    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />--}}
    <!-- others css -->
    @yield('style')
    <link rel="stylesheet" href="\storage/css/typography.css">
    <link rel="stylesheet" href="\storage/css/default-css.css">
    <link rel="stylesheet" href="\storage/css/styles.css">
    <link rel="stylesheet" href="\storage/css/responsive.css">
    
    <link rel="stylesheet" href="\storage/colorsetting/jquery.minicolors.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- modernizr css -->
    <script src="\storage/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="#"><img src="\storage/images/ae-logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <x-sidebar_content />
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">

                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb"
                                src="<?php echo auth()->user()->avatar === null ? '\storage/images/avatar.png' : auth()->user()->avatar;?>"
                                alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{auth()->user()->name}} <i
                                    class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"
                                    href="{{route('admin.profile')}}">{{trans('message.profile')}}</a>
                                <a class="dropdown-item"
                                    href="{{route('admin.logout')}}">{{trans('message.log_out')}}</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            @yield('breadcrumbs')
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                @yield('content')
            </div>
        </div>
        <!-- main content area end -->

    </div>
    <!-- page container area end -->
    <!-- offset area start -->

    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="\storage/js/vendor/jquery-2.2.4.min.js"></script>

    <script>
    $(document).ready(function() {
        $('.changeDiscount').click(function(e) {
            e.preventDefault();
            var productId = $(this).closest('.discountData').find('.productId').val();
            var productDiscount = $(this).closest('.discountData').find('.discount-input').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            });
            $.ajax({
                method: "POST",
                url: "update-discount",
                data: {
                    'productId': productId,
                    'productDiscount': productDiscount,
                },
                success: function(response) {
                    location.reload();
                }
            });
        });

    });
    </script>

    <script>
    $(document).ready(function() {
        $('.changeDiscountEdit').click(function(e) {
            e.preventDefault();
            var productId = $(this).closest('.discountDataEdit').find('.productId').val();
            var productDiscountEdit = $(this).closest('.discountDataEdit').find('.user-discount-input')
                .val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            });
            $.ajax({
                method: "POST",
                url: '{{ route("user-discount-edit") }}',
                data: {
                    'productId': productId,
                    'productDiscountEdit': productDiscountEdit,
                },
                success: function(response) {
                    location.reload();
                }
            });
        });

    });
    </script>



    <script type="text/javascript">
    $('body').on('keyup', '#search-products', function() {
        var searchQuest = $(this).val();

        $.ajax({
            method: 'POST',
            url: '{{ route("search-products") }}',
            dataType: 'json',
            data: {
                '_token': '{{ csrf_token() }}',
                searchQuest: searchQuest,
            },
            success: function(res) {
                var tableRow = '';

                $('#dynamic-row').html('');

                $.each(res, function(index, value) {
                    tableRow =
                        '<tr><td><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input prodId" name="prodId[]" id="' +
                        value.id + '" value="' + value.id +
                        '"><label class="custom-control-label" for="' + value.id +
                        '"></label></div><td>' +
                        value.name_tm +
                        '</td><td><img src="' +
                        value.images['0']['image'] +
                        '" width="15%"></td></tr>';
                    $('#dynamic-row').append(tableRow);
                });
            }

        });
    });
    </script>

    <script type="text/javascript">
    $('body').on('keyup', '#search-users', function() {
        var searchQuest = $(this).val();
        $.ajax({
            method: 'POST',
            url: '{{ route("search-users") }}',
            dataType: 'json',
            data: {
                '_token': '{{ csrf_token() }}',
                searchQuest: searchQuest,
            },
            success: function(res) {
                var tableRow = '';

                $('#dynamic-row').html('');

                $.each(res, function(index, value) {
                    tableRow =
                        '<tr><td><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" name="checkbox[]" id="' +
                        value.id + '" value="' + value.id +
                        '"><label class="custom-control-label" for="' + value.id + '">' +
                        value.name + '</label></div></td><td>' +
                        value.surname +
                        '</td><td><span class="action" onclick="location.href=' + value.id +
                        '"><i class="m-1 ti-pencil-alt"></i></span><span class="action"><i class="m-1 ti-trash"></i></span></td></tr>';

                    $('#dynamic-row').append(tableRow);
                });
            }
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            $.ajax({
                url: "/pagination/fetch_data?page=" + page,
                success: function(data) {
                    $('#table_data').html(data);
                }
            });
        }
    });
    </script>

    <script>
    var CartPlusMinus = $('.cart-plus-minus');

    $(".qtybutton").on("click", function() {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() === "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find("input").val(newVal);
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
                url: '{{route("updatesproductquantity")}}',
                data: {
                    'productId': productId,
                    'productQty': productQty,
                },
                success: function(response) {

                }
            });

        });

    });
    </script>


    


    <script src="\storage/colorsetting/jquery.minicolors.js"></script>

    <!-- bootstrap 4 js -->
    <script src="\storage/js/popper.min.js"></script>
    <script src="\storage/js/bootstrap.min.js"></script>
    <script src="\storage/js/owl.carousel.min.js"></script>
    <script src="\storage/js/metisMenu.min.js"></script>
    <script src="\storage/js/jquery.slimscroll.min.js"></script>
    <script src="\storage/js/jquery.slicknav.min.js"></script>
    
    <!-- start chart js -->
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>--}}
    <!-- start highcharts js -->
    {{--<script src="https://code.highcharts.com/highcharts.js"></script>--}}
    <!-- start zingchart js -->
    {{--<script src="https://cdn.zingchart.com/zingchart.min.js"></script>--}}
    {{--<script>--}}
    {{--    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";--}}
    {{--    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];--}}
    {{--</script>--}}
    <!-- all line chart activation -->
    <script src="\storage/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="\storage/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="\storage/js/plugins.js"></script>
    @yield('script')
    <script src="\storage/js/scripts.js"></script>
</body>

</html>