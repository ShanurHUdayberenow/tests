@php
    $model = $field['model'];
    $items = $model::all();
@endphp
<link rel="stylesheet" href="\storage/css/multiple-select.css">
<div class=form-group><label for=select-language>{{$field['label']}}</label> <select value="" name="{{$field['name']}}" id="{{$field['name']}}-select">
        <option disabled selected value> </option>
        @foreach($items as $item)
        <option value="{{$item['title']}}"
        @if(isset($value))
            @if($value == $item->title)
                selected
            @endif
        @endif
        >{{$item[$field['relation_column']]}}</option>
        @endforeach
    </select>
</div>
<script src="\storage/js/multiple-select.js"></script>
<script>
    function addLoadEvent(func) {
        var oldonload = window.onload;
        if (typeof window.onload != 'function') {
            window.onload = func;
        } else {
            window.onload = function() {
                if (oldonload) {
                    oldonload();
                }
                func();
            }
        }
    }
    addLoadEvent(function () {
        new MultipleSelect('#{{$field['name']}}-select', {

        })
    })
</script>
