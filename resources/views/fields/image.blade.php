<style>
    .file-upload {
        background-color: #ffffff;
        width: 600px;
        margin: 0 auto;
        padding: 20px;
    }

    .file-upload-btn {
        width: 100%;
        margin: 0;
        color: #fff;
        background: #1FB264;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #15824B;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .file-upload-btn:hover {
        background: #1AA059;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .file-upload-btn:active {
        border: 0;
        transition: all .2s ease;
    }

    .file-upload-content {
        display: none;
        text-align: center;
    }

    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }

    .image-upload-wrap {
        margin-top: 20px;
        border: 2px dashed #808080;
        position: relative;
        transition: .3s all;
    }

    .image-dropping,
    .image-upload-wrap:hover {
        background-color: var(--primary);
        border: 2px dashed #ffffff;

    }
    .image-upload-wrap:hover .drag-text > h3{
        color: white;
    }
    .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
    }

    .drag-text {
        text-align: center;
    }

    .drag-text h3 {
        font-weight: 100;
        text-transform: uppercase;
        color: #15824B;
        padding: 60px 0;
        font-size: 18px;
    }

    .file-upload-image {
        max-height: 300px;
        max-width: 300px;
        margin: auto;
        padding: 20px;
    }

    .remove-image {
        width: 200px;
        margin: 0;
        color: #fff;
        background: #cd4535;
        border: none;
        padding: 5px;
        border-radius: 4px;
        border-bottom: 4px solid #b02818;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 400;
        font-size: 14px;
    }

    .remove-image:hover {
        background: #c13b2a;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .remove-image:active {
        border: 0;
        transition: all .2s ease;
    }

</style>

@php
    $name = $field['name'];
    $label = $field['label'];
@endphp
<div class="form-group col-4">
    <label class="col-form-label">{{$label}}</label>
<!--    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>-->

    <input type="hidden" name="{{$name}}ImageDeleted" id="{{$name}}ImageDeleted">
    <div class="image-upload-wrap" id="wrap-{{$name}}">
        <input class="file-upload-input" id="input-{{$name}}" type='file' onchange="readURL(this);" accept="image/*" name="{{$name}}"/>
        <div class="drag-text">
            <h3>Drag and drop a file or select add Image</h3>
        </div>
    </div>
    <div class="file-upload-content" id="content-{{$name}}">
        <img class="file-upload-image" id="image-{{$name}}" src="#" alt="your image" />
        <div class="image-title-wrap">
            <button type="button" onclick="removeUpload()" class="remove-image">Remove
{{--                <span class="image-title">Uploaded Image</span>--}}
            </button>
        </div>
    </div>
</div>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {
                $('#wrap-{{$name}}').hide();

                $('#image-{{$name}}').attr('src', e.target.result);
                $('#content-{{$name}}').show();

                // $('.image-title').html(input.files[0].name);
            };
            console.log(input.files[0]);
            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('#input-{{$name}}').replaceWith($('#input-{{$name}}').clone());
        $('#content-{{$name}}').hide();
        $('#wrap-{{$name}}').show();
        document.getElementById('{{$name}}ImageDeleted').value = 'true';
    }
    {{--window.onload = function () {--}}
    {{--    $('#wrap-{{$name}}').bind('dragover', function () {--}}
    {{--        $('#wrap-{{$name}}').addClass('image-dropping');--}}
    {{--    });--}}
    {{--    $('#wrap-{{$name}}').bind('dragleave', function () {--}}
    {{--        $('#wrap-{{$name}}').removeClass('image-dropping');--}}
    {{--    });--}}
    {{--};--}}

</script>

@if(isset($value))
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
            console.log($('#image-{{$name}}'))
            $('#wrap-{{$name}}').hide();
            $('#image-{{$name}}').attr('src', '{{$value}}');
            $('#content-{{$name}}').show();
            console.log('asd')
        });
    </script>
@endif
