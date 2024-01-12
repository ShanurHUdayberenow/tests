<div class="form-group">
    <label for="example-text-input" class="col-form-label">{{$field['label']}}</label>
    <div class="input-group">
        @if(isset($field['suffix']))
            <div class="input-group-prepend">
                <span class="input-group-text" id="{{$field['name']}}-suffix">{{$field['suffix']}}</span>
            </div>
        @endif
        @if(isset($value))
            <input class="form-control" type="password" name="{{$field['name']}}" id="{{$field['name']}}"
                   value="">
        @else
            <input class="form-control" type="password" name="{{$field['name']}}" id="{{$field['name']}}">
        @endif
    </div>
</div>
