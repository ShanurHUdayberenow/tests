<td>
    @if($data_item[$column['name']] != null)
    {{$data_item[$column['name']][$column['relationship_column']]}}
    @else
        -
    @endif
</td>
