@extends('frontend.layouts.header')
@section('content')
<!-- Begin Uren's Page Content Area -->
<main class="page-content">
    <!-- Begin Uren's Account Page Area -->
    <div class="account-page-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="account-dashboard-tab" data-toggle="tab"
                                href="#account-dashboard" role="tab" aria-controls="account-dashboard"
                                aria-selected="true">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-address-tab" data-toggle="tab" href="#account-address"
                                role="tab" aria-controls="account-address" aria-selected="false">{{trans('frontend_message.information')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-orders"
                                role="tab" aria-controls="account-orders" aria-selected="false">{{trans('frontend_message.order')}}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="account-details-tab" data-toggle="tab" href="#account-details"
                                role="tab" aria-controls="account-details" aria-selected="false">{{trans('frontend_message.account_details')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-logout-tab" href="{{route('user.logout')}}" role="tab"
                                aria-selected="false">{{trans('frontend_message.logout')}}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9">
                    <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                        <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel"
                            aria-labelledby="account-dashboard-tab">
                            <div class="myaccount-dashboard">
                                <p> <b>Dashboard</b></p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-orders" role="tabpanel"
                            aria-labelledby="account-orders-tab">
                            <div class="myaccount-orders">
                                <h4 class="small-title">{{trans('frontend_message.order')}}</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <th>{{trans('frontend_message.number')}}</th>
                                                <th>{{trans('frontend_message.date')}}</th>
                                                <th>STATUS</th>
                                                <th>{{trans('frontend_message.total')}}</th>
                                                <th></th>
                                            </tr>
                                            @foreach($orders as $order)
                                            <tr>
                                                <td><a class="account-order-id"
                                                        href="javascript:void(0)">#{{$order->id}}</a></td>
                                                <td>{{$order->date}}</td>
                                                @if($order->status == 'unapproved')
                                                <td><span class="badge badge-danger">{{$order->status}}</span>
                                                </td>
                                                @else
                                                <td><span class="badge badge-success">{{$order->status}}</span>
                                                </td>
                                                @endif
                                                <td>{{number_format((float)($order->price), 2)}}</td>
                                                <td><a href="{{route('user-order-view', $order->id)}}"
                                                        class="uren-btn uren-btn_dark uren-btn_sm"><span>View</span></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-address" role="tabpanel"
                            aria-labelledby="account-address-tab">
                            <div class="myaccount-address">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="small-title">{{trans('frontend_message.user_name')}}</h5>
                                        <address>
                                            {{Auth::user()->name}}
                                        </address>
                                    </div>
                                    <div class="col">
                                        <h5 class="small-title">{{trans('frontend_message.user_surname')}}</h5>
                                        <address>
                                            {{Auth::user()->surname}}
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h5 class="small-title">{{trans('frontend_message.user_email')}}</h5>
                                        <address>
                                            {{Auth::user()->email}}
                                        </address>
                                    </div>
                                    <div class="col">
                                        <h5 class="small-title">{{trans('frontend_message.user_phone')}}</h5>
                                        <address>
                                            {{Auth::user()->phoneNumber}}
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h5 class="small-title">{{trans('frontend_message.user_address1')}}</h5>
                                        <address>
                                            {{Auth::user()->address}}
                                        </address>
                                    </div>
                                    <div class="col">
                                        <h5 class="small-title">{{trans('frontend_message.user_addres2')}}</h5>
                                        <address>
                                            {{Auth::user()->address2}}
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-details" role="tabpanel"
                            aria-labelledby="account-details-tab">
                            <div class="myaccount-details">
                                <form action="{{route('order-edit')}}" class="uren-form" method="POST">
                                    @csrf
                                    <div class="uren-form-inner">
                                        @if(session('message'))
                                        <div class="alert alert-success">
                                            {{session('message')}}
                                        </div>
                                        @endif
                                        @if(session('errors'))
                                        <div class="alert alert-danger" style="padding: 1rem 2rem">
                                            <ul style="list-style-type: circle">
                                                @foreach($errors->all() as $error)
                                                <li style="font-size: 14px">{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        @endif
                                        <div class="single-input single-input-half">
                                            <label for="account-details-firstname">{{trans('frontend_message.user_name')}}*</label>
                                            <input type="text" id="account-details-firstname"
                                                value="{{Auth::user()->name}}" name="name" required>
                                        </div>
                                        <div class="single-input single-input-half">
                                            <label for="account-details-lastname">{{trans('frontend_message.user_surname')}}*</label>
                                            <input type="text" id="account-details-lastname"
                                                value="{{Auth::user()->surname}}" name="surname" required>
                                        </div>
                                        <div class="single-input">
                                            <label for="account-details-email">Email*</label>
                                            <input type="email" id="account-details-email"
                                                value="{{Auth::user()->email}}" name="email" required>
                                        </div>
                                        <div class="single-input single-input-half">
                                            <label for="account-details-firstname">{{trans('frontend_message.user_address1')}}*</label>
                                            <input type="text" id="account-details-firstname"
                                                value="{{Auth::user()->address}}" name="address" required>
                                        </div>
                                        <div class="single-input single-input-half">
                                            <label for="account-details-lastname">{{trans('frontend_message.user_addres2')}}*</label>
                                            <input type="text" id="account-details-lastname"
                                                value="{{Auth::user()->address2}}" name="address2">
                                        </div>
                                        <div class="single-input">
                                            <label for="account-details-oldpass">Current Password(leave blank to leave
                                                unchanged)</label>
                                            <input type="password" id="account-details-oldpass"
                                                name="oldPassword">
                                        </div>
                                        <div class="single-input">
                                            <label for="account-details-newpass">New Password (leave blank to leave
                                                unchanged)</label>
                                            <input type="password" id="account-details-newpass"
                                                name="newPassword">
                                        </div>
                                        <div class="single-input">
                                            <button class="uren-btn uren-btn_dark" type="submit"><span>{{trans('frontend_message.send')}}</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Uren's Account Page Area End Here -->
</main>
@endsection