<div class="form-group">
    <label for="example-text-input" class="col-form-label">{{$field['label']}}</label>
@if(isset($value))
    <input class="form-control" type="checkbox" name="{{$field['name']}}" id="{{$field['name']}}"
           value="новинки" @if($value == 'новинки') checked @endif>
           
@else

        <input class="form-control" type="checkbox" name="{{$field['name']}}" id="{{$field['name']}}" value="новинки">
@endif
</div>