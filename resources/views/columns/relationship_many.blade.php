<td>

    @foreach($data_item[$column['name']] as $item)
        {{$loop->index + 1}}) {{$item[$column['relation_column']]}}<br>
    @endforeach
</td>
