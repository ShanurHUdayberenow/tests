<div class="form-group">
    <label for="example-text-input" class="col-form-label">{{$field['label']}}</label>
    <div class="input-group">
        @if(isset($field['prefix']))
            <div class="input-group-prepend">
                <span class="input-group-text" id="{{$field['name']}}-suffix">{{$field['prefix']}}</span>
            </div>
        @endif
    @if(isset($value))
        <input class="form-control" type="text" name="{{$field['name']}}" id="{{$field['name']}}"
               value="{{$value}}">
    @else
            <input class="form-control" type="text" name="{{$field['name']}}" id="{{$field['name']}}">
    @endif
    </div>
</div>
