<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="\storage//images/icon/favicon.ico">
    <link rel="stylesheet" href="\storage//css/bootstrap.min.css">
    <link rel="stylesheet" href="\storage//css/font-awesome.min.css">
    <link rel="stylesheet" href="\storage//css/themify-icons.css">
    <!-- others css -->
    <link rel="stylesheet" href="\storage//css/typography.css">
    <link rel="stylesheet" href="\storage//css/default-css.css">
    <link rel="stylesheet" href="\storage//css/styles.css">
    <link rel="stylesheet" href="\storage//css/responsive.css">
    <!-- modernizr css -->
    <script src="\storage//js/vendor/modernizr-2.8.3.min.js"></script>
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
<!-- login area start -->
<div class="login-area">
    <div class="container">
        <div class="login-box ptb--100">
            <form method="POST" action="{{route('admin.postLogin')}}">
                @csrf
                <div class="login-form-head">
                </div>

                <div class="login-form-body">
                    @if(session('errors'))
                    <div class="alert alert-danger" style="padding: 1rem 2rem">
                        <ul style="list-style-type: circle">
                            @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-gp">
                        <label for="exampleInputEmail1">{{trans('message.email', [])}}</label>
                        <input type="email" id="exampleInputEmail1" name="email">
                        <i class="ti-email"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword1">{{trans('message.password', [])}}</label>
                        <input type="password" id="exampleInputPassword1" name="password">
                        <i class="ti-lock"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="row mb-4 rmber-area">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="remember_me">
                                <label class="custom-control-label" for="customControlAutosizing">{{trans('message.remember_me', [])}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">{{trans('message.login', [])}} <i class="ti-arrow-right"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- login area end -->

<!-- jquery latest version -->
<script src="\storage//js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="\storage//js/popper.min.js"></script>
<script src="\storage//js/bootstrap.min.js"></script>
<script src="\storage//js/owl.carousel.min.js"></script>
<script src="\storage//js/metisMenu.min.js"></script>
<script src="\storage//js/jquery.slimscroll.min.js"></script>
<script src="\storage//js/jquery.slicknav.min.js"></script>
<!-- others plugins -->
<script src="\storage//js/plugins.js"></script>
<script src="\storage//js/scripts.js"></script>
</body>

</html>
