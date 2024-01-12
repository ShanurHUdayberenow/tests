<div class="form-group">
    <label for="example-text-input" class="col-form-label">{{$field['label']}}</label>
@if(isset($value))
    <input class="form-control" type="checkbox" name="{{$field['name']}}" id="{{$field['name']}}"
           value="New" @if($value == 'New') checked @endif>
           
@else

        <input class="form-control" type="checkbox" name="{{$field['name']}}" id="{{$field['name']}}" value="New">
@endif
</div>