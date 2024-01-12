@extends('frontend.layouts.header')
@section('content')

<div class="contact-main-page">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                <div class="contact-page-side-content">
                    <h3 class="contact-page-title">{{trans('frontend_message.contact')}}</h3>
                    <p class="contact-page-message"></p>
                    @foreach($maginformation as $maginfor)

                    <div class="single-contact-block">
                        <h4><i class="fa fa-fax"></i> {{trans('frontend_message.location')}}</h4>
                        <p>{{$maginfor->address}}</p>
                    </div>
                    <div class="single-contact-block">
                        <h4><i class="fa fa-phone"></i> {{trans('frontend_message.phone_number')}}</h4>
                        <p>{{$maginfor->phoneNumber}}</p>
                    </div>
                    <div class="single-contact-block last-child">
                        <h4><i class="fa fa-envelope-o"></i> Email</h4>
                        <p>{{$maginfor->email}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                <div class="contact-form-content">
                    <h3 class="contact-page-title">Tell Us Your Message</h3>
                    <div class="contact-form">
                        <form id="contact-form" action="{{route('contact.store')}}" method="post">
                            @csrf
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
                            <div class="form-group">
                                <label>{{trans('frontend_message.name')}} <span class="required">*</span></label>
                                <input type="text" name="name" id="con_name" required>
                            </div>
                            <div class="form-group">
                                <label>Email <span class="required">*</span></label>
                                <input type="email" name="email" id="con_email" required>
                            </div>
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" name="subject" id="con_subject">
                            </div>
                            <div class="form-group form-group-2">
                                <label>Your Message</label>
                                <textarea name="message" id="con_message"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" value="submit" id="submit" class="uren-contact-form_btn"
                                    name="submit">{{trans('frontend_message.send')}}</button>
                            </div>
                        </form>
                    </div>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection