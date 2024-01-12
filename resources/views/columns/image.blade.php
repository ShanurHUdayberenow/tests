<td>
    @if($data_item[$column['name']])
        <img src="{{$data_item[$column['name']]}}" style="max-width: 200px; max-height: 200px; border-radius: .3rem">
    @else
        -
    @endif
</td>
