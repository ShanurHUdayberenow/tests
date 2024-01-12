@extends('frontend.layouts.header')
@section('content')
<div class="uren-login-register_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-4" style="max-width: max-content;margin: auto;">
                <!-- Login Form s-->
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    @if(session('errors'))
                        <div class="alert alert-danger" style="padding: 1rem 2rem">
                            <ul style="list-style-type: circle">
                                                
                                <li>
                                    Telefon belgiňiz 8 sifrden köp ýa-da az bolmaly däl ýa-da parolyňyz ýalňyş! 
                                    Täzeden synanyşyp görüň.
                                </li>
                                                
                            </ul>
                        </div>
                    @endif
                    <div class="login-form">
                        <h4 class="login-title">Login</h4>
                        <div class="row">
                            {{-- <div class="col-md-12 col-12">
                                <label>{{trans('frontend_message.phone')}}*</label>
                                <input type="text" name="phoneNumber" :value="old('phoneNumber')" placeholder="{{trans('frontend_message.phone')}}" required autofocus />
                            </div> --}}
                            <div class="col-md-12 col-12">
                                <label>{{trans('frontend_message.phone')}}*</label>
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="addon-wrapping">+993</span>
                                </div>
                                <input type="text" class="form-control" name="phoneNumber" :value="old('phoneNumber')" placeholder="{{trans('frontend_message.phone')}}" required autofocus />
                            </div>
                            </div>
                            <div class="col-12 mb--20">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Açar sözüňiz" required autocomplete="current-password" />
                            </div>
                            <div class="col-md-8">
                                <div class="check-box">
                                    <input type="checkbox" id="remember_me">
                                    <label for="remember_me">Ýatda sakla</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="uren-login_btn">Girmek</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection