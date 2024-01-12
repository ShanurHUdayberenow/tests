
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
@php

    $value = $data_item[$column['name']];

@endphp

<form action="{{route('download-pdf',  $item)}}" method="POST" target="__blank">
    @csrf
<td>
    <button type="submit" class="btn btn-primary" style="padding: 5px;"><i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: 20px;"></i></button>
</td>
</form>
