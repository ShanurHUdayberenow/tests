<div class="form-group">
    <label for="example-text-input" class="col-form-label">{{$field['label']}}</label>
@if(isset($value))
    <textarea class="form-control" type="text" name="{{$field['name']}}" id="{{$field['name']}}">{{$value}}</textarea>
@else
        <textarea class="form-control" type="text" name="{{$field['name']}}" id="{{$field['name']}}"></textarea>
@endif
</div>
