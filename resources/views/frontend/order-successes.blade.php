@extends('frontend.layouts.header')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.bloc_1 i {
    font-size: 100px;
    padding: 20px;
    border-radius: 5px;
    color: green;
}

.bloc_2 i {
    font-size: 40px;
    padding: 20px;
    border-radius: 5px;
    color: white;
    background: #ff6720;
}

.tests {
    max-width: max-content;
    margin: auto;
}
.subscribe_area{
    max-width: max-content;
    margin: auto;
}
.bloc_1 span{
    font-size: 20px;
}
.subscribe-form-group span{
    font-size: 20px;
}
.bloc_2{
    max-width: max-content;
    margin: auto;
}

@media print {
      
      .header-middle_area, .header-top_area, .uren-footer_area, .hidens{
        display: none;
      }
      .brands img{
        width: 150px;
      }
      .tops{
        margin-top: 800px;
      }
      
}
.data span{
    color: black;
    font-size: 16px;
}
.data .last span{
    float: right;
}
.between ul{
    display: flex;
    margin-top: 90px;
}
.ml-autos{
    margin-left: 0px;
}
.check{
    font-weight: 500;
    color: black;
    margin-top: 10px;
}
.bloc_1 button{
    background: #00a8e1;
}
</style>
@endsection

{{-- @section('popup')

@endsection --}}

@section('content')

<form action="{{route('download-pdf-registered')}}" method="POST" target="__blank">
    @csrf
    <div class="test" style="margin-bottom: 250px;">
        <span class="popup_off"><i class="ion-android-close"></i></span>
        <div class="subscribe_area">
            <div class="bloc_1 text-center">
                <i class="fa fa-check-circle"></i><br>
                <span>Haryt üstünlikli sargyt edildi</span><br>
                <button class="btn btn-success check">Satyn alyş çegiňiz göçürip alyň !</button>
            </div>
        </div>
    </div>
</form>
    

@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/js/jQuery.print.js')}}"></script>
<script type="text/javascript">
        
</script>
@endsection