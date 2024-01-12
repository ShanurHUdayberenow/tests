<!DOCTYPE html>
<html>

<head>
    <title>jQuery MiniColors</title>
    <meta charset="utf-8">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>





    <script>
    $(document).ready(function() {

        $('.demo').each(function() {
            //
            // Dear reader, it's actually very easy to initialize MiniColors. For example:
            //
            //  $(selector).minicolors();
            //
            // The way I've done it below is just for the demo, so don't get confused
            // by it. Also, data- attributes aren't supported at this time...they're
            // only used for this demo.
            //
            $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                defaultValue: $(this).attr('data-defaultValue') || '',
                format: $(this).attr('data-format') || 'hex',
                keywords: $(this).attr('data-keywords') || '',
                inline: $(this).attr('data-inline') === 'true',
                letterCase: $(this).attr('data-letterCase') || 'lowercase',
                opacity: $(this).attr('data-opacity'),
                position: $(this).attr('data-position') || 'bottom',
                swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split(
                    '|') : [],
                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });

    });
    </script>
</head>

<body>
    <div class="row" style="margin: 40px 40px;">
        <div class="col-12">

            <div class="well">
                <div class="row">
                    <div class="col-lg-4 col-sm-4 col-12">
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">{{$field['label']}}</label>
                            @if(isset($value))
                            <input class="form-control demo" type="text" name="{{$field['name']}}" id="hue-demo" data-control="hue"
                                value="{{$value}}">
                            @else
                            <input class="form-control demo" type="text" name="{{$field['name']}}" id="hue-demo" data-control="hue">
                            @endif
                        </div>

                    </div>
                </div>
            </div>




        </div>
    </div>
</body>

</html>