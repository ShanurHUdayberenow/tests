@include('frontend.layouts.header')
<style>
    .breadcrumb .container li{
        font-weight: 500;
    }
    </style>
<nav aria-label="breadcrumb">
                            
    <ol class="breadcrumb">
        <div class="container" style="display: flex">
            <li class="breadcrumb-item"><a href="{{route('index')}}">{{trans('frontend_message.home', [])}}</a></li>
            <li class="breadcrumb-item active" aria-current="page" ><a href="{{Request::url()}}">{{trans('frontend_message.register', [])}}</a></li>
        </div>
    </ol>

</nav>
<div class="login-register-area pt-40 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a href="{{route('login')}}">
                            <h4> Girmek </h4>
                        </a>
                        <a href="{{route('register')}}">
                            <h4> Agza bolmak </h4>
                        </a>
                    </div>
                    <div class="">
                        <div id="lg2" class="tab-pane">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                         @if(session('errors'))
                                        <div class="alert alert-danger" style="padding: 1rem 2rem">
                                            <ul style="list-style-type: circle">
                                                
                                                <li>
                                                   Beýle Elektron poçta bar! 
                                                   Täzeden synanyşyp görüň.
                                                </li>
                                                
                                            </ul>
                                        </div>
                                        @endif
                                        <input id="name" type="text" name="name" placeholder="Adyňyz"
                                            :value="old('name')" required autofocus />
                                        <input id="surname" type="text" name="surname" placeholder="Familiýaňyz"
                                            :value="old('surname')" required autofocus />
                                        <input id="email" name="email" placeholder="Email" type="email"
                                            :value="old('email')" required />
                                        <input id="phoneNumber" type="text" placeholder="+993" name="phoneNumber"
                                            :value="old('phoneNumber')" required autofocus />
                                        <input id="address" type="text" placeholder="address" name="address"
                                               :value="old('address')" required autofocus />
                                        <input id="password" type="password" name="password" placeholder="Açar sözüňiz"
                                            required autocomplete="new-password" />
                                        <input id="password_confirmation" type="password" name="password_confirmation"
                                            placeholder="Açar sözüni tassykla" required />
                                        <div class="button-box">
                                            <button type="submit">Agza bolmak</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.layouts.footer')
</div>
