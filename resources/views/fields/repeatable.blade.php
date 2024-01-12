<div class="form-group">

    <div>
        <label>{{$field['title']}}</label>
        @if(isset($value))
            @livewire('repeatable', ['field' => $field, 'data_items' => $value])
        @else
            @livewire('repeatable', ['field' => $field])
        @endif
    </div>

</div>
@livewireScripts
