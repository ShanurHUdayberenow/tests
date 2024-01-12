<td>

    @if($data = $data_item[$column['name']])
    
        @foreach($data as $item)
        
            <a target="_blank" href="{{$item[$column['url']]}}">{{$item[$column['filename']]}}</a><br>
        @endforeach
    @else
        -
    @endif
</td>
