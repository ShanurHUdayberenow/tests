@extends('frontend.layouts.header')
@section('content')

<div class="contact-main-page" style="padding: 25px;">
<div class="container-fluid">
    @foreach($maps as $map)
      <iframe src="{{$map->map}}" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    @endforeach
</div>
</div>
@endsection

@section('script')

<script>
function changeMap(frame) {
            document.getElementById('map_box').innerHTML = frame;
            document.getElementById('map_box').scrollIntoView({behavior: "smooth", block: "center"});

}
</script>
@endsection