<?php
if (isset($value)){
    $filenames = '';
    foreach ($value as $key => $item) {
        $filenames .= $item['filename'];

        if ($key != count($value)-1)
            $filenames .= ',';
    }
}

?>
<style>
    .selected-image {
        float: left;
        width:  120px;
        height: 120px;
        object-fit: cover;
        border-radius: .2rem;
        border: 1px solid rgba(43, 68, 80, 0.26);
    }
    .selected-image-delete {
        position: absolute;
        right: 0;
        top: 0;
        background-color: #2b4450;
        color: white;
        padding: 4px;
        cursor: pointer;
        border-radius: .2rem;
    }
    .selected-image-wrap {
        width: 120px;
        height: 120px;
        margin: 1rem;
        position: relative;
        display: inline-block;

    }
</style>
<div class="form-group">
    <label>{{$field['label']}}</label>
    @if(isset($value))
        <input type="hidden" value="{{$filenames}}" name="photos" id="photos">
        <div>
            @foreach($value as $item)
                <div class="selected-image-wrap">
                    <img class="selected-image" src="{{$item['image']}}">
                    <span class="selected-image-delete ti-close" onclick="removeImage('{{$item['filename']}}', this)"></span>
                </div>
            @endforeach
        </div>
    @endif
    <div class="custom-file mb-3">
        <input type="file" class="custom-file-input" name="{{$field['name']}}[]" id="{{$field['name']}}-file-input" multiple>
        <label class="custom-file-label" style="max-width: 100%;white-space: nowrap; overflow: hidden; text-overflow: ellipsis" id="{{$field['name']}}-file-label" for="{{$field['name']}}-file-input">{{trans('message.choose_files')}}</label>
    </div>
</div>
<script>
    document.querySelector('#{{$field['name']}}-file-input').addEventListener('change',function(e){
        var filename = '';
        var files = document.getElementById("{{$field['name']}}-file-input").files;
        for (var i = 0; i < files.length; i++) {
            filename += files[i].name + ', ';
        }
        document.getElementById('{{$field['name']}}-file-label').innerText = filename.substring(0, filename.length - 2);
    })
    function removeImage(name, element) {
        var photos = document.getElementById('photos').value.split(',');
        var photosStr = '';
        photos.forEach(function (value, index) {
            if (value !== name) {
                photosStr += value + ',';
            }
        });

        document.getElementById('photos').value = photosStr.slice(0, -1);
        var div = element.parentNode;
        div.parentNode.removeChild(div);
    }
</script>

