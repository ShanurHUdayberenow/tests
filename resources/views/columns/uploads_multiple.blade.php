<td>

    @if($data = $data_item[$column['name']])
    
        @foreach($data as $item)
        
            <img src="{{$item['image']}}" width="10%">
            @break;
        @endforeach
    @else
        -
    @endif
</td>
