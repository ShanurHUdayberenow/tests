@extends('layouts.app1')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('storage/noty/noty.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('storage/noty/themes/mint.scss')}}">
<link rel="canonical" href="https://github.com/dbrekalo/fastselect/"/>

        <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://rawgit.com/dbrekalo/attire/master/dist/css/build.min.css">
<script src="https://rawgit.com/dbrekalo/attire/master/dist/js/build.min.js"></script>

        <link rel="stylesheet" href="{{asset('dist/fastselect.min.css')}}">
        <script src="{{asset('dist/fastselect.standalone.js')}}"></script>

@endsection

@section('content')
<div class="col-8 mt-5">
    <form method="get" action="{{route('listproduct')}}" enctype="multipart/form-data" id="form">

        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Ulanyjy arzanlaşyk</h4>

                @if(session('errors'))
                {{--                        @dd($errors->messages)--}}
                <div class="alert alert-danger" style="padding: 1rem 2rem">
                    <ul style="list-style-type: circle">
                        @foreach($errors->all() as $error)
                        <li style="font-size: 14px">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>

                @endif

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Ulanyjyny saýla</label>
                    <div class="input-group">

                        <select class="multipleSelect" multiple name="language">
                            <option value="Afghanistan">Yhlas Atayew</option>
                            <option value="Albania">Eziz Orazov</option>
                            <option value="Algeria">Myrat Mollayew</option>
                            <option value="Andorra">Yagshy Goshunov</option>
                            <option value="Angola">Kerwen Orayew</option>
                            
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Harydy saýla</label>
                    <div class="input-group">

                        <select class="multipleSelect" multiple name="language">
                            <option value="Afghanistan">Sumka</option>
                            <option value="Albania">Mackbook</option>
                            <option value="Algeria">Computer</option>
                            <option value="Andorra">Moloko</option>
                            <option value="Angola">Samsung</option>
                            
                        </select>


                        <script>
                        $('.multipleSelect').fastselect();
                        </script>

                    </div>
                </div>
                <button class="btn btn-custom" type="submit">Ugrat</button>
            </div>
        </div>

    </form>

</div>
@endsection

@section('script')
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>


<script src="\storage/noty/noty.js"></script>
@if ($message = session('message'))
<script>
$(document).ready(function() {
    $('.mdb-select').materialSelect();
});
</script>
<script>
new Noty({
    type: 'success',
    layout: 'topRight',
    text: '{{$message}}',
    timeout: 2000,
}).show();
</script>
@endif
@if(session('errors'))
<script>
new Noty({
    type: 'error',
    layout: 'topRight',
    text: '<?php foreach ($errors->all() as $item) { echo $item . '<br>';}?>',
    timeout: 2000,
}).show();
</script>
@endif
<script>
$(document).on('click', '.delete', function() {
    let id = $(this).attr('data-id');
    $('#deleteId').val(id);
});

function destroy() {
    var id = document.getElementById('deleteId').value;
    var url = '{{\Illuminate\Support\Facades\Request::url()}}/' + id;
    $.ajax({
        url: url,
        data: {
            '_token': "{{csrf_token()}}"
        },
        type: 'DELETE', // user.destroy
        success: function(data) {
            Livewire.emit('refreshComponent');
            new Noty({
                type: 'success',
                layout: 'topRight',
                text: data.message,
                timeout: 2000,
            }).show();
        },
        error: function() {
            new Noty({
                type: 'error',
                layout: 'topRight',
                text: 'Error',
                timeout: 2000,
            }).show();
        }
    });
}
</script>
<!-- others plugins -->
@livewireScripts
@endsection