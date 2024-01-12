@include('frontend.layouts.header')

    <!-- my account wrapper start -->
    <div class="my-account-wrapper pt-40 pb-100 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                    <a href="#dashboad" class="active" data-toggle="tab"><i
                                            class="fa fa-dashboard"></i>Dashboard</a>
                                    <a href="#address-edit" data-toggle="tab"><i class="fa fa-user"></i>Profile</a>
                                    <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>
                                        Sargytlarym</a>
                                    <a href="#account-info" data-toggle="tab"><i class="fa fa-credit-card"></i>Dükan
                                        açmak</a>
                                    <a href="#partner" data-toggle="tab"><i class="fa fa-map-marker"></i>Partner
                                        bolmak</a>
                                        <a href="#"><i class="fa fa-sign-out"></i> Kabul edilenler</a>
                                        <a href="#"><i class="fa fa-sign-out"></i> Garaşylýanlar</a>
                                        <a href="#"><i class="fa fa-sign-out"></i> Kabul etmedikler</a>
                                    <a href="login.html"><i class="fa fa-sign-out"></i> Logout</a>
                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->
                            <!-- Dashboard -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Hosh geldiniz!</h3>
                                            <div class="welcome">
                                                <p>Hello, <strong>User</strong></p>
                                            </div>
                                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex,
                                                labore?</p>
                                        </div>
                                    </div>
                                    <!-- End Dashboard -->
                                    <!-- Profile -->
                                    <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>User data</h3>
                                            <address>
                                                <p><strong>First name Last name</strong></p>
                                                <p>Ashgabat sh.<br>
                                                    Berkararlyk etr. jay 100</p>
                                                <p>Mobile: +993 65 555555</p>
                                            </address>
                                            <a href="#" class="check-btn sqr-btn "><i class="fa fa-edit"></i> Edit
                                                Address</a>
                                        </div>
                                    </div>
                                    <!-- end profile -->
                                    <!-- Orders -->
                                    <div class="tab-pane fade" id="orders" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Sargytlarym</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Aug 22, 2018</td>
                                                            <td>Pending</td>
                                                            <td>3000 man.</td>
                                                            <td><a href="#" class="check-btn sqr-btn ">View</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>July 22, 2018</td>
                                                            <td>Approved</td>
                                                            <td>200 man.</td>
                                                            <td><a href="#" class="check-btn sqr-btn ">View</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>June 12, 2017</td>
                                                            <td>On Hold</td>
                                                            <td>990 man.</td>
                                                            <td><a href="#" class="check-btn sqr-btn ">View</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Orders -->

                                    <!--Start Shop -->
                                    <div class="tab-pane fade" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Dükan açmak üçin maglumatlaryňyzy ugradyň</h3>
                                            <div class="account-details-form">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                  @csrf
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="first-name" class="required">
                                                                    Name</label>
                                                                <input type="text" id="first-name" name="name">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="last-name" class="required">
                                                                    Slug</label>
                                                                <input type="text" id="last-name" name="slug">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="first-name" class="required">
                                                                    Phone number</label>
                                                                <input type="tel" id="first-name" placeholder="+993" name="phoneNumber">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="last-name" class="required">
                                                                    Email address</label>
                                                                <input type="text" id="last-name" name="email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-input-item">
                                                        <label type="text" for="display-name" class="required">Address</label>
                                                        <input type="text" id="display-name" name="address">
                                                    </div>
                                                    <div class="single-input-item">
                                                        <label type="file" for="display-name" class="required">Shop Image</label>
                                                        <input type="file" id="display-name" name="images[]">
                                                    </div>
                                                    <div class="single-input-item brd">
                                                        <label for="text" class="required">Description</label>
                                                        <textarea type="text" id="email" name="description"></textarea>
                                                    </div>
                                                    <fieldset>
                                                        <legend>Shop owner</legend>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="new-pwd" class="required">Name
                                                                    </label>
                                                                    <input type="text" id="new-pwd" name="shopOwnerName">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="confirm-pwd" class="required">
                                                                        Phone number</label>
                                                                    <input type="text" id="confirm-pwd" placeholder="+993" name="shopOwnerPhone">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="single-input-item">
                                                        <button class="check-btn sqr-btn ">Send</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Shop-->
                                    <!--Start Partner -->
                                    <div class="tab-pane fade" id="partner" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Partner bolmak isleyan dükanyňyzy saýlaň</h3>
                                            <div class="shop-bottom-area">
                                                <div class="tab-content jump">
                                                    <div id="shop-2" class="tab-pane active">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="shop-list-wrap mb-30">
                                                                    <h4 class="t-a"><a href="#">Dükanyň Ady</a></h4>
                                                                    <div class="row">
                                                                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
                                                                            <div class="product-list-img" style="width: 160px; height: 180px;">
                                                                                <a href="#">
                                                                                    <img src="assets\images\shops\dukan1.jpg"
                                                                                        alt="Product Style"  style="width: 90%;">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
                                                                            <div class="shop-list-content" style="padding-left: 20px;">
                                                                                <i class="la la-map-marker"></i> <span>Dükanyň
                                                                                    salgysy</span></br>
                                                                                <i class="la la-user"></i> <span>Dolandyryjy</span></br>
                                                                                <i class="la la-envelope"></i> <span>dukan@com</span></br>
                                                                                <i class="la la-phone"></i> <span>+993 12 979797</span>
                                                                                <div class="product-list-action" style="margin-top: 20px;">
                                                                                    <a href="shopdata.html"
                                                                                        style="width: 120px; border-radius: 0.5em; font-size: 14px;">Saýlaň</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="shop-list-wrap mb-30">
                                                                    <h4 style="text-align: center;"><a href="#">Dükanyň Ady</a></h4>
                                                                    <div class="row">
                                                                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
                                                                            <div class="product-list-img" style="width: 160px;">
                                                                                <a href="#">
                                                                                    <img src="assets\images\shops\dukan1.jpg"
                                                                                        alt="Product Style"  style="width: 90%;">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
                                                                            <div class="shop-list-content" style="padding-left: 20px;">
                                                                                <i class="la la-map-marker"></i> <span>Dükanyň
                                                                                    salgysy</span></br>
                                                                                <i class="la la-user"></i> <span>Dolandyryjy</span></br>
                                                                                <i class="la la-envelope"></i> <span>dukan@com</span></br>
                                                                                <i class="la la-phone"></i> <span>+993 12 979797</span>
                                                                                <div class="product-list-action" style="margin-top: 20px;">
                                                                                    <a href="shopdata.html"
                                                                                        style="width: 120px; border-radius: 0.5em; font-size: 14px;">
                                                                                        Saýlaň</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="shop-list-wrap mb-30">
                                                                    <h4 style="text-align: center;"><a href="#">Dükanyň Ady</a></h4>
                                                                    <div class="row">
                                                                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
                                                                            <div class="product-list-img" style="width: 160px;">
                                                                                <a href="#">
                                                                                    <img src="assets\images\shops\dukan1.jpg"
                                                                                        alt="Product Style"  style="width: 90%;">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
                                                                            <div class="shop-list-content" style="padding-left: 20px;">
                                                                                <i class="la la-map-marker"></i> <span>Dükanyň
                                                                                    salgysy</span></br>
                                                                                <i class="la la-user"></i> <span>Dolandyryjy</span></br>
                                                                                <i class="la la-envelope"></i> <span>dukan@com</span></br>
                                                                                <i class="la la-phone"></i> <span>+993 12 979797</span>
                                                                                <div class="product-list-action" style="margin-top: 20px;">
                                                                                    <a href="shopdata.html"
                                                                                        style="width: 120px; border-radius: 0.5em; font-size: 14px;">Saýlaň
                                                                                        </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="shop-list-wrap mb-30">
                                                                    <h4 style="text-align: center;"><a href="#">Dükanyň Ady</a></h4>
                                                                    <div class="row">
                                                                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
                                                                            <div class="product-list-img" style="width: 160px;">
                                                                                <a href="#">
                                                                                    <img src="assets\images\shops\dukan1.jpg"
                                                                                        alt="Product Style"  style="width: 90%;">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
                                                                            <div class="shop-list-content" style="padding-left: 20px;">
                                                                                <i class="la la-map-marker"></i> <span>Dükanyň
                                                                                    salgysy</span></br>
                                                                                <i class="la la-user"></i> <span>Dolandyryjy</span></br>
                                                                                <i class="la la-envelope"></i> <span>dukan@com</span></br>
                                                                                <i class="la la-phone"></i> <span>+993 12 979797</span>
                                                                                <div class="product-list-action" style="margin-top: 20px;">
                                                                                    <a href="shopdata.html"
                                                                                        style="width: 120px; border-radius: 0.5em; font-size: 14px;">
                                                                                        Saýlaň</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="shop-list-wrap mb-30">
                                                                    <h4 style="text-align: center;"><a href="#">Dükanyň Ady</a></h4>
                                                                    <div class="row">
                                                                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
                                                                            <div class="product-list-img" style="width: 160px;">
                                                                                <a href="#">
                                                                                    <img src="assets\images\shops\dukan1.jpg"
                                                                                        alt="Product Style"  style="width: 90%;">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
                                                                            <div class="shop-list-content" style="padding-left: 20px;">
                                                                                <i class="la la-map-marker"></i> <span>Dükanyň
                                                                                    salgysy</span></br>
                                                                                <i class="la la-user"></i> <span>Dolandyryjy</span></br>
                                                                                <i class="la la-envelope"></i> <span>dukan@com</span></br>
                                                                                <i class="la la-phone"></i> <span>+993 12 979797</span>
                                                                                <div class="product-list-action" style="margin-top: 20px;">
                                                                                    <a href="shopdata.html"
                                                                                        style="width: 120px; border-radius: 0.5em; font-size: 14px;">
                                                                                        Saýlaň</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="shop-list-wrap mb-30">
                                                                    <h4 style="text-align: center;"><a href="#">Dükanyň Ady</a></h4>
                                                                    <div class="row">
                                                                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
                                                                            <div class="product-list-img" style="width: 160px;">
                                                                                <a href="#">
                                                                                    <img src="assets\images\shops\dukan1.jpg"
                                                                                        alt="Product Style"  style="width: 90%;">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
                                                                            <div class="shop-list-content" style="padding-left: 20px;">
                                                                                <i class="la la-map-marker"></i> <span>Dükanyň
                                                                                    salgysy</span></br>
                                                                                <i class="la la-user"></i> <span>Dolandyryjy</span></br>
                                                                                <i class="la la-envelope"></i> <span>dukan@com</span></br>
                                                                                <i class="la la-phone"></i> <span>+993 12 979797</span>
                                                                                <div class="product-list-action" style="margin-top: 20px;">
                                                                                    <a href="shopdata.html"
                                                                                        style="width: 120px; border-radius: 0.5em; font-size: 14px;">Saýlaň
                                                                                        </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="shop-list-wrap mb-30">
                                                                    <h4 style="text-align: center;"><a href="#">Dükanyň Ady</a></h4>
                                                                    <div class="row">
                                                                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
                                                                            <div class="product-list-img" style="width: 160px;">
                                                                                <a href="#">
                                                                                    <img src="assets\images\shops\dukan1.jpg"
                                                                                        alt="Product Style"  style="width: 90%;">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
                                                                            <div class="shop-list-content" style="padding-left: 20px;">
                                                                                <i class="la la-map-marker"></i> <span>Dükanyň
                                                                                    salgysy</span></br>
                                                                                <i class="la la-user"></i> <span>Dolandyryjy</span></br>
                                                                                <i class="la la-envelope"></i> <span>dukan@com</span></br>
                                                                                <i class="la la-phone"></i> <span>+993 12 979797</span>
                                                                                <div class="product-list-action" style="margin-top: 20px;">
                                                                                    <a href="shopdata.html"
                                                                                        style="width: 120px; border-radius: 0.5em; font-size: 14px;">
                                                                                        Saýlaň</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="shop-list-wrap mb-30">
                                                                    <h4 style="text-align: center;"><a href="#">Dükanyň Ady</a></h4>
                                                                    <div class="row">
                                                                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
                                                                            <div class="product-list-img" style="width: 160px;">
                                                                                <a href="#" class="partner-image">
                                                                                    <img src="assets\images\shops\dukan1.jpg"
                                                                                        alt="Product Style"  style="width: 90%;">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
                                                                            <div class="shop-list-content" style="padding-left: 20px;">
                                                                                <i class="la la-map-marker"></i> <span>Dükanyň
                                                                                    salgysy</span></br>
                                                                                <i class="la la-user"></i> <span>Dolandyryjy</span></br>
                                                                                <i class="la la-envelope"></i> <span>dukan@com</span></br>
                                                                                <i class="la la-phone"></i> <span>+993 12 979797</span>
                                                                                <div class="product-list-action" style="margin-top: 20px;">
                                                                                    <a href="shopdata.html"
                                                                                        style="width: 120px; border-radius: 0.5em; font-size: 14px;">
                                                                                        Saýlaň</a>
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
                                    </div> <!--End Partner-->
                                </div>
                            </div> <!-- My Account Tab Content End -->
                        </div>
                    </div> <!-- My Account Page End -->
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->


@include('frontend.layouts.footer')
