<td>
    <table class="table text-center">
        @foreach($data_item[$column['name']] as $item)
            <tr>
                @foreach($column['columns'] as $key => $item_col)

                    @if (isset($column['relation_columns']))
                        <td>
                            {{$item[$item_col][$column['relation_columns'][$key]]}}
                        </td>
                    @else
                        <td>
                            {{$item[$item_col]}}
                        </td>
                    @endif
                @endforeach
            </tr>
        @endforeach
    </table>
</td>
