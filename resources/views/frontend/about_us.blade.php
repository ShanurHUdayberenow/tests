@extends('frontend.layouts.header')
@section('content')
<div class="about-us-area" style="padding: 25px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-5">
                <div class="overview-img text-center img-hover_effect">
                    <a href="#">
                        <img class="img-full" src="{{$about->image}}" alt="Uren's About Us Image">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-7 d-flex align-items-center">
                <div class="overview-content">
                    <h2>{{$about['name_'.$locale]}}</h2>
                    <p class="short_desc">{{$about['description_'.$locale]}}.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection