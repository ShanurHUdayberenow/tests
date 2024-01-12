<div class="form-group">
    <label for="example-text-input" class="col-form-label">{{$field['label']}}</label>
@if(isset($value))
    <input class="form-control" type="date" value="<?= date('Y-m-d', time()); ?>" name="{{$field['name']}}" id="{{$field['name']}}"
           value="{{$value}}">
@else
        <input class="form-control" type="date" value="<?= date('Y-m-d', time()); ?>" name="{{$field['name']}}" id="{{$field['name']}}">
@endif
</div>
