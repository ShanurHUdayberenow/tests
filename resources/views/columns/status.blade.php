@php

    $value = $data_item[$column['name']];

@endphp
  <td>
    @if($value == 'approved')
      <span class="badge badge-success">{{$value}}</span>
      @else
      <span class="badge badge-danger">{{$value}}</span>
    @endif
  </td>